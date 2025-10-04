<?php

include_once 'model.models.php';

class User extends Model
{
    //CONSTANTS
    const ROLE_USER = 1;
    const ROLE_STAFF = 2;
    const ROLE_ADMIN = 3;

    //Attributes
    private $id;
    private $username;
    private $email;
    private $password;
    private $address;
    private $role;
    private $created_at;
    private $updated_at;

    // Constructor
    public function __construct($db = new Database(), $id = null, $email = null, $username = null, $password = null, $address = null, $role = null, $created_at = null, $updated_at = null)
    {
        parent::__construct($db);

        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->role = $role;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * Summary of registerUser
     * Tạo 1 user mới khi người dùng đăng ký
     * 
     * @param mixed $username
     * @param mixed $email
     * @param mixed $password
     * @param mixed $address
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function registerUser($username, $email, $password, $address)
    {
        $conn = $this->getDb()->connect();

        $sql = "INSERT INTO users (username, email, password, address)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssss', $username, $email, $password, $address);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of getLoginUser
     * Lấy ra user login để đăng nhập
     * 
     * @param mixed $email
     * @return array|bool|null
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function getLoginUser($email)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM users 
                WHERE email = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of getAllUser
     * Lấy ra tất cả dữ liệu trong bảng users
     * 
     * @param mixed $start
     * @param mixed $row_per_page
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy ra kết quả
     * - Chuyển thành dạng associative array
     */
    public function getAllUser($start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM users LIMIT $start, $row_per_page");

        $data = $sql->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Summary of getAllUserCount
     * Đếm tất cả records trong bảng users
     * 
     * @return int|string
     * 
     * - Thực thi truy vấn
     * - Trả về tổng số bản ghi
     */
    public function getAllUserCount()
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM users");

        return $sql->num_rows;
    }

    /**
     * Summary of findUser
     * Tìm kiếm user trong bảng users
     * 
     * @param mixed $id
     * @param mixed $username
     * @param mixed $start
     * @param mixed $row_per_page
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy ra kết quả
     * - Chuyển thành dạng associative array
     */
    public function findUser($id, $username, $start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM users WHERE id = ? OR username LIKE ? LIMIT $start, $row_per_page";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $id, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of getFindUserCount
     * Lấy ra tổng số bản ghi của kết quả tìm kiếm users
     * 
     * @param mixed $id
     * @param mixed $username
     * @return int|string
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy ra số bản ghi
     */
    public function getFindUserCount($id, $username)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT * FROM users WHERE id = ? OR username LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $id, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows;
    }

    /**
     * Summary of createUser
     * Tạo 1 user mới
     * 
     * @return int|string
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function createUser()
    {
        $conn = $this->getDb()->connect();

        $sql = "INSERT INTO users (username, email, password, address, role)
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $this->username, $this->email, $this->password, $this->address, $this->role);
        $stmt->execute();

        $id = $conn->insert_id;
        
        $stmt->close();
        $conn->close();

        return $id;
    }

    /**
     * Summary of getUserToEdit
     * Lấy ra dữ liệu user để edit
     * 
     * @param mixed $id
     * @return array|bool|null
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn và lấy ra kết quả
     * - Chuyển thành dạng associative array
     */
    public function getUserToEdit($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT username, email, address, role FROM users WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of editUser
     * Sửa thông tin người dùng
     * 
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function editUser()
    {
        $conn = $this->getDb()->connect();

        $sql = "UPDATE users
                SET username = ?,
                    email = ?,
                    address = ?,
                    role = ?
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $this->username, $this->email, $this->address, $this->role, $this->id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of deleteUser
     * Xóa user khỏi csdl
     * @param mixed $id
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function deleteUser($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "DELETE FROM users WHERE id = ?";

        $stmt = $conn->prepare($sql);
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
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
