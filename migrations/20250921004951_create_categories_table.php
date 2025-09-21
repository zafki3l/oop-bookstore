<?php

include_once 'migration.migrations.php';

class CreateCategoriesTable extends Migration
{
    // Tạo bảng users
    public function createTable()
    {
        try {
            $sql = "CREATE TABLE categories (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
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
$table = new CreateCategoriesTable($db);
$table->createTable();