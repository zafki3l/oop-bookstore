<?php
include_once 'model.models.php';
class Cart extends Model {
    private $id;
    private $user_id;
    private $book_id;
    private $price;
    private $quantity;
    private $created_at;
    private $updated_at;
        public function __construct($db = new Database(), $id = null, $user_id = null, $book_id = null, $price = null, $quantity = null, $created_at = null, $updated_at = null)
    {
        parent::__construct($db);

        $this->id = $id;
        $this->userid = $userid;
        $this->book_id = $book_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    public function getusercart()
    {
        $conn = $this->getDb()->connect();
        $sql = $conn->execute_query(:"$id, $user_id, $book_id, $price ,$author");
        $sql->fetch_all(MYSQLI_ASSOC);
        $sql->close();
        $conn->close();
        return $data;
    }
    



     // Getters & Setters
    public function getId()
    {
        return $this->id;
    }
    public function getuser_id()

}

