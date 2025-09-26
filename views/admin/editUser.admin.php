<?php

session_start();

include_once '../../models/user.models.php';

$db = new Database();
$user = new User($db);
$id = $_GET['id'] ?? '';

$userEdit = $user->getUserToEdit($id);

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

$error_username = $_SESSION['error_username'] ?? '';
unset($_SESSION['error_username']);

$error_email = $_SESSION['error_email'] ?? '';
unset($_SESSION['error_email']);

$error_address = $_SESSION['error_address'] ?? '';
unset($_SESSION['error_address']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/admin/editUser.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <title>Edit User</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="container">
            <div class="container-header">
                <h2>EDIT USER INFORMATION</h2>
            </div>

            <!-- Form edit thông tin user -->
            <div class="container-content">
                <form action="../../actions/admin/editUser.admin.php" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">

                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userEdit['username']) ?>" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($userEdit['email']) ?>" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($userEdit['address']) ?>" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="role">Role: </label>
                        <select name="role" id="role">
                            <option value="1" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_USER ? 'selected' : '') ?>>Customer</option>
                            <option value="2" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_STAFF ? 'selected' : '') ?>>Staff</option>
                            <option value="3" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_ADMIN ? 'selected' : '') ?>>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <a href="dashboard.admin.php?page_number=1" class="cancel-btn">Go back</a>
                        <input type="submit" class="submit-btn" value="Save">


                        <?php if (!empty($error)): ?>
                            <div class="error-box"><?= htmlspecialchars($error) ?></div>
                        <?php elseif (!empty($error_username)): ?>
                            <div id="error-box" class="error-box"><?= htmlspecialchars($error_username) ?></div>
                        <?php elseif (!empty($error_email)): ?>
                            <div class="error-box"><?= htmlspecialchars($error_email) ?></div>
                        <?php elseif (!empty($error_address)): ?>
                            <div class="error-box"><?= htmlspecialchars($error_address) ?></div>
                        <?php endif; ?>
                    </div>

                </form>

            </div>

        </div>

    </div>
</body>

</html>