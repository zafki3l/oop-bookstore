<?php
include_once '../../../models/category.models.php';

$category = new Category();

$categories = $category->getAllCategory();