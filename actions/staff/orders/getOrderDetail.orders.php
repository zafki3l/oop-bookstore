<?php
include_once '../../../models/orderDetail.models.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

try {
    $orderDetail = new OrderDetail();

    $order_id = intval($_GET['id']);

    $orderDetail->getOrderDetails($order_id);
    
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
