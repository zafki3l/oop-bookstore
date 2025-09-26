<?php

session_start();

include_once '../../../controllers/bookController.controllers.php';
include_once '../../../controllers/authController.controllers.php';

$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$name = $_POST['name'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$pages = $_POST['pages'];
$category_id = $_POST['category-id'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$cover = $_POST['cover'];

$book = new Book($db = new Database(), null, $name, $author, $publisher, $pages, $category_id, $description, $price, $quantity, $cover);
$bookController = new BookController($book);
$bookController->create();