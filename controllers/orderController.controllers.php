<?php 
include_once __DIR__ . '/../models/order.models.php';
include_once __DIR__ . '/../config/database.config.php';

class OrderController
{
    // Attributes
    private $order;
    
    // Constructor
    public function __construct($order = new Order())
    {
        $this->order = $order;
    }

    /**
     * Summary of edit
     * Sửa đơn hàng
     * @param mixed $id
     * @return never
     */
    public function edit($id)
    {
        session_start();
        $redirectPath = '/oop-bookstore/views/staff/orders/editOrder.orders.php' . $id;

        $this->order->editOrder($id);
        $_SESSION['edit_order_success'] = 'Edit order successfully';
        header('Location: /oop-bookstore/views/staff/orders/index.orders.php?page_number=1');
        exit();
    }

    /**
     * Summary of delete
     * Xóa đơn hàng
     * @param mixed $id
     * @return never
     */
    public function delete($id)
    {
        $this->order->deleteOrder($id);

        $_SESSION['delete_order_success'] = 'Delete order successfully';
        header('Location: /oop-bookstore/views/staff/orders/index.orders.php?page_number=1');
        exit();
    }

    /**
     * Summary of createSalesReport
     * Lập báo cáo thống kê doanh số
     * @return void
     */
    public function createSalesReport()
    {
        session_start();
        $this->order->createSalesReport();
    }
}
?>