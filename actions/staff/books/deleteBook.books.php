<?php

session_start();

include_once '../../../controllers/bookController.controllers.php';
include_once '../../../controllers/authController.controllers.php';

$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$id = $_POST['id'];

$bookController = new BookController();
$bookController->delete($id);