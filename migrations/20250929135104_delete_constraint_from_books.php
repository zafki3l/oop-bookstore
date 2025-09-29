<?php

include_once 'migration.migrations.php';

class DeleteConstraintFromBooks extends Migration
{
    // Tạo bảng users
    public function deleteConstraint()
    {
        try {
            $sql = "ALTER TABLE books DROP FOREIGN KEY FK01_books"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Delete constraint successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$constraint = new DeleteConstraintFromBooks();
$constraint->deleteConstraint();