<?php

include_once 'model.models.php';

class OrderDetail extends Model
{
    private $id;
    private $order_id;
    private $book_id;
    private $price;
    private $quantity;
    private $created_at;
    private $updated_at;

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

    // Tạo 1 chi tiết đơn hàng khi người dùng click mua hàng
    public function createOrderItem()
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO orderDetails (order_id, book_id, price, quantity)
                                VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param(
            'iidi', 
            $this->order_id, 
            $this->book_id, 
            $this->price, 
            $this->quantity
        );

        $stmt->execute();

        $stmt->close();
        $conn->close();
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
