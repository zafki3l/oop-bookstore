<?php

include_once 'migration.migrations.php';

class CreateOrdersTable extends Migration
{
    // Tạo bảng users
    public function createTable()
    {
        try {
            $sql = "CREATE TABLE orders (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT UNSIGNED,
                status TINYINT NOT NULL DEFAULT 0, -- 0 - pending, 1 - being delivered, 2 - completed
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                CONSTRAINT FK01_orders FOREIGN KEY (user_id) REFERENCES users (id)
            )"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Create table successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new CreateOrdersTable($db);
$table->createTable();