<?php

include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../models/cart.models.php';

class CartController
{
    // Attributes
    private $cart;

    // Constructor
    public function __construct($cart = new Cart())
    {
        $this->cart = $cart;
    }

    /**
     * Summary of create
     * Chức năng tạo giỏ hàng
     * @return never
     */
    public function create()
    {
        session_start();
        $this->cart->createCart();

        if (isset($_SESSION['id'])) {
            $_SESSION['add_cart_success'] = 'Add new item to cart';
        } else {
            $_SESSION['add_cart_error'] = 'Please Login in order to add item to cart';
        }
        
        header('Location: /oop-bookstore/views/homepage.views.php');
        exit();
    }
	
    /**
     * Summary of delete
     * Chức năng xóa giỏ hàng
     * @param mixed $id
     * @return never
     */
    public function delete($id)
    {
        session_start();
        $this->cart->deleteCart($id);

        $_SESSION['delete_cart_success'] = 'delete item from cart successfully';
        header('Location: /oop-bookstore/views/carts/mycart.carts.php');
        exit();
    }
}