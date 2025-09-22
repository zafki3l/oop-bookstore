<?php

include_once '../../controllers/authController.controllers.php';

$db = new Database();
$user = new User($db);
$authController = new AuthController($user);

// Nếu như người dùng bấm logout
if (isset($_POST['logout'])) {
    $authController->logout();
}