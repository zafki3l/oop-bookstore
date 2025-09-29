<?php

include_once '../config/database.config.php';

abstract class Migration
{
    private $db;

    public function __construct($db = new Database())
    {
        $this->db = $db;
    }

    protected function getDb()
    {
        return $this->db;
    }
}
