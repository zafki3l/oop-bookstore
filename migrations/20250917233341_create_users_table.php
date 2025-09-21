<?php

include_once 'migration.migrations.php';

class CreateTableUsers extends Migration
{
    // Tạo bảng users
    public function createTable()
    {
        try {
            $sql = "CREATE TABLE users (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                address VARCHAR(255),
                role TINYINT DEFAULT 1, -- 1 = 'customer', 2 = 'staff', 3 = 'admin'
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Create table successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new CreateTableUsers($db);
$table->createTable();