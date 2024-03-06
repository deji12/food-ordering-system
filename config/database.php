<?php

class Database {
    private $host;
    private $dbname;
    private $dbusername;
    private $dbpassword;
    private $pdo;

    public function __construct($host, $dbname, $dbusername, $dbpassword) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->dbusername = $dbusername;
        $this->dbpassword = $dbpassword;
    }

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbusername, $this->dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

$database  = new Database("localhost", "food", "root", "");
$database->connect();
$pdo = $database->getConnection();