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
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo loginMessage(); ?>
            <?php endif; ?>
        </div>
        
        <h1>WELCOME <?php echo htmlspecialchars($username) ?></h1>

        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
    </div>
</body>
</html>