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

    header("Location: ../../../views/staff/orders/index.orders.php?page_number=1");
    exit();
}

//delete order 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $orderModel = new Order();
    $orderModel->deleteOrder((int)$_POST['id']);
    $_SESSION['delete_order_success'] = 'Delete order successful';
}

$start = 0;
$row_per_page = 10;

// Lấy ra tổng số bản ghi
$records = $order->getAllOrderCount();

// Tính số trang
$pages = (ceil($records / $row_per_page) <= 1) ? 1 : ceil($records / $row_per_page);

if (isset($_GET['page_number'])) {
    $page = $_GET['page_number'] - 1;
    $start = $page * $row_per_page;
}
$orders = $order->getAllOrder($start, $row_per_page);

//tim don hang
if (isset($_GET['found'])) {
    $found = $_GET['data'] ?? '';
    $id = $found ?? '';
    $usernameData = "%$found%" ?? '';

    // Lấy ra tổng số bản ghi
    $records = $order->getFindOrderCount($id, $usernameData);

    // Tính số trang
    $pages = (ceil($records / $row_per_page) <= 1) ? 1 : ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $orders = $order->findOrder($id, $usernameData, $start, $row_per_page);
} else {
    // Lấy ra tổng số bản ghi
    $records = $order->getAllOrderCount();

    // Tính số trang
    $pages = (ceil($records / $row_per_page) <= 1) ? 1 : ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $orders = $order->getAllOrder($start, $row_per_page);
}
