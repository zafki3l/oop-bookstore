<?php

session_start();

include_once '../../controllers/userController.controllers.php';

$id = $_POST['id'];

$db = new Database();
$user = new User($db);
$userErrorHandler = new UserErrorHandler($user);
$userController = new UserController($user, $userErrorHandler);
$userController->delete($id);