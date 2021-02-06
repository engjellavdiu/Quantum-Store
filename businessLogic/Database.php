<?php

class DatabaseConfig {
    private $connection;
    private $host = "localhost";
    private $user = "root";
    private $dbname = "quantum";

    protected function getConnection(){
        $this->createConnection();
        return $this->connection;
    }

    private function createConnection(){
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", "root", "");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
}