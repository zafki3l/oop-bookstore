<?php

include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../models/cart.models.php';

class CartController
{
    private $cart;

    public function __construct($cart = new Cart())
    {
        $this->cart = $cart;
    }
	
    // Xóa giỏ hàng
    public function delete($id)
    {
        $this->cart->deleteCart($id);

        header('Location: /oop-bookstore/views/carts/mycart.carts.php');
    }
}