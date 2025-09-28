<?php

include_once __DIR__ . '/../models/category.models.php';
include_once __DIR__ . '/../config/database.config.php';

class CategoryController
{
    private $category;

    public function __construct($category = new Category())
    {
        $this->category = $category;
    }
	
    public function create()
    {
        $this->category->createCategory();

        header('Location: /oop-bookstore/views/staff/categories/index.categories.php');
        exit();
    }
}