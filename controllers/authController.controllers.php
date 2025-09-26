<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../handlers/userErrorHandler.handlers.php';

class AuthController
{
    private $user;
    private $userErrorHandler;

    public function __construct($user = new User(), $userErrorHandler = new UserErrorHandler())
    {
        $this->user = $user;
        $this->userErrorHandler = $userErrorHandler;
    }

    /**
     * ----- CÁC CHỨC NĂNG CHÍNH -----
     */

    // Đăng ký người dùng
    public function register()
    {
        $redirectPath = '/oop-bookstore/views/auth/register.auth.php';
        session_start();
        $user = $this->user;

        $this->userErrorHandler->isRegisterFormEmpty();
        $this->userErrorHandler->isEmailExist($user, $redirectPath);
        $this->userErrorHandler->checkEmailFormat($user, $redirectPath);

        $user->registerUser(
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAddress()
        );

        $_SESSION['register-success'] = 'Register successfully!';

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

    /**
     * ----- CÁC CHỨC NĂNG PHỤ -----
     */

    // Lưu thông tin đăng nhập vào session
    private function sessionManager($loginUser)
    {
        $_SESSION['id'] = $loginUser['id'];
        $_SESSION['username'] = $loginUser['username'];
        $_SESSION['email'] = $loginUser['email'];
        $_SESSION['address'] = $loginUser['address'];
        $_SESSION['role'] = $loginUser['role'];
    }

    // Xử lý redirect user
    private function redirectUser($user)
    {
        $_SESSION['login_success'] =  'Login successfully!';
        
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
        $this->userErrorHandler->isLoginFormEmpty($inputEmail, $inputPassword);

        // Kiểm tra mật khẩu
        $this->userErrorHandler->checkPassword($inputPassword, $userPassword);

        // Kiểm tra email
        $this->userErrorHandler->checkEmail($inputEmail, $userEmail);
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

    public function ensureAdminOrStaff()
    {
        if ($_SESSION['role'] != $this->user::ROLE_ADMIN && $_SESSION['role'] != $this->user::ROLE_STAFF) {
            die('You do not have permission to visit this site!');
        }
    }
}
