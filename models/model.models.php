<?php

include_once __DIR__ . '/../config/database.config.php';

/**
 * Lớp Model trừu tượng dùng để kết nối với database
 * Các lớp Model sẽ kế thừa lớp này để kết nối database
 */

abstract class Model
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    protected function getDb()
    {
        return $this->db;
    }
}
