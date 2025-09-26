<?php

session_start();

include_once '../../controllers/authController.controllers.php';

$db = new Database();
$user = new User($db);
$userErrorHandler = new UserErrorHandler($user);
$authController = new AuthController($user, $userErrorHandler);

$authController->ensureLogin();
$authController->ensureAdmin();

$username = $_SESSION['username'];

// Find user
if (isset($_GET['found'])) {
    $found = $_GET['user'] ?? '';
    $id = $found ?? '';
    $usernameData = "%$found%" ?? '';

    $users = $user->findUser($id, $usernameData);
} else {
    $users = $user->getAllUser();
}