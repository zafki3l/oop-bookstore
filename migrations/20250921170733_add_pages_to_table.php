<?php

include_once 'migration.migrations.php';

class AddPagesToBooks extends Migration
{	
    // Tạo bảng users
    public function addColumn()
    {
        try {
            $sql = "ALTER TABLE books
                ADD COLUMN pages INT NOT NULL DEFAULT 0 AFTER publisher"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Add column successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$db = new Database();
$table = new AddPagesToBooks($db);
$table->addColumn();