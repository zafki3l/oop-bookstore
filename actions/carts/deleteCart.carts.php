<?php

include_once '../../controllers/cartController.controllers.php';

$id = $_GET['id'];

$cart = new CartController();
$cart->delete($id);