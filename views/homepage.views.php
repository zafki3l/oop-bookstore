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
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>Homepag  e</title>
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

        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
    </div>

    <!--Footer-->
    <?php include 'layouts/footer.layouts.php' ?>
</body>

</html>