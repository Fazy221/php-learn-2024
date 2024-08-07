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
        // inspectAndDie(Validation::string('')); // Testing with empty str which return false
        // inspectAndDie(Validation::string('a', 2)); // Testing with str with min or max defined. This one return false with min being 2
        // inspectAndDie(Validation::email('  abc@gmail.com')); // Testing email method
        // inspectAndDie(Validation::match('faizan', 'fAiZaN')); // Testing email method
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
}
