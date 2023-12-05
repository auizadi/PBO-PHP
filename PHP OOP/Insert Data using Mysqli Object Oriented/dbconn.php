<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'adminpanel');

class DatabaseConnection
{
    private $conn;

    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("<h1>Database Connection Failed</h1>");
        }

        $this->conn;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$databaseConnection = new DatabaseConnection();
$connection = $databaseConnection->getConnection();

?>