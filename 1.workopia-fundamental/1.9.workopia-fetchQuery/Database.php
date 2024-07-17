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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Don't want numerical indexes along arr so set assoc arr as default fetch
        ];
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options); // added $options settings to PDO instance
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the db
     * 
     * @param string $query
     * 
     * @return PDOStatement
     * @throws PDOException
     */

     public function query($query) {
        try{
            $sth = $this->conn->prepare($query);
            $sth->execute();
            return $sth;
        } catch(PDOException $e) {
            throw new Exception("Error when quering db: {$e->getMessage()}");
        }
     }
}
