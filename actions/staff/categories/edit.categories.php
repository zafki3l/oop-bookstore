<?php

include_once '../../../controllers/categoryController.controllers.php';

$id = $_POST['id'];
$name = $_POST['name'];

$categoryController = new CategoryController($category = new Category($db = new Database(), $id, $name));
$categoryController->edit();