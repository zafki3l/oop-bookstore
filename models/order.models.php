<?php

include_once 'model.models.php';

class Order extends Model
{
    //Status
    const PENDING_STATUS = 1;
    const IN_TRANSIST_STATUS = 2;
    const COMPLETED_STATUS = 3;

    //Attribute 
    private $id;
    private $user_id;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct(
        $db = new Database,
        $id = null,
        $user_id = null,
        $status = null,
        $created_at = null,
        $updated_at = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getAllOrder()
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT id, user_id, status, created_at, updated_at 
                FROM orders
                ORDER BY id ASC";

        $query = $conn->execute_query($sql);
        $data = $query->fetch_all(MYSQLI_ASSOC);

        $conn->close();
        
        return $data;
    }

    // Tạo 1 đơn hàng mới khi người dùng nhấn mua hàng
    public function createOrder()
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO orders (user_id)
                                VALUES (?)");

        $stmt->bind_param('i', $this->user_id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    //sua don hang
    public function editOrder()
    {
        $conn = $this->getDb()->connect();

        $sql = "UPDATE orders
                    SET status = ?
                    WHERE id = ?";

        $stmt = $conn->prepare($sql);


        $stmt->bind_param(
            'ii',
            $this->status,
            $this->id
        );


        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
    //xoa don hang
    public function deleteOrder($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "DELETE FROM orders WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    //tinh tong don hang
    public function totalPrice($id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare(
            $sql = "SELECT o.id, SUM(od.price*od.quantity) AS 'TotalPrice'
                        FROM orders o
                        JOIN orderDetails od
                        ON o.id = od.order_id
                        WHERE o.id = ?"
        );

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $data['TotalPrice'] ?? 0;
    }

    //tinh doanh thu
    public function createSalesReport()
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare(
            "SELECT SUM(od.price*od.quantity) AS 'TotalPrice'
            FROM orders o
            JOIN orderDetails od ON o.id = od.oder_id
            WHERE MONTH(o.create_at) = ?"
        );

        $month = (empty($_POST['month'])) ? date('m') : $_POST['month'];

        $stmt->bind_param('i', $month);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        return $data['TotalPrice'] ?? 0;
    }

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreateAt()
    {
        return $this->created_at;
    }

    public function getUpdateAt()
    {
        return $this->updated_at;

    }

    public function setId($id) {
    $this->id = $id;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
