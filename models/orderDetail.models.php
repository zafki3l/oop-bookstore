<?php

include_once 'model.models.php';

class OrderDetail extends Model
{
    // Attributes
    private $id;
    private $order_id;
    private $book_id;
    private $price;
    private $quantity;
    private $created_at;
    private $updated_at;

    // Constructor
    public function __construct(
        $db = new Database(),
        $id = null,
        $order_id = null,
        $book_id  = null,
        $price  = null,
        $quantity  = null,
        $created_at  = null,
        $updated_at  = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->order_id = $order_id;
        $this->book_id = $book_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * Summary of createOrderItem
     * Tạo ra 1 order item vào order khi người dùng mua hàng
     * 
     * @param mixed $order_id
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function createOrderItem($order_id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO orderDetails (order_id, book_id, price, quantity)
                                VALUES (?, ?, ?, ?)");


        $book_id = (int) $this->book_id;
        $price   = (float) $this->price;
        $qty     = (int) $this->quantity;

        $stmt->bind_param('iidi', $order_id, $book_id, $price, $qty);
        $stmt->execute();
    }

    /**
     * Summary of getAllOrderDetails
     * @return array
     */
    public function getAllOrderDetails()
    {
        $conn = $this->getDb()->connect();

        $sql = "
            SELECT 
                o.id AS order_id,
                u.username AS user_name,   -- sửa ở đây
                b.name AS book_name,       -- nếu bảng books dùng 'title' thì đổi lại
                od.quantity,
                o.status,
                (od.price * od.quantity) AS total,
                o.created_at,
                o.updated_at
            FROM orders o
            JOIN users u ON o.user_id = u.id
            JOIN orderDetails od ON o.id = od.order_id
            JOIN books b ON od.book_id = b.id
            ORDER BY o.id DESC
        ";

        $result = $conn->query($sql);
        $data = [];

        if ($result) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

        $conn->close();
        return $data;
    }

    /**
     * Summary of getOrderDetailById
     * @param mixed $id
     * @return array
     */
    public function getOrderDetailById($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "
        SELECT 
            o.id AS order_id,
            u.username AS user_name,   -- sửa ở đây
            b.name AS book_name,       -- hoặc b.title nếu cột là 'title'
            od.quantity,
            o.status,
            (od.price * od.quantity) AS total,
            o.created_at,
            o.updated_at
        FROM orders o
        JOIN users u ON o.user_id = u.id
        JOIN orderDetails od ON o.id = od.order_id
        JOIN books b ON od.book_id = b.id
        WHERE o.id = ?
    ";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            $conn->close();
            return [];
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $res = $stmt->get_result();
        $data = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];

        $stmt->close();
        $conn->close();

        return $data;
    }


    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function getBookId()
    {
        return $this->book_id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    public function setBookId($book_id): void
    {
        $this->book_id = $book_id;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
