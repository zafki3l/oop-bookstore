<?php

session_start();

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

$error_username = $_SESSION['error_username'] ?? '';
unset($_SESSION['error_username']);

$error_email = $_SESSION['error_email'] ?? '';
unset($_SESSION['error_email']);

$error_address = $_SESSION['error_address'] ?? '';
unset($_SESSION['error_address']);

$error_password = $_SESSION['error_password'] ?? '';
unset($_SESSION['error_password']);

$error_password_confirmation = $_SESSION['error_password_confirmation'] ?? '';
unset($_SESSION['error_password_confirmation']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/auth/register.css">
    <title>Register</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <div class="main-content">
        <div class="register-container">
            <h2>REGISTER</h2>
            <form action="../../actions/auth/register.auth.php" method="post">
                <div>
                    <div>
                        <label for="username">Username: *</label>
                        <input type="text" name="username" id="username" placeholder="Username">
                    </div>

                    <div id="error-box" class="error-box">
                        <?= htmlspecialchars($error_username) ?>
                    </div>

                    <div>
                        <label for="email">Email: * </label>
                        <input type="text" name="email" id="email" placeholder="email">
                    </div>

                    <div id="error-box" class="error-box">
                        <?= htmlspecialchars($error_email) ?>
                    </div>

                    <div>
                        <label for="address">Address: * </label>
                        <input type="text" name="address" id="address" placeholder="address">
                    </div>

                    <div id="error-box" class="error-box">
                        <?= htmlspecialchars($error_address) ?>
                    </div>

                    <div>
                        <label for="password">Password: *</label>
                        <input type="password" name="password" id="password" placeholder="password">
                    </div>

                    <div id="error-box" class="error-box">
                        <?= htmlspecialchars($error_password) ?>
                    </div>

                    <div>
                        <label for="password-confirmation">Password confirm: *</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" placeholder="Confirm your password">
                    </div>

                    <div id="error-box" class="error-box">
                        <?= htmlspecialchars($error_password_confirmation) ?>
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