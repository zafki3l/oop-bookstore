<?php

include_once 'model.models.php';

class Order extends Model
{
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

    public function getAllOrder($start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT o.id as 'id', 
                        u.id as 'user_id', 
                        u.username as 'username',
                        SUM(od.quantity * od.price) as 'total_price',
                        o.status as 'status', 
                        o.created_at as 'created_at', 
                        o.updated_at as 'updated_at' 
                FROM orders o
                JOIN users u ON u.id = o.user_id
                JOIN orderdetails od ON o.id = od.order_id
                GROUP BY o.id
                ORDER BY o.id ASC
                LIMIT $start, $row_per_page";

        $query = $conn->execute_query($sql);

        $data = [];

        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        $conn->close();

        return $data;
    }

    public function getAllOrderCount() 
    {
        $conn = $this->getDb()->connect();

        $query = $conn->execute_query("SELECT id FROM orders");

        return $query->num_rows;
    }

    // Tạo 1 đơn hàng mới khi người dùng nhấn mua hàng
    public function createOrder($user_id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO orders (user_id)
                                VALUES (?)");

        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        $order_id = $conn->insert_id;

        $stmt->close();
        $conn->close();

        return $order_id;
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

    //tinh doanh thu
    public function createSalesReport()
    {
        $conn = $this->getDb()->connect();

        $query = $conn->execute_query(
            "SELECT MONTH(o.created_at) as 'month', 
                    YEAR(o.created_at) as 'year',
                    SUM(od.quantity * od.price) as 'income'
            FROM orders o
            JOIN orderdetails od ON o.id = od.order_id
            GROUP BY MONTH(o.created_at), YEAR(o.created_at)
            ORDER BY MONTH(o.created_at), YEAR(o.created_at)"
        );

        $data = [];

        while ($row = $query->fetch_assoc()) {
            $month = $row['month'];
            $data[$month] = $row;
        }

        $query->close();
        $conn->close();

        $finalData = [];
        for ($m = 1; $m <= 12; $m++) {
            if (isset($data[$m])) {
                $finalData[] = $data[$m];
            } else {
                $finalData[] = [
                    'month' => $m,
                    'year' => date('Y'), 
                    'income' => 0
                ];
            }
        }

        return $finalData;
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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
