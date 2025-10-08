<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';

function loginMessage() { return htmlspecialchars($_SESSION['login_success']); }

function buyMessage()
{
    return $_SESSION['buy_success'];
}

function addCartMessage() 
{
    return $_SESSION['add_cart_success'];
}

function errorCartMessage() 
{
    return $_SESSION['add_cart_error'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>Homepage</title>
</head>

<body>
    <!--Header-->
    <?php include 'layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include 'layouts/searchbar.layouts.php' ?>

    <div class="main-content">
        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo loginMessage(); ?>
            <?php endif; ?>
        </div>
        <!-- NEW BOOKS -->
        <?php include_once 'section/newBooks.section.php' ?>

        <!-- ON SALES -->
        <?php include_once 'section/onSales.section.php' ?>

        <!-- ON SALES -->
        <?php include_once 'section/bestSeller.section.php' ?>


        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>

        <!-- Thông báo mua hàng thành công -->
        <div class="buy-message">
            <?php if (isset($_SESSION['buy_success'])): ?>
                <?php echo buyMessage(); ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($_SESSION['buy_success'])): ?>
            <script src="/oop-bookstore/public/js/buyMessage.js"></script>
            <?php unset($_SESSION['buy_success']); ?>
        <?php endif; ?>

        <!-- Thông báo thêm giỏ hàng thành công -->
        <div class="cart-message">
            <?php if (isset($_SESSION['add_cart_success'])): ?>
                <?php echo addCartMessage(); ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($_SESSION['add_cart_success'])): ?>
            <script src="/oop-bookstore/public/js/cartMessage.js"></script>
            <?php unset($_SESSION['add_cart_success']); ?>
        <?php endif; ?>


        <!-- Lỗi thêm giỏ hàng -->
        <div class="cart-error">
            <?php if (isset($_SESSION['add_cart_error'])): ?>
                <?php echo errorCartMessage(); ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($_SESSION['add_cart_error'])): ?>
            <script src="/oop-bookstore/public/js/cartError.js"></script>
            <?php unset($_SESSION['add_cart_error']); ?>
        <?php endif; ?>

    </div>

    <!--Footer-->
    <?php include 'layouts/footer.layouts.php' ?>
</body>

</html>