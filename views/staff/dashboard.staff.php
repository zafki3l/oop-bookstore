<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';

function loginMessage() { return htmlspecialchars($_SESSION['login_success']); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <title>Staff Dashboard</title>
</head>
<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        
        <div class="staff-information">
            <h1>WELCOME <?php echo htmlspecialchars($username) ?></h1>
        </div>

        <div class="categories-container">
            <h1>Category Management</h1>
        </div>

        <div class="books-container">
            <h1>Book Management</h1>
        </div>

        <div class="sales-report-container">
            <h1>Sales Report</h1>
        </div>

        <div class="orders-container">
            <h1>Order Management</h1>
        </div>

        <div class="total-order-container">
            <h1>Total Order</h1>
        </div>

        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo loginMessage(); ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
    </div>
</body>
</html>