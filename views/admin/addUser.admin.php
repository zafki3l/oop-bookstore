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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <link rel="stylesheet" href="/oop-bookstore/public/css/admin/addUser.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <title>Create New User</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="container">
            <div class="container-header">
                <h2>CREATE NEW USER</h2>
            </div>

            <div class="container-content">
                <!-- Form nhập thông tin user -->
                <form action="../../actions/admin/createUser.admin.php" method="post">
                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="text" id="address" name="address" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="role">Role: </label>
                        <select name="role" id="role">
                            <option value="1">Customer</option>
                            <option value="2">Staff</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <a href="dashboard.admin.php?page_number=1" class="cancel-btn">Cancel</a>
                        <input type="submit" name="submit" value="Create User" class="submit-btn">

                        <!-- Hiển thị lỗi -->
                        <?php if (!empty($error)): ?>
                            <div class="error-box"><?= htmlspecialchars($error) ?></div>
                        <?php elseif (!empty($error_username)): ?>
                            <div id="error-box" class="error-box"><?= htmlspecialchars($error_username) ?></div>
                        <?php elseif (!empty($error_email)): ?>
                            <div class="error-box"><?= htmlspecialchars($error_email) ?></div>
                        <?php elseif (!empty($error_password)): ?>
                            <div class="error-box"><?= htmlspecialchars($error_password) ?></div>
                        <?php elseif(!empty($error_address)): ?>
                            <div class="error-box"><?= htmlspecialchars($error_address) ?></div>
                        <?php endif; ?>
                    </div>
            </div>

            </form>
        </div>

    </div>

    </div>
</body>

</html>