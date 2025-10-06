<?php
include_once '../../../config/database.config.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->connect();

    $orderId = intval($_GET['id']);

    $sql = "SELECT o.id AS order_id,
            o.status,
            o.created_at,
            u.username AS user_name,
            b.name AS book_name,
            od.quantity,
            od.price
            FROM orders o
            JOIN users u ON o.user_id = u.id
            JOIN orderDetails od ON o.id = od.order_id
            JOIN books b ON od.book_id = b.id
            WHERE o.id = ?
        ";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
