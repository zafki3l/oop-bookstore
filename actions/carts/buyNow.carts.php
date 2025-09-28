<?php

include_once '../../controllers/homeController.controllers.php';

$user_id = $_POST['id'];


$db = new Database();

$order = new Order($db, null, $user_id);

$orderDetail = new OrderDetail($db, null, $order->getId(), $book);


$homeController = new HomeController($order, );