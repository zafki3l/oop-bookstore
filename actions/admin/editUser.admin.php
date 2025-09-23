<?php

session_start();

include_once '../../controllers/userController.controllers.php';
include_once '../../controllers/authController.controllers.php';

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$role = $_POST['role'];

$db = new Database();
$user = new User($db, $id, $email, $username, null, $address, $role);
$authController = new AuthController($user);

$authController->ensureLogin();
$authController->ensureAdmin();

$userController = new UserController($user);
$userController->edit();