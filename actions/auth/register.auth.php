<?php

include_once '../../controllers/authController.controllers.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Change your request method to POST');
}

// Lấy dữ liệu từ form giao diện
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password-confirmation'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$address = $_POST['address'];

// Khai báo các lớp
$db = new Database();
$user = new User($db, null, $email, $username, $hashedPassword, $address);
$authController = new AuthController($user);

// Check mật khẩu có trùng khớp không?
$authController->passwordMismatch($password, $passwordConfirmation);

// Nếu trùng thì đăng ký
$authController->register();
