<?php

include_once '../config/database.config.php';

class AddPagesToBooks
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
	
    // Tạo bảng users
    public function addColumn()
    {
        try {
            $sql = "ALTER TABLE books
                ADD COLUMN pages INT NOT NULL DEFAULT 0 AFTER publisher"; 

            $this->db->connect()->execute_query($sql);

            echo 'Add column successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new AddPagesToBooks($db);
$table->addColumn();