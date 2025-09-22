<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\oop-bookstore\public\css\rule.css">
    <link rel="stylesheet" href="\oop-bookstore\public\css\auth\login.css">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <div class="main-content">
        <div class="login-container">
            <h2>LOGIN</h2>
            <form action="../../actions/auth/login.auth.php" method="post">
                <label for="email">Email: *</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <br>
                <label for="password">Password: *</label>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <button type="submit">Login</button>
            </form>
            <p>
                Don't have an account?
                <a href="register.auth.php">Register</a>
            </p>
        </div>
    </div>

    <!--Footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>

</html>