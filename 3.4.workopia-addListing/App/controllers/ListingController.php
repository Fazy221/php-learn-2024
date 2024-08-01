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
            // echo 'success';
            // As we'll only want to insert keys which have data, will have to do dynamically otherwise it'll look like below
            // $this->db->query('INSERT INTO listings (title, description, salary, tags, company, address, city, state, phone, email, requirements, benefits, user_id) VALUES (:title, :description, :salary, :tags, :company, :address, :city, :state, :phone, :email, :requirements, :benefits, :user_id)');
            // Will make empty field arr first then loop through $newListingData to get key and value and add key to field arr
            $fields = [];
            foreach ($newListingData as $key => $value) {
                $fields[] = $key;
            }
            // inspectAndDie($fields); // will give us result like [1=>'title', 2=>'description']
            // Will now turn arr into string, seperated by space and comma
            $fields = implode(', ', $fields);
            // inspectAndDie($fields); // will give us result like: string(104) "title, description, salary, requirements, benefits, company, address, city, state, phone, email, user_id"

            // Will do same thing for values
            $values = [];
            foreach ($newListingData as $key => $value) {
                // will convert empty strings to null so they can easily get inserted into db that way
                if ($value === '') {
                    $newListingData[$key] = null;
                };
                $values[] = ':' . $key; // will look like [':description', ':requirement']
            }
            $values = implode(', ', $values);
            // inspectAndDie($values); // will look like this: string(116) ":title, :description, :salary, :requirements, :benefits, :company, :address, :city, :state, :phone, :email, :user_id"

            // Now will write query
            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";
            $this->db->query($query, $newListingData);

            // Once data is inserted then can redirect to listing page. Already made helper func in it
            redirect('/listings');
        }
    }
}
