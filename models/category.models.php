<?php

include_once 'model.models.php';

class Category extends Model
{
    private $id;
    private $name;
    private $created_at;
    private $updated_at;

    public function __construct(
        $db = new Database(),
        $id = null,
        $name = null,
        $created_at = null,
        $updated_at = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getCategoryName() 
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT id, name FROM categories");
        $data = $sql->fetch_all(MYSQLI_ASSOC);

        $sql->close();
        $conn->close();

        return $data;
    }

    public function getAllCategory()
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM categories");
        $data = $sql->fetch_all(MYSQLI_ASSOC);

        $sql->close();
        $conn->close();

        return $data;
    }

    public function createCategory()
    {
        $conn = $this->getDb()->connect();

        $sql = "INSERT INTO categories (name)
                VALUES (?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $this->name);
        $stmt->execute();
        
        $stmt->close();
        $conn->close();
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

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
