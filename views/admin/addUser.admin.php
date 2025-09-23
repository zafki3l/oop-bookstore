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
        <!-- Form nhập thông tin user -->
        <form action="../../actions/admin/createUser.admin.php" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Username">

            <br>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email" placeholder="Email">

            <br>

            <label for="password">Password: </label>
            <input type="text" id="password" name="password" placeholder="Password">

            <br>

            <label for="address">Address: </label>
            <input type="text" id="address" name="address" placeholder="Address">

            <br>
            <select name="role" id="role">
                <option value="1">Customer</option>
                <option value="2">Staff</option>
                <option value="3">Admin</option>
            </select>

            <br>
            <input type="submit">
        </form>

        <a href="dashboard.admin.php">Go back</a>
    </div>
</body>

</html>