<?php
session_start();

include_once '../../../models/book.models.php';

include_once '../../../controllers/authController.controllers.php';

$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$book = new Book();

if (isset($_GET['found'])) {
    $found = $_GET['book'] ?? '';
    $idData = $found ?? '';
    $usernameData = "%$found%" ?? '';

    $books = $book->getBook($idData, $usernameData);
} else {
    $books = $book->getAllBook();
}