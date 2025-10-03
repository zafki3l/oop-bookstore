<?php

session_start();
include_once '../models/user.models.php';
include_once '../models/order.models.php';
include_once '../models/orderDetail.models.php';
include_once '../models/cart.models.php';

$cart_id = $_POST['cart_id'];
$user_id = $_SESSION['id'];
$book_id = $_POST['book_id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$db = new Database();
$order = new Order($db, null, $user_id);
$orderDetail = new OrderDetail($db, null, null, $book_id, $price, $quantity);
$cart = new Cart($db);

if (empty($user_id)) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $password = password_hash(rand(100000, 999999), PASSWORD_DEFAULT);
    $role = 0;

    $user = new User($db, null, $email, $username, $password, $address, $role);
    $new_user_id = $user->createUser();

    $order_id = $order->createOrder($new_user_id);
    $orderDetail->createOrderItem($order_id);
    $cart->deleteCart($cart_id);
    $_SESSION['buy-success'] = 'Buy successfully';
} else {
    $order_id = $order->createOrder($user_id);
    $orderDetail->createOrderItem($order_id);
    $cart->deleteCart($cart_id);
    $_SESSION['buy_success'] = 'Buy successfully';
}

header('Location: /oop-bookstore/views/homepage.views.php');
exit();