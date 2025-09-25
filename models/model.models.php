<?php

include_once __DIR__ . '/../config/database.config.php';

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
