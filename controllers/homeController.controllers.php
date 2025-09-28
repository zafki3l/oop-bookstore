<?php

include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../models/cart.models.php';
include_once __DIR__ . '/../models/orders.models.php';
include_once __DIR__ . '/../models/orderDetail.models.php';

class HomeController
{
    private $order;
    private $orderDetail;
    private $cart;

    public function __construct(
        $order = new Order(),
        $orderDetail = new OrderDetail(),
        $cart = new Cart()
    ) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->cart = $cart;
    }

    /**
     * Khi người dùng nhấp vào nút buy now:
     * 1. Tạo 1 đơn hàng mới
     * 2. Tạo 1 chi tiết đơn hàng
     * 3. Xóa giỏ hàng nếu tồn tại
     */
    public function buyNow()
    {
        $this->order->createOrder();
        $this->orderDetail->createOrderItem();

        header('Location: /oop-bookstore/views/homepage.views.php');
        exit();
    }
}
