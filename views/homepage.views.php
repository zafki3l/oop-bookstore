<?php 
session_start();
$username = $_SESSION['username'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\oop-bookstore\public\css\homepage.css">
    <link rel="stylesheet" href="\oop-bookstore\public\css\rule.css">
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <?php include('layouts/header.layouts.php') ?>
    <div class="header">
        <ul type="none" class="user-menu">
            <div class="search-bar">
                <form action="\bookStore\view\homepage\searchResult.php" method="get">
                    <input type="text" name="search" placeholder="Search books..."/>
                </form> 
            </div>
        </ul>
    </div>

    <div class="main-content">
        <h1>WELCOME <?php echo htmlspecialchars($username) ?></h1>
    </div>

    <!--Footer-->
    <?php include('layouts/footer.layouts.php') ?>
</body>
</html>