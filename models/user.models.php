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

    public function __construct(Database $db, $id = null, $email = null, $username = null, $password = null, $address = null, $role = null, $created_at = null, $updated_at = null)
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

    // Getters & Setters
	public function getId() {return $this->id;}
	public function getUsername() {return $this->username;}
    public function getEmail() {return $this->email;}
	public function getPassword() {return $this->password;}
	public function getAddress() {return $this->address;}
	public function getRole() {return $this->role;}
	public function getCreatedAt() {return $this->created_at;}
	public function getUpdatedAt() {return $this->updated_at;}
}
