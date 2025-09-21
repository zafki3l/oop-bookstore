<?php 

include_once 'migration.migrations.php';

class CreateDatabaseMVCBookStore extends Migration
{
    // Tạo database MVC_book_store
    public function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE mvc_book_store";

            $this->getDb()->connect()->execute_query($sql);

            echo 'Create database successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$bookStore = new CreateDatabaseMVCBookStore($db);
$bookStore->createDatabase();