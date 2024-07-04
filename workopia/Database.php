<?php

class connectDB
{
    public $conn;
    /**
     * Constructor for db class
     * 
     * @param array $config (arr will incl db_name, port etc)
     */
    public function __construct($config)
    {
        $dns = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $option = [
            PDO::ATTR_ERRMODE => PDO::ATTR_ERRMODE
        ];
        try {
            $db = new PDO($dns, $config['username'], $config['password']);
            // echo 'DB Connected yay';
        } catch (Exception $e) {
            throw new Exception('Error when connecting db ' . $e);
        }
    }
}
