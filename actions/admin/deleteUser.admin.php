<?php

session_start();

include_once '../../controllers/userController.controllers.php';

$id = $_POST['id'];

$db = new Database();
$user = new User($db);
$userController = new UserController($user);
$userController->delete($id);