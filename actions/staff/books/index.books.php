<?php
session_start();

include_once '../../../models/book.models.php';

include_once '../../../controllers/authController.controllers.php';

$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();

$book = new Book();

if (isset($_GET['found'])) {
    $found = $_GET['data'] ?? '';
    $idData = $found ?? '';
    $bookNameData = "%$found%" ?? '';

    $start = 0;
    $row_per_page = 5;

    $records = $book->getFindBookCount($idData, $bookNameData);

    $pages = ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $books = $book->getBook($idData, $bookNameData, $start, $row_per_page);
} else {
    $start = 0;
    $row_per_page = 5;

    $records = $book->getAllBookCount();

    $pages = ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $books = $book->getAllBook($start, $row_per_page);
}