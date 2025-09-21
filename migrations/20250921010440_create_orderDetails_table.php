<?php

include_once 'migration.migrations.php';

class CreateOrderDetailsTable extends Migration
{
    // Tạo bảng users
    public function createTable()
    {
        try {
            $sql = "CREATE TABLE orderDetails (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                order_id INT UNSIGNED,
                book_id INT UNSIGNED,
                price DECIMAL(12,2) NOT NULL DEFAULT 0,
                quantity INT NOT NULL DEFAULT 1,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                CONSTRAINT FK01_orderDetails FOREIGN KEY (order_id) REFERENCES orders (id),
                CONSTRAINT FK02_orderDetails FOREIGN KEY (book_id) REFERENCES books (id)
            )"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Create table successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new CreateOrderDetailsTable($db);
$table->createTable();