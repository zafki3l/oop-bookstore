<?php

include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../models/cart.models.php';
include_once __DIR__ . '/../models/order.models.php';
include_once __DIR__ . '/../models/orderDetail.models.php';
include_once __DIR__ . '/../models/user.models.php';

class HomeController
{
    private $order;
    private $orderDetail;
    private $cart;
    private $user;

    public function __construct(
        $order = new Order(),
        $orderDetail = new OrderDetail(),
        $cart = new Cart(),
        $user = new User()
    ) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->cart = $cart;
        $this->user = $user;
    }

    /**
     * Khi người dùng nhấp vào nút buy now:
     * 1. Tạo 1 đơn hàng mới
     * 2. Tạo 1 chi tiết đơn hàng
     * 3. Nếu chưa có tài khoản thì tự động tạo 1 user ảo
     */
    public function buyNow($user_id)
    {
        try {
            $order_id = $this->order->createOrder($user_id);

            $this->orderDetail->createOrderItem($order_id);

            header('Location: /oop-bookstore/views/homepage.views.php');
            exit();
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
}
