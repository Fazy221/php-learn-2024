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
        if(!$listing){
            ErrorController::notFound('Listing ain\'t found');
            return;
        }
        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
    public function store() {
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        $newListingData['user_id'] = 1; 
        $newListingData = array_map('sanitize', $newListingData); 
        
        $requiredFields = ['title', 'description', 'email', 'city', 'state'];
        $errors = []; // Will've empty error arr which'll be filled during if else statement if required value found empty or not valid
        foreach($requiredFields as $fields) {
            // As requiredFields include exact values ['title', 'description'] which are keys of newListingData, we can echo out those newListingData's value which are found in requiredField. 
            // I.e., if requiredField has ['title'] and $newListingData also has ['title'] and to access an assoc arr value, we do $newListingData['title'] to echo out value 'UI/UX Designer' so this is kinda shortcut to put defined value from $requiredField arr as key to echo out $newListingData's value
            // inspect($newListingData[$fields]); 
            // Now we'll do validation by checking if $newListingData's value matched from defined $requiredFields ain't empty and validates as string
            if(empty($newListingData[$fields]) || !Validation::string($newListingData[$fields])){
                $errors[$fields] = ucfirst($fields) . ' is required!'; // will return assoc arr like ['title' => 'Title is required', 'state', 'State is required']
            }
        }

        // inspectAndDie($errors);
        // Now based on $errors arr, if it's not empty and has errors then will load view with errors otherwise move next step
        if(!empty($errors)){
            // Reload view with errors
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData // as page will be reloaded everytime if something went missing so all input fields will reset, we can reload what was already inserted for better UX
            ]);
        } else {
            echo 'success';
        }
    }
}
