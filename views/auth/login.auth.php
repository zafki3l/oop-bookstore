<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\oop-bookstore\public\css\rule.css">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <div class="main-content">
        <form action="../../actions/auth/login.auth.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit">Login</button>
        </form>
        <a href="../homepage.views.php">cancel</a>
    </div>

    <!--Footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>

</html>