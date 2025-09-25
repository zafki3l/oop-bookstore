<?php
session_start();

include_once '../../controllers/userController.controllers.php';
include_once '../../controllers/authController.controllers.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$role = $_POST['role'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$db = new Database();
$user = new User($db, null, $email, $username, $hashedPassword, $address, $role);
$userErrorHandler = new UserErrorHandler($user);
$authController = new AuthController($user, $userErrorHandler);
$userController = new UserController($user, $userErrorHandler);

$authController->ensureLogin();
$authController->ensureAdmin();

if (isset($_POST['submit'])) {
    $userController->create();
}