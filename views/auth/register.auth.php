<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/auth/register.css">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <div class="main-content">
        <div class="register-container">
            <form action="../../actions/auth/register.auth.php" method="post">
                <div>
                    <div>
                        <label for="username">Username: *</label>
                        <input type="text" name="username" id="username" placeholder="Username">
                    </div>
                    <div>
                        <label for="email">Email: * </label>
                        <input type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div>
                        <label for="address">Address: * </label>
                        <input type="text" name="address" id="address" placeholder="address">
                    </div>
                    <div>
                        <label for="password">Password: *</label>
                        <input type="password" name="password" id="password" placeholder="password">
                    </div>
                    <div>
                        <label for="password-confirmation">Password confirm: *</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" placeholder="Confirm your password">
                    </div>
                </div>

                <div id="error-box" class="error-box">
                    <?= htmlspecialchars($error) ?>
                </div>

                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
            <p>
                Already have an account?
                <a href="login.auth.php">Login</a>
            </p>
        </div>
    </div>
    <!--Footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>

</html>