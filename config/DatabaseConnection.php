<?php 
    class DatabaseConnection
    {
        public function __construct()
        {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            if (!$conn) {
                die('<h1>DATABASE CONNECTION FAILED</h1>');
            }
            return $this->conn = $conn;
        }
    }
?>