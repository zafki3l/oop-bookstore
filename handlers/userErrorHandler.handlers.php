<?php

class UserErrorHandler
{
    private $user;

    public function __construct($user = new User())
    {
        $this->user = $user;
    }

    // Kiểm tra mật khẩu nhập vào với mật khẩu trong database
    public function checkPassword($inputPassword, $userPassword)
    {
        if (!password_verify($inputPassword, $userPassword)) {
            $_SESSION['error'] = "Password or email incorrect!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra email
    public function checkEmail($inputEmail, $userEmail)
    {
        if ($inputEmail != $userEmail) {
            $_SESSION['error'] = "Password or email incorrect!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra input login rỗng
    public function isLoginFormEmpty($inputEmail, $inputPassword)
    {
        if (empty($inputEmail) || empty($inputPassword)) {
            $_SESSION['error'] = "Empty password or email!";
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra input register rỗng
    public function isRegisterFormEmpty()
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
    public function isEmailExist($user, $redirectPath)
    {
        $dbUser = $user->getLoginUser($_POST['email']);
        $dbEmail = $dbUser['email'];
        if ($user->getEmail() == $dbEmail) {
            $_SESSION['error_email'] = "Email already exist!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }

    // Kiểm tra định dạng email
    public function checkEmailFormat($user, $redirectPath)
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_email'] = "Invalid email format!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }

    // Nếu chưa đăng nhập thì đẩy người dùng ra trang đăng nhập
    public function ensureLogin()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    // Kiểm tra role admin mới được truy cập
    public function ensureAdmin()
    {
        if ($_SESSION['role'] != $this->user::ROLE_ADMIN) {
            die('You do not have permission to visit this site!');
        }
    }

    public function emptyInput($user, $redirectPath, $isEdit = false)
    {
        if (empty($user->getUsername()) && empty($user->getEmail()) && empty($user->getPassword()) && empty($user->getAddress())) {
            $_SESSION['error'] = "Empty input!";
            header('Location: ' . $redirectPath);
            exit();
        }

        if (empty($user->getUsername())) {
            $_SESSION['error_username'] = "Empty username!";
            header('Location: ' . $redirectPath);
            exit();
        }

        if (empty($user->getEmail())) {
            $_SESSION['error_email'] = "Empty email!";
            header('Location: ' . $redirectPath);
            exit();
        }

        if (!isset($isEdit) && empty($user->getPassword())) {
            $_SESSION['error_password'] = "Empty password!";
            header('Location: ' . $redirectPath);
            exit();
        }

        if (empty($user->getAddress())) {
            $_SESSION['error_address'] = "Empty address!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }
}
