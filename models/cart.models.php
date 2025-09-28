<?php

include_once 'model.models.php';

class Cart extends Model
{
    private $id;
    private $user_id;
    private $book_id;
    private $price;
    private $quantity;
    private $created_at;
    private $updated_at;

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

    public function getusercart()
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("
            SELECT 
                b.name as 'book_name', 
                b.author as 'author',
                c.price as 'price',
                c.quantity as 'quantity',
                (c.price * c.quantity) as 'total_price',
                b.cover as 'cover'
            FROM carts c
            JOIN users u ON u.id = c.user_id
            JOIN books b ON b.id = c.book_id
        ");

        $data = $sql->fetch_all(MYSQLI_ASSOC);

        $sql->close();
        $conn->close();

        return $data;
    }

    // Getters & Setters
    public function getId() {return $this->id;}

	public function getUserId() {return $this->user_id;}

	public function getBookId() {return $this->book_id;}

	public function getPrice() {return $this->price;}

	public function getQuantity() {return $this->quantity;}

	public function getCreatedAt() {return $this->created_at;}

	public function getUpdatedAt() {return $this->updated_at;}

	public function setId( $id): void {$this->id = $id;}

	public function setUserId( $user_id): void {$this->user_id = $user_id;}

	public function setBookId( $book_id): void {$this->book_id = $book_id;}

	public function setPrice( $price): void {$this->price = $price;}

	public function setQuantity( $quantity): void {$this->quantity = $quantity;}

	public function setCreatedAt( $created_at): void {$this->created_at = $created_at;}

	public function setUpdatedAt( $updated_at): void {$this->updated_at = $updated_at;}
}
