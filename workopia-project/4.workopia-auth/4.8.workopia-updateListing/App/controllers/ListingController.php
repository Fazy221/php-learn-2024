<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use Framework\Authorization;

class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings ORDER BY created_at DESC')->fetchAll();
        loadView('listings/index', [
            'listings' => $listings
        ]);
    }
    public function create()
    {
        loadView('listings/create');
    }
    public function show($params)
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id ', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing ain\'t found');
            return;
        }
        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
    public function store()
    {
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        $newListingData['user_id'] = Session::get('user')['id'];
        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];
        $errors = [];
        foreach ($requiredFields as $fields) {
            if (empty($newListingData[$fields]) || !Validation::string($newListingData[$fields])) {
                $errors[$fields] = ucfirst($fields) . ' is required!';
            }
        }
        if (!empty($errors)) {
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        } else {
            $fields = [];
            foreach ($newListingData as $key => $value) {
                $fields[] = $key;
            }
            $fields = implode(', ', $fields);
            $values = [];
            foreach ($newListingData as $key => $value) {
                if ($value === '') {
                    $newListingData[$key] = null;
                };
                $values[] = ':' . $key;
            }
            $values = implode(', ', $values);
            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";
            Session::setFlashMessage('success_message', 'Listing created successfully'); // added case of created successfully here as well
            $this->db->query($query, $newListingData);
            redirect('/listings');
        }
    }
    public function destroy($params)
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing not found!');
            return;
        };
        // First method (without new Authorization file)
        // if(Session::get('user')['key']!==$listing->user_id) {
        //     $_SESSION['error_message'] = 'You are not authorized to delete this listing';
        //     return redirect('/listings/' . $listing->id);
        // }
        // Second method (after importing Authorization namespace)
        if (!Authorization::isOwner($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not authorized to delete this listing'); 
            return redirect('/listings/' . $listing->id);
        }
        $this->db->query('DELETE FROM listings WHERE id = :id', $params)->fetch();
        Session::setFlashMessage('success_message', 'Listing deleted successfully'); // also using in case of success, replacing previous
        redirect('/listings');
    }
    public function edit($params)
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id ', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing ain\'t found');
            return;
        }
        if (!Authorization::isOwner($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not authorized to update this listing'); 
            return redirect('/listings/' . $listing->id);
        }
        loadView('listings/edit', [
            'listing' => $listing
        ]);
    }
    public function update($params)
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id ', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing ain\'t found');
            return;
        }
        // Adding authorization layer to update similar to delete
        if (!Authorization::isOwner($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not authorized to update this listing'); 
            return redirect('/listings/' . $listing->id);
        }
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $updatedValues = [];
        $updatedValues = array_intersect_key($_POST, array_flip($allowedFields));
        $updatedValues = array_map('sanitize', $updatedValues); // will use sanitize from helper func to sanitize each value of $updatedValues
        $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];
        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($updatedValues[$field]) || !Validation::string($updatedValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required!';
            }
        }
        if (!empty($errors)) {
            loadView('listings/edit', [
                'listing' => $listing,
                'errors' => $errors
            ]);
            exit;
        } else {
            $updateFields = [];
            foreach (array_keys($updatedValues) as $field) {
                $updateFields[] = "{$field} = :{$field}";
            }
            $updateFields = implode(', ', $updateFields);
            $updateQuery = "UPDATE listings SET $updateFields WHERE id = :id";
            $updatedValues['id'] = $id;
            $this->db->query($updateQuery, $updatedValues);
            
            Session::setFlashMessage('success_message', 'Listing updated successfully'); // using in case of update, replacing previous
            redirect('/listings/' . $id);
        }
    }
}
