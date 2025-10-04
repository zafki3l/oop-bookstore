<?php

include_once 'model.models.php';

class Cart extends Model
{
    // Attributes
    private $id;
    private $user_id;
    private $book_id;
    private $price;
    private $quantity;
    private $created_at;
    private $updated_at;

    // Constructor
    public function __construct(
        $db = new Database(),
        $id = null,
        $user_id = null,
        $book_id = null,
        $price = null,
        $quantity = null,
        $created_at = null,
        $updated_at = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * Summary of getusercart
     * Lấy ra giỏ hàng của user
     * 
     * @param int $id (mã người dùng)
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy kết quả bằng function get_result().
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     */
    public function getusercart($id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("
            SELECT 
                c.id as 'id',
                b.id as 'book_id',
                b.name as 'book_name', 
                b.author as 'author',
                c.price as 'price',
                c.quantity as 'quantity',
                (c.price * c.quantity) as 'total_price',
                b.cover as 'cover'
            FROM carts c
            JOIN users u ON u.id = c.user_id
            JOIN books b ON b.id = c.book_id
            WHERE u.id = ?
            ORDER BY c.id DESC
        ");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of createCart
     * Tạo giỏ hàng
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function createCart()
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO carts (user_id, book_id, price, quantity)
                                VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param('iidi', $this->user_id, $this->book_id, $this->price, $this->quantity);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of deleteCart
     * Xóa giỏ hàng
     * @param int $id (Mã giỏ hàng)
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function deleteCart($id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("DELETE FROM carts WHERE id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
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

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
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
