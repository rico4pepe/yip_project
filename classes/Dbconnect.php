<?php

//require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

class Dbconnect {
    private $conn;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $ex) {
            die("Connection failed: " . $ex->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

