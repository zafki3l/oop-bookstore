<?php

include_once '../../../models/order.models.php';


$order = new Order();

$data = $order->createSalesReport();

echo json_encode($data);