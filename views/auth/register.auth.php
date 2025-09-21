<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../actions/auth/register.auth.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <input type="text" name="address" placeholder="Address">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="password" name="password-confirmation" placeholder="Enter your password again">
        <br>
        <button type="submit">Register</button>
    </form> 
    <a href="../homepage.views.php">cancel</a>
</body>
</html>