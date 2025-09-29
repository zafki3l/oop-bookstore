<?php 
session_start();

include_once '../../../models/order.models.php';
include_once '../../../controllers/orderController.controllers.php';
include_once '../../../controllers/authController.controllers.php';


$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$order = new Order();

//process order 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $order->setId($_POST['id']);
    $order->setStatus($_POST['status']);
    $order->editOrder();

    header("Location: ../../../views/staff/orders/index.orders.php");
    exit();
}


$orders = $order->getAllOrder();
?>