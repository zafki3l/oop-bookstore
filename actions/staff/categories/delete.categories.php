<?php

include_once '../../../controllers/categoryController.controllers.php';

$id = $_POST['id'];

$categoryController = new CategoryController($category = new Category($db = new Database(), $id));
$categoryController->delete();