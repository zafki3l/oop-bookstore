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
        session_start();
        $user = $this->user;
        
        $this->isRegisterFormEmpty();
        $this->isEmailExist($user);
        $this->checkEmailFormat($user);

        $user->registerUser(
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAddress()
        );

        header('Location: /oop-bookstore/views/auth/login.auth.php');
        exit();
    }

    // Đăng nhập
    public function login()
    {
        session_start();
        $user = $this->user;
        $loginUser = $user->getLoginUser($user->getEmail());

        $this->validateLoginInput($user, $loginUser);

        // Lưu thông tin user vào session khi đăng nhập thành công
        $this->sessionManager($loginUser);

        // Kiểm tra role hợp lệ
        $this->checkRole($user);

        // Xử lý role redirect
        $this->redirectUser($user);
    }

    // Đăng xuất
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /oop-bookstore/views/auth/login.auth.php');
        exit();
    }

    // Lưu thông tin đăng nhập vào session
    private function sessionManager($loginUser)
    {
        $_SESSION['username'] = $loginUser['username'];
        $_SESSION['email'] = $loginUser['email'];
        $_SESSION['address'] = $loginUser['address'];
        $_SESSION['role'] = $loginUser['role'];
    }

    // Xử lý redirect user
    private function redirectUser($user)
    {
        if ($_SESSION['role'] == $user::ROLE_ADMIN) {
            header('Location: /oop-bookstore/views/admin/dashboard.admin.php');
            exit();
        } else if ($_SESSION['role'] == $user::ROLE_STAFF) {
            header('Location: /oop-bookstore/views/staff/dashboard.staff.php');
            exit();
        } else {
            header('Location: /oop-bookstore/views/homepage.views.php');
            exit();
        }
    }

    // Kiểm tra role của user
    private function checkRole($user)
    {
        if ($_SESSION['role'] != $user::ROLE_USER && $_SESSION['role'] != $user::ROLE_STAFF && $_SESSION['role'] != $user::ROLE_ADMIN) {
            header('Location: /oop-bookstore/views/auth/login.auth.php?error=invaliduser');
            exit();
        }
    }

    // Xác nhận mật khẩu khi đăng ký
    public function passwordMismatch($password, $password_confirmation)
    {
        session_start();
        if ($password != $password_confirmation) {
            $_SESSION['error'] = "Password mismatch!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }
    }

    // Xác thực đầu vào
    public function validateLoginInput($user, $loginUser)
    {
        $inputPassword = $user->getPassword();
        $userPassword = $loginUser['password'];
        $inputEmail = $user->getEmail();
        $userEmail = $loginUser['email'];

        // Nếu người dùng không nhập gì
        $this->isLoginFormEmpty($inputEmail, $inputPassword);

        // Kiểm tra mật khẩu
        $this->checkPassword($inputPassword, $userPassword);

        // Kiểm tra email
        $this->checkEmail($inputEmail, $userEmail);
    }

    // Kiểm tra mật khẩu nhập vào với mật khẩu trong database
    private function checkPassword($inputPassword, $userPassword)
    {
        if (!password_verify($inputPassword, $userPassword)) {
            $_SESSION['error'] = "Password or email incorrect!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra email
    private function checkEmail($inputEmail, $userEmail)
    {
        if ($inputEmail != $userEmail) {
            $_SESSION['error'] = "Password or email incorrect!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra input login rỗng
    private function isLoginFormEmpty($inputEmail, $inputPassword)
    {
        if (empty($inputEmail) || empty($inputPassword)) {
            $_SESSION['error'] = "Empty password or email!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra input register rỗng
    private function isRegisterFormEmpty()
    {
        if (empty($_POST['username']) && empty($_POST['email']) && empty($_POST['address']) && empty($_POST['password']) && empty($_POST['password-confirmation'])) {
            $_SESSION['error'] = "Empty input!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }

        if (empty($_POST['username'])) {
            $_SESSION['error_username'] = "Empty username!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }

        if (empty($_POST['email'])) {
            $_SESSION['error_email'] = "Empty email!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }

        if (empty($_POST['address'])) {
            $_SESSION['error_address'] = "Empty address!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }

        if (empty($_POST['password'])) {
            $_SESSION['error_password'] = "Empty password!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }

        if (empty($_POST['password-confirmation'])) {
            $_SESSION['error_password_confirmation'] = "Confirm your password!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }
    }

    // Nếu như email đã tồn tại
    private function isEmailExist($user)
    {
        $dbUser = $user->getLoginUser($_POST['email']);
        $dbEmail = $dbUser['email'];
        if ($user->getEmail() == $dbEmail) {
            $_SESSION['error_email'] = "Email already exist!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }
    }

    // Kiểm tra định dạng email
    private function checkEmailFormat($user)
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_email'] = "Invalid email format!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }
    }
}
