<?php

include_once 'model.models.php';

class Book extends Model
{
    const OUT_STOCK = 0;
    const IN_STOCK = 1;
    private $id;
    private $name;
    private $author;
    private $publisher;
    private $pages;
    private $category_id;
    private $description;
    private $price;
    private $quantity;
    private $status;
    private $cover;
    private $created_at;
    private $updated_at;

    public function __construct(
        $db = new Database(),
        $id = null,
        $name = null,
        $author = null,
        $publisher = null,
        $pages = null,
        $category_id = null,
        $description = null,
        $price = null,
        $quantity = 0,
        $status = null,
        $cover = null,
        $created_at = null,
        $updated_at = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->pages = $pages;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->status = $status ?? ($quantity > 0) ? self::IN_STOCK : self::OUT_STOCK;
        $this->cover = $cover;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getAllBook()
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM books";

        $query = $conn->execute_query($sql);
        $data = $query->fetch_all(MYSQLI_ASSOC);

        $conn->close();

        return $data;
    }

    public function addBook()
    {
        $conn = $this->getDb()->connect();

        $sql = "INSERT INTO books (name, author, publisher, pages, category_id, description, price, quantity, cover)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('sssiisdis', $this->name, $this->author, $this->publisher, $this->pages, $this->category_id, $this->description, $this->price, $this->quantity, $this->cover);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public function editBook($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "UPDATE books 
                SET name = ?, 
                    author = ?, 
                    publisher = ?, 
                    pages = ?, 
                    category_id = ?, 
                    description = ?, 
                    price = ?, 
                    quantity = ?, 
                    cover = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            'sssiisdisi',
            $this->name,
            $this->author,
            $this->publisher,
            $this->pages,
            $this->category_id,
            $this->description,
            $this->price,
            $this->quantity,
            $this->cover,
            $id
        );

        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public function deleteBook($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "DELETE FROM books WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public function getBookById($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM books WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $data;
    }

    public function getBook($idData, $usernameData)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM books WHERE id = ? OR name LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $idData, $usernameData);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close(); 
        $conn->close();

        return $data;
    }

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCover()
    {
        return $this->cover;
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

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function setPublisher($publisher): void
    {
        $this->publisher = $publisher;
    }

    public function setPages($pages): void
    {
        $this->pages = $pages;
    }

    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function setCover($cover): void
    {
        $this->cover = $cover;
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
