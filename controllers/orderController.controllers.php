<?php 
include_once __DIR__ . '/../models/order.models.php';
include_once __DIR__ . '/../config/database.config.php';

class OrderController
{
    private $order;
    
    public function __construct($order = new Order())
    {
        $this->order = $order;
    }

    public function edit($id)
    {
        session_start();
        $redirectPath = '/oop-bookstore/views/staff/orders/editOrder.orders.php' . $id;

        $this->order->editOrder($id);
        $_SESSION['edit_order_success'] = 'Edit order successfully';
        header('Location: /oop-bookstore/views/staff/orders/index.orders.php');
        exit();
    }

    public function delete($id)
    {
        $this->order->deleteOrder($id);

        $_SESSION['delete_order_success'] = 'Delete order successfully';
        header('Location: /oop-bookstore/views/staff/orders/index.orders.php?page_number=1');
        exit();
    }

    public function createSalesReport()
    {
        session_start();
        $this->order->createSalesReport();
    }
}
?>