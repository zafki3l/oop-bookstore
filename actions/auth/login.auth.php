<?php

include_once '../../controllers/authController.controllers.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Change your request method to POST');
}

$email = $_POST['email'];
$inputPassword = $_POST['password'];

$db = new Database();
$user = new User($db, null, $email, null, $inputPassword);
$userErrorHandler = new UserErrorHandler($user);
$authController = new AuthController($user, $userErrorHandler);

$authController->login();
