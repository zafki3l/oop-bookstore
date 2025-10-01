<?php

session_start();
include_once '../models/user.models.php';
include_once '../models/order.models.php';
include_once '../models/orderDetail.models.php';
include_once '../controllers/homeController.controllers.php';

$user_id = $_POST['user_id'] ?? null;
$book_id = $_POST['book_id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$db = new Database();
$order = new Order($db);
$orderDetail = new OrderDetail($db, null, null, $book_id, $price, $quantity);

if (!isset($_SESSION['id'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $password = password_hash(rand(100000, 999999), PASSWORD_DEFAULT);
    $role = 0;

    $user = new User($db, null, $email, $username, $password, $address, $role);
    $new_user_id = $user->createUser();

    $homeController = new HomeController($order, $orderDetail, $user);
    $homeController->buyNow($new_user_id);
} else {
    $homeController = new HomeController($order, $orderDetail);
    $homeController->buyNow($user_id);
}
