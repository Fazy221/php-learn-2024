<?php

class Database
{
    public $conn; // connection 

    /**
     * Constructor for db class
     * 
     * @param array $config (arr will incl db_name, port etc)
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
            // echo 'Connected!';
        } catch(PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }


}
