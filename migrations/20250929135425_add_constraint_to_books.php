<?php

include_once 'migration.migrations.php';

class AddConstraintToBooks extends Migration
{
    // Tạo bảng users
    public function addConstraint()
    {
        try {
            $sql = "ALTER TABLE books
                    ADD CONSTRAINT FK01_books
                    FOREIGN KEY (category_id)
                    REFERENCES categories (id)
                    ON UPDATE CASCADE"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Add constraint successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$constraint = new AddConstraintToBooks();
$constraint->addConstraint();