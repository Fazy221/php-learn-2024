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
        // inspectAndDie($_POST); // testing if echos out submitted form info
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        // $newListingData will be sanitized one came from form. array_intersect_key will check if keys of both arrays match. 
        // As $allowedFields is simple arr instead of assoc so it don't have values therefore we'll use array_flip which turns simple arr to assoc like ['title'] = ['title'=>0]
        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        // inspectAndDie($newListingData); // if keys matches then it'll return first param arr which is $_POST in this case. Values which don't match like ['title'] not being in $allowedFields will exclude it from $_POST arr
        $newListingData['user_id'] = 1; // since we don't have authentication/session setup so we'll temporary assign listing to user_id 1. 
        $newListingData = array_map('sanitize', $newListingData); // after adding sanitize method in helper.php, will apply on each value of $_POST so dirty content like html don't directly get parsed
    }
}
