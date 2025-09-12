<?php 

include_once '../config/database.config.php';

class CreateDatabaseMVCBookStore extends Database
{
    // Tạo database MVC_book_store
    protected function createDatabaseBookStore()
    {
        try {
            $sql = "CREATE DATABASE mvc_book_store";

            $this->connect()->exec($sql);

            echo 'Create database successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}


class Migration extends CreateDatabaseMVCBookStore 
{
    public function createDatabase()
    {
        $this->createDatabaseBookStore();
    }
}

$bookStore = new Migration();
$bookStore->createDatabase();