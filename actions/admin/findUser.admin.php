<?php

session_start();

include_once '../../controllers/authController.controllers.php';
include_once '../../config/database.config.php';
include_once '../../models/user.models.php';

$db = new Database();
$userModel = new User($db);
$authController = new AuthController($userModel);

$authController->ensureLogin();
$authController->ensureAdmin();

$users = [];

if (isset($_GET['found'])) {
    $user = $_GET['user'] ?? '';
    $id = $user ?? '';
    $username = "%$user%" ?? '';

    $users = $userModel->findUser($id, $username);
}
