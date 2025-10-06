<?php
include_once '../../../config/database.config.php';

header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $orderDetail = new OrderDetail();

    $order_id = intval($_GET['id']);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
