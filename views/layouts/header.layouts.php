<?php 
    $role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\oop-bookstore\public\css\layouts\header.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <ul type="none" class="nav-menu">
            <div class="nav-left">
                <li>
                    <div class="dropdown">
                        <button>Category</button>
                        <div class="content">
                        <a href="#">Fiction</a>
                        <a href="#">Non-Fiction</a>
                        <a href="#">Science</a>
                        <a href="#">History</a>
                    </div>
                <li><a href="\oop-bookstore\views\homepage.views.php">Homepage</a></li>
                <?php if($role == 3): ?> <!--admin-->
                        <li><a href="../admin/dashboard.php">Admin Dashboard</a></li> <!--show dashboard for admin-->
                        <li><a href="../staff/books/bookIndex.php">Staff Dashboard</a></li>
                <?php elseif($role == 2): ?>
                        <li><a href="../staff/dashboard.php">Staff Dashboard</a></li> <!--Show dashboard for staff-->
                <?php endif; ?>
            </div>

            <div class="nav-right">
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="#">Account</a></li>
                    <li>
                        <a href="#" onclick="document.getElementById('logoutForm').submit(); return false;">Logout</a>
                    </li>
                    <form id="logoutForm" action="\oop-bookstore\actions\auth\logout.auth.php" method="post" style="display:none;">
                        <input type="hidden" name="logout" value="1">
                    </form>
                <?php else: ?>
                    <li><a href="\oop-bookstore\views\auth\register.auth.php">Register</a></li>
                    <li><a href="\oop-bookstore\views\auth\login.auth.php">Login</a></li>
                <?php endif; ?>
            </div>
        </ul>
    </div>
</body>
</html>