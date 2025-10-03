<?php
session_start();

include_once '../../models/book.models.php';

$category_id = $_GET['category'];

$book = new Book();
$books = $book->getBookByCategory($category_id);

function loginMessage() { return htmlspecialchars($_SESSION['login_success']); }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>Homepage</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include '../layouts/searchbar.layouts.php' ?>

    <div class="main-content">
        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo loginMessage(); ?>
            <?php endif; ?>
        </div>
        <!-- NEW BOOKS -->
        <h2 class="section">
            <?php 
            switch ($category_id) {
                case 1: $category = 'FICTION'; break;
                case 2: $category = 'HISTORY'; break;
                case 3: $category = 'SCIENCE'; break;
                case 4: $category = 'NON-FICTION'; break;
                default: $category = 'UNKNOWN';
            }

            echo $category;
            ?>
        </h2>

        <div class="book-grid">
            <?php foreach ($books as $book): ?>
                <div class="book-item">
                    <!-- Nút xem chi tiết -->
                    <a href="../viewDetail.views.php?book=<?php echo $book['id'] ?>">
                        <img src="../../public/images/<?php echo htmlspecialchars($book['cover']) ?>"
                            alt="<?php echo htmlspecialchars($book['name']) ?>">
                    </a>
                    <h3 class="book-title"><?php echo htmlspecialchars($book['name']) ?></h3>
                    <p class="book-author"><?php echo htmlspecialchars($book['author']) ?></p>
                    <p class="book-price">
                        <?php
                        $price = $book['price'] * (1 + 0.2);
                        echo number_format($price, 0, ',', '.');
                        ?> VND
                    </p>

                    <!-- Nếu khách hàng đã đăng nhập -->
                    <?php if (isset($_SESSION['id'])): ?>
                        <form action="../buyform.views.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <input type="hidden" name="book_name" value="<?php echo $book['name']; ?>">
                            <input type="hidden" name="cover" value="<?php echo $book['cover']; ?>">
                            <input type="hidden" name="author" value="<?php echo $book['author']; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-buy-now">Buy now</button>
                        </form>
                    <?php else: ?>
                        <form action="../buyform.views.php" method="post">
                            <input type="hidden" name="cover" value="<?php echo $book['cover']; ?>">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <input type="hidden" name="book_name" value="<?php echo $book['name']; ?>">
                            <input type="hidden" name="author" value="<?php echo $book['author']; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-buy-now">Buy now</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
    </div>

    <!--Footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>

</html>