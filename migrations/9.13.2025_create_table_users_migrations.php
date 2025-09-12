<?php

include_once '../config/database.config.php';

class CreateTableUsers extends Database
{
    // Tạo bảng users
    protected function createTableUsers()
    {
        try {
            $sql = "CREATE TABLE users (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                address VARCHAR(255),
                role TINYINT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            $this->connect()->exec($sql);

            echo 'Create table users successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

class Migration extends CreateTableUsers
{
    public function createTable()
    {
        $this->createTableUsers();
    }
}

$table = new Migration();
$table->createTable();