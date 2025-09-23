<?php 

include_once '../../models/user.models.php';

$db = new Database();
$user = new User($db);
$id = $_GET['id'] ?? '';

$userEdit = $user->getUserToEdit($id);
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
        <!-- Form edit thông tin user -->
        <form action="../../actions/admin/editUser.admin.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userEdit['username']) ?>" placeholder="Username">

            <br>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($userEdit['email']) ?>" placeholder="Email">

            <br>


            <label for="address">Address: </label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($userEdit['address']) ?>" placeholder="Address">

            <br>
            <select name="role" id="role">
                <option value="1" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_USER ? 'selected' : '') ?> >Customer</option>
                <option value="2" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_STAFF ? 'selected' : '') ?> >Staff</option>
                <option value="3" <?php echo htmlspecialchars($userEdit['role'] == $user::ROLE_ADMIN ? 'selected' : '') ?> >Admin</option>
            </select>

            <br>
            <input type="submit">
        </form>

        <a href="dashboard.admin.php">Go back</a>
    </div>
</body>

</html>