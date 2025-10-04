<?php

include_once 'model.models.php';

class Category extends Model
{
    // Attributes
    private $id;
    private $name;
    private $created_at;
    private $updated_at;

    // Constructor
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

    /**
     * Summary of getCategoryName
     * Lấy ra tên của category theo id
     * 
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy kết quả bằng function get_result().
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     */
    public function getCategoryName() 
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT id, name FROM categories");
        $data = $sql->fetch_all(MYSQLI_ASSOC);

        $sql->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of getAllCategory
     * Lấy ra tất cả dữ liệu trong bảng categories
     * 
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy kết quả bằng function get_result().
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     */
    public function getAllCategory()
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM categories");
        $data = $sql->fetch_all(MYSQLI_ASSOC);

        $sql->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of createCategory
     * Thêm category vào CSDL
     * 
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
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

    /**
     * Summary of editCategory
     * Sửa thông tin của category
     * 
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function editCategory()
    {
        $conn = $this->getDb()->connect();

        $sql = "UPDATE categories
                SET name = ?
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $this->name, $this->id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of deleteCategory
     * Xóa category
     * 
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function deleteCategory()
    {
        $conn = $this->getDb()->connect();

        $sql = "DELETE FROM categories WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $this->id);
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
