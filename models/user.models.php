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

    // Tạo 1 user mới khi user đăng ký
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

    // Lấy ra user login
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

    // Lấy ra tất cả user
    public function getAllUser($start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM users LIMIT $start, $row_per_page");

        $data = $sql->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getAllUserCount()
    {
        $conn = $this->getDb()->connect();

        $sql = $conn->execute_query("SELECT * FROM users");

        return $sql->num_rows;
    }

    // Tìm kiếm user
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

    // Thêm mới 1 user
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

    // Lấy ra id của user để edit
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

    // Edit user
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

    // Delete User
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
