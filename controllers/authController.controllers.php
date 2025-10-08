<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../handlers/userErrorHandler.handlers.php';

class AuthController
{
    // Attributes
    private $user;
    private $userErrorHandler;

    // Constructor
    public function __construct($user = new User(), $userErrorHandler = new UserErrorHandler())
    {
        $this->user = $user;
        $this->userErrorHandler = $userErrorHandler;
    }

    /**
     * Summary of register
     * Đăng ký người dùng
     * @return never
     */
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

    /**
     * Summary of login
     * Đăng nhập
     * @return void
     * 
     * Xử lý đăng nhập người dùng: Kiểm tra thông tin, lưu session và redirect dựa trên role
     */
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

    /**
     * Summary of logout
     * Đăng xuất
     * @return never
     * 
     * Xử lý đăng xuất: Xóa session và redirect về trang đăng nhập
     */
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

    /**
     * Summary of sessionManager
     * Lưu các thông tin đăng nhập vào $_SESSION
     * @param mixed $loginUser
     * @return void
     */
    private function sessionManager($loginUser)
    {
        $_SESSION['id'] = $loginUser['id'];
        $_SESSION['username'] = $loginUser['username'];
        $_SESSION['email'] = $loginUser['email'];
        $_SESSION['address'] = $loginUser['address'];
        $_SESSION['role'] = $loginUser['role'];
    }

    /**
     * Summary of redirectUser
     * Xử lý điều hướng người dùng khi đăng nhập
     * @param mixed $user
     * @return never
     */
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

    /**
     * Summary of checkRole
     * Kiểm tra role của user
     * 
     * @param mixed $user
     * @return void
     */
    private function checkRole($user)
    {
        if ($_SESSION['role'] != $user::ROLE_USER && $_SESSION['role'] != $user::ROLE_STAFF && $_SESSION['role'] != $user::ROLE_ADMIN) {
            $_SESSION['error'] = 'User not exist! Please create new account to sign-in!';
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    /**
     * Summary of passwordMismatch
     * Xác nhận mật khẩu khi đăng ký
     * @param mixed $password
     * @param mixed $password_confirmation
     * @return void
     */
    public function passwordMismatch($password, $password_confirmation)
    {
        session_start();
        if ($password != $password_confirmation) {
            $_SESSION['error'] = "Password mismatch!";
            header('Location: /oop-bookstore/views/auth/register.auth.php');
            exit();
        }
    }

    /**
     * Summary of validateLoginInput
     * Xác thực đầu vào đăng nhập
     * @param mixed $user
     * @param mixed $loginUser
     * @return void
     */
    private function validateLoginInput($user, $loginUser)
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

    /**
     * Summary of ensureLogin
     * @return void
     * 
     * Đảm bảo người dùng đã đăng nhập
     * Nếu chưa thì chuyển về trang login
     */
    public function ensureLogin()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /oop-bookstore/views/auth/login.auth.php');
            exit();
        }
    }

    /**
     * Summary of ensureAdmin
     * @return void
     * 
     * Kiểm tra chỉ có admin mới có quyền truy cập
     */
    public function ensureAdmin()
    {
        if ($_SESSION['role'] != $this->user::ROLE_ADMIN) {
            die('You do not have permission to visit this site!');
        }
    }

    /**
     * Summary of ensureAdminOrStaff
     * @return void
     * 
     * Kiểm tra chỉ có admin hoặc staff mới có quyền truy cập
     */
    public function ensureAdminOrStaff()
    {
        if ($_SESSION['role'] != $this->user::ROLE_ADMIN && $_SESSION['role'] != $this->user::ROLE_STAFF) {
            die('You do not have permission to visit this site!');
        }
    }
}