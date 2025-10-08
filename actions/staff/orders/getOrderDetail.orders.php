<?php
include_once '../../../models/orderDetail.models.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$orderDetail = new OrderDetail();

$order_id = intval($_GET['id']) ?? '';

$data = [];

$data = $orderDetail->getOrderDetails($order_id);