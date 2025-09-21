<?php

include_once '../config/database.config.php';

class CreateCartsTable
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
	
    // Tạo bảng users
    public function createTable()
    {
        try {
            $sql = "CREATE TABLE carts (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT UNSIGNED,
                book_id INT UNSIGNED,
                price DECIMAL(12,2) NOT NULL DEFAULT 0,
                quantity INT NOT NULL DEFAULT 1,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                CONSTRAINT FK01_carts FOREIGN KEY (user_id) REFERENCES users (id),
                CONSTRAINT FK02_carts FOREIGN KEY (book_id) REFERENCES books (id)
            )"; 

            $this->db->connect()->execute_query($sql);

            echo 'Create table successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new CreateCartsTable($db);
$table->createTable();