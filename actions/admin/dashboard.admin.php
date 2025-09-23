<?php

session_start();

include_once '../../controllers/authController.controllers.php';
include_once 'getAllUser.admin.php';

$db = new Database();
$user = new User($db);
$authController = new AuthController($user);

$authController->ensureLogin();
$authController->ensureAdmin();

$username = $_SESSION['username'];

$users = $data;
