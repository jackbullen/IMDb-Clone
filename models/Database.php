<?php

class Database {
    private $servername = "127.0.0.1";
    private $username = "imdb_user";
    private $password = "password";
    private $dbname = "imdb";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306, '/tmp/mysql.sock');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
