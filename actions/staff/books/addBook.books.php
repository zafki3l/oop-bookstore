<?php

include_once '../../../controllers/bookController.controllers.php';

$name = $_POST['name'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$pages = $_POST['pages'];
$category_id = $_POST['category-id'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$cover = $_POST['cover'];
$status = ($quantity > 0) ? 1 : 0;

$book = new Book($db = new Database(), null, $name, $author, $publisher, $pages, $category_id, $description, $price, $quantity, $status, $cover);
$bookController = new BookController($book);
$bookController->create();