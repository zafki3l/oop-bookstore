<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';

class AuthController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
	
    // Đăng ký người dùng
    public function register()
    {
        $user = $this->user;
        
        $user->registerUser(
            $user->getUsername(), 
            $user->getEmail(), 
            $user->getPassword(), 
            $user->getAddress()
        );

        header('Location: \oop-bookstore\views\homepage.views.php');
        exit();
    }

    // Đăng nhập
    public function login()
    {
        $user = $this->user;
        $loginUser = $user->getLoginUser($user->getEmail());

        // Kiểm tra mật khẩu
        $this->checkPassword();
    
        // Lưu thông tin user vào session khi đăng nhập thành công
        $_SESSION['username'] = $loginUser['username'];
        $_SESSION['email'] = $loginUser['email'];
        $_SESSION['address'] = $loginUser['address'];
        $_SESSION['role'] = $loginUser['role'];

        header('Location: \oop-bookstore\views\homepage.views.php');
        exit();
    }

    // Đăng xuất
    public function logout()
    {
        header('Location: \oop-bookstore\views\auth\login.auth.php');
        exit();
    }

    // Xác nhận mật khẩu khi đăng ký
    public function passwordMismatch($password, $password_confirmation)
    {
        if ($password != $password_confirmation) {
            header('Location: \oop-bookstore\views\auth\register.auth.php?error=password_mismatch');
            exit();
        }
    }

    // Kiểm tra mật khẩu nhập vào với mật khẩu trong database
    private function checkPassword()
    {
        $user = $this->user;

        $loginUser = $user->getLoginUser($user->getEmail());
        $inputPassword = $user->getPassword();
        $userPassword = $loginUser['password'];

        if (!password_verify($inputPassword, $userPassword)) {
            header('Location: \oop-bookstore\views\auth\login.auth.php?error=password_incorrect');
            exit();
        }
    }
}