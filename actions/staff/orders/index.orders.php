<?php 
session_start();

include_once '../../../models/order.models.php';
include_once '../../../controllers/orderController.controllers.php';
include_once '../../../controllers/authController.controllers.php';


$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$order = new Order();



$orders = $order->getAllOrder();
?>