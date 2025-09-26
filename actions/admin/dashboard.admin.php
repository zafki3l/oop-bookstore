<?php

session_start();

include_once '../../controllers/authController.controllers.php';

$db = new Database();
$user = new User($db);
$userErrorHandler = new UserErrorHandler($user);
$authController = new AuthController($user, $userErrorHandler);

$authController->ensureLogin();
$authController->ensureAdmin();

$username = $_SESSION['username'];


// Find user
if (isset($_GET['found'])) {
    $found = $_GET['data'] ?? '';
    $id = $found ?? '';
    $usernameData = "%$found%" ?? '';

    $start = 0;
    $row_per_page = 10;

    // Lấy ra tổng số bản ghi
    $records = $user->getFindUserCount($id, $usernameData);

    // Tính số trang
    $pages = ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $users = $user->findUser($id, $usernameData, $start, $row_per_page);
} else {
    $start = 0;
    $row_per_page = 10;

    // Lấy ra tổng số bản ghi
    $records = $user->getAllUserCount();

    // Tính số trang
    $pages = ceil($records / $row_per_page);

    if (isset($_GET['page_number'])) {
        $page = $_GET['page_number'] - 1;
        $start = $page * $row_per_page;
    }

    $users = $user->getAllUser($start, $row_per_page);
}