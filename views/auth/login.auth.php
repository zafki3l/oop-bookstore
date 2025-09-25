<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

function registerMessage() { return htmlspecialchars($_SESSION['register-success']); }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/auth/login.css">
    <title>Login</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <div class="main-content">

        <!-- Thông báo register thành công -->
        <div class="register-message">
            <?php if (isset($_SESSION['register-success'])): ?>
                <?php echo htmlspecialchars(registerMessage()) ?>
            <?php endif; ?>
        </div>

        <div class="login-container">
            <h2>LOGIN</h2>
            <form action="../../actions/auth/login.auth.php" method="post">
                <label for="email">Email: *</label>
                <input type="email" id="email" name="email" placeholder="Email">
                <br>
                <label for="password">Password: *</label>
                <input type="password" name="password" placeholder="Password">
                <br>
                <button type="submit">Login</button>
            </form>

            <div id="error-box" class="error-box">
                <?= htmlspecialchars($error) ?>
            </div>

            <p>
                Don't have an account?
                <a href="register.auth.php">Register</a>
            </p>
        </div>

        <?php if (!empty($_SESSION['register-success'])): ?>
            <script src="/oop-bookstore/public/js/registerMessage.js"></script>
            <?php unset($_SESSION['register_success']); ?>
        <?php endif; ?>
    </div>

    <!--Footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>

</html>