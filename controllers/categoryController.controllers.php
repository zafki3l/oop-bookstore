<?php

include_once __DIR__ . '/../models/category.models.php';
include_once __DIR__ . '/../config/database.config.php';

class CategoryController
{
    // Attributes
    private $category;

    // Constructor
    public function __construct($category = new Category())
    {
        $this->category = $category;
    }
	
    /**
     * Summary of create
     * Tạo danh mục mới
     * @return never
     */
    public function create()
    {
        session_start();
        $this->category->createCategory();

        $_SESSION['add-category'] = 'Add new Category successfully!';
        header('Location: /oop-bookstore/views/staff/categories/index.categories.php');
        exit();
    }

    /**
     * Summary of edit
     * Sửa danh mục
     * @return never
     */
    public function edit()
    {
        session_start();
        $this->category->editCategory();

        $_SESSION['edit-category'] = 'Updated Category successfully!';
        header('Location: /oop-bookstore/views/staff/categories/index.categories.php');
        exit();
    }

    /**
     * Summary of delete
     * Xóa danh mục
     * @return never
     */
    public function delete()
    {
        session_start();
        $this->category->deleteCategory();

        $_SESSION['delete-category'] = 'Delete Category successfully!';
        header('Location: /oop-bookstore/views/staff/categories/index.categories.php');
        exit();
    }
}