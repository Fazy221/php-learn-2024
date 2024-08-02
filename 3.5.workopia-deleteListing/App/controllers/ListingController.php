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
    public function destroy($params) { // will get params arr as argument
        $id = $params['id']; // will define it as variable/value
        $params = [
            'id' => $id // will put in an isolated array again as assoc arr
        ];
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch(); // since it's single id so will simply use fetch()
        if(!$listing) { // if listing not found then use error controller
          ErrorController::notFound('Listing not found!');
          return;
        };
        // inspectAndDie($listing);
        $this->db->query('DELETE FROM listings WHERE id = :id', $params)->fetch(); // deleting listing
        redirect('/listings');
    }
}
