<?php 

session_start();
$username = $_SESSION['username'] ?? 'Guest';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME <?php echo htmlspecialchars($username) ?></h1>
    <a href="auth/register.auth.php">register</a>
    <a href="auth/login.auth.php">login</a>
</body>
</html>