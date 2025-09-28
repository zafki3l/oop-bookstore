<?php

include_once '../../../controllers/categoryController.controllers.php';
include_once '../../../controllers/authController.controllers.php';

$authController = new AuthController();

$name = $_POST['name'];
$categoryController = new CategoryController($category = new Category($db = new Database(), null, $name));
$categoryController->create();