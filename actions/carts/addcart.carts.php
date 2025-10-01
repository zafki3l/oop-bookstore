<?php
session_start();
include_once '../../controllers/cartController.controllers.php';

$user_id = $_SESSION['id'];
$book_id = $_POST['book_id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$cart = new Cart($db = new Database(), null, $user_id, $book_id, $price, $quantity);
$cartController = new CartController($cart);
$cartController->create();