<?php

include_once 'migration.migrations.php';

class AddConstraintToOrderDetails extends Migration
{
    // Tạo bảng users
    public function addConstraint()
    {
        try {
            $sql = "ALTER TABLE orderdetails
                    ADD CONSTRAINT FK03_orderDetails
                    FOREIGN KEY (order_id)
                    REFERENCES orders (id)
                    ON DELETE CASCADE 
                    ON UPDATE CASCADE"; 

            $this->getDb()->connect()->execute_query($sql);

            echo 'Add constraint successfully!';
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

$constraint = new AddConstraintToOrderDetails();
$constraint->addConstraint();