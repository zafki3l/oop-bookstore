<?php

use function PHPSTORM_META\type;

 session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>Buy now</title>
</head>

<body>
    <!--Header-->
    <?php include 'layouts/header.layouts.php' ?>

    <div class="main-content">
        <?php if (isset($_SESSION['id'])): ?>
            <div class="user-infor">
                <p><?= $_SESSION['username'] ?></p>
                <p><?= $_SESSION['email'] ?></p>
                <p><?= $_SESSION['address'] ?></p>
            </div>

            <div class="book-infor">
                <p><?= $_POST['book_name'] ?></p>
                <p><?= $_POST['author'] ?></p>
                <p><?= $_POST['price'] ?></p>
                <p><?= $_POST['quantity'] ?></p>
                <p><?= $_POST['price'] * $_POST['quantity'] ?></p>
            </div>

            <form action="../actions/buyNow.actions.php" method="post">
                <input type="hidden" name="book_id" value="<?= $_POST['book_id'] ?>">
                <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
                <input type="hidden" name="quantity" value="<?= $_POST['quantity'] ?>">
                <input type="submit" name="buy" value="buy">
            </form>
        <?php else: ?>
            <form action="../actions/buyNow.actions.php" method="post">
                <div class="user-infor">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <div class="book-infor">
                    <p><?= $_POST['book_name'] ?></p>
                    <p><?= $_POST['author'] ?></p>
                    <p><?= $_POST['price'] ?></p>
                    <p><?= $_POST['quantity'] ?></p>
                    <p><?= $_POST['price'] * $_POST['quantity'] ?></p>
                </div>

                <input type="hidden" name="book_id" value="<?= $_POST['book_id'] ?>">
                <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
                <input type="hidden" name="quantity" value="<?= $_POST['quantity'] ?>">
                <input type="submit" name="submit" value="buy">
            </form>
        <?php endif; ?>
    </div>

<!--Footer-->
<?php include 'layouts/footer.layouts.php' ?>
</body>

</html>