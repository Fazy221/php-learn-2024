<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

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
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
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
        $newListingData['user_id'] = 1;
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
        $this->db->query('DELETE FROM listings WHERE id = :id', $params)->fetch();
        $_SESSION['success_message'] = 'Listing deleted successfully';
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
        loadView('listings/edit', [
            'listing' => $listing
        ]);
    }
    public function update($params)
    {
        // Taking params which contain id and fetching listing from it (since dry code as used in other methods too so will make seperately to use in future)
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id ', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound('Listing ain\'t found');
            return;
        }
        // Will compare keys from allowedFields to $_POST which contain updated fields to verify if keys of both are same. If true then return $_POST 
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $updatedValues = [];
        $updatedValues = array_intersect_key($_POST, array_flip($allowedFields));
        $updatedValues = array_map('sanitize', $updatedValues); // will use sanitize from helper func to sanitize each value of $updatedValues
        // inspectAndDie($updatedValues); // verifying if works
        $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];
        $errors = [];
        foreach($requiredFields as $field) {
            // Now will run loop to check if specifically the values being to keys from requiredFields are not empty. If they're then put in err arr and load view with them
            if (empty($updatedValues[$field]) || !Validation::string($updatedValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required!';
            }
        }
        // inspectAndDie($errors); // verifying if works

        // If errors arr have data which mean some fields values are empty or not valid then will send data along errors in the view
        if(!empty($errors)) {
            loadView('listings/edit', [
                'listing' => $listing,
                'errors' => $errors
            ]);
            exit;
        } else {
            // Submit to db 
            // inspectAndDie('success'); // verifying if works
            $updateFields = [];
            // Will first get keys of updated values
            foreach(array_keys($updatedValues) as $field) {
                // inspect($field); // testing if work. Will get result like: string(5) "title" string(11) "description" string(6) "salary"
                $updateFields[] = "{$field} = :{$field}"; // As we'll add this in updateFields arr, it'll be helpful in query when doing: UPDATE listings SET title = :title WHERE id = 1
                // The updateFields will now look like this arr: "array(12) {[0]=>string(14) "title = :title"[1]=>string(26) "description = :description" 
            }
            // inspectAndDie($updateFields); // testing if work. 
            $updateFields = implode(', ', $updateFields); // Will make it look like: title = :title, description: :description
            $updateQuery = "UPDATE listings SET $updateFields WHERE id = :id";
            $updatedValues['id'] = $id;
            $this->db->query($updateQuery, $updatedValues);
            $_SESSION['success_message'] = 'Listing Updated Successfully!';
            redirect('/listings/' . $id);
        }
    }
}
