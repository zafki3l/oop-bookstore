<?php

include_once '../../controllers/authController.controllers.php';

$db = new Database();
$user = new User($db);
$userErrorHandler = new UserErrorHandler($user);
$authController = new AuthController($user, $userErrorHandler);

// Nếu như người dùng bấm logout
if (isset($_POST['logout'])) {
    $authController->logout();
}