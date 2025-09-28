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
        private $create_at;
        private $update_at;

        public function __construct(
            $db = new Database,
            $id = null, 
            $user_id = null,
            $status = null,
            $create_at = null, 
            $update_at = null 
        ) {
            parent::__construct($db);

            $this->id = $id;
            $this->user_id = $user_id;
            $this->status = $status;
            $this->create_at = $create_at;
            $this->update_at = $update_at;
        }

        //sua don hang
        public function editOrder()
        {
            $conn = $this->getDb()->connect();

            $sql = "UPDATE orders
                    SET name = ?,
                        status = ?
                    WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param(
                'ssi',
                $this->name,
                $this->status,
                $id
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
        public function totalPrice($mysqli, $order_id)
        {
            $conn = $this->getDb()->connect();

            $stmt = $mysqli->prepare(
                $sql = "SELECT order_id, SUM(od.price*od.quantity) AS 'TotalPrice'
                        FROM orderDetails
                        WHERE order_id = ?"
            );

            $stmt->bind_param('i', $order_id);
            $stmt->execute();

            $stmt->close();
            $conn->close();

            return $data['TotalPrice'] ?? 0;
        }

        //tinh doanh thu
        public function createSalesReport($mysqli)
        {
            $conn = $this->getDb()->connect();

            $stmt = $mysqli->prepare(
                $sql = "SELECT SUM(od.price*od.quantity) AS 'TotalPrice'
                        FROM oders o
                        JOIN orderDetails od ON o.id = od.oder_id
                        WHERE MONTH(o.create_at) = ?"
            );

            $month = (empty($_POST['month'])) ? date('m') :$_POST['month'];

            $stmt->bind_param('i', $month);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            return $data['TotalPrice'] ?? 0;
        }
    }
?>