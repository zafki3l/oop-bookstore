<?php

include_once '../config/database.config.php';

class CreateBooksTable
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
            $sql = "CREATE TABLE books (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                author VARCHAR(100) NOT NULL,
                publisher VARCHAR(100) NOT NULL,
                category_id INT UNSIGNED, 
                description TEXT,
                price DECIMAL(12,2) NOT NULL DEFAULT 0,
                quantity INT NOT NULL DEFAULT 0,
                status TINYINT NOT NULL DEFAULT 0, -- 0 = outstock, 1 = instock
                cover TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                CONSTRAINT FK01_books FOREIGN KEY (category_id) REFERENCES categories (id)
            )"; 

            $this->db->connect()->execute_query($sql);

            echo 'Create table successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new CreateBooksTable($db);
$table->createTable();