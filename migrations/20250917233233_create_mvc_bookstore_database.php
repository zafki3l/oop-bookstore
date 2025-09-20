<?php 

include_once '../config/database.config.php';

class CreateDatabaseMVCBookStore
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
	
    // Tạo database MVC_book_store
    public function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE mvc_book_store";

            $this->db->connect()->execute_query($sql);

            echo 'Create database successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$bookStore = new CreateDatabaseMVCBookStore($db);
$bookStore->createDatabase();