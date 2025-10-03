<?php
session_start();

include_once '../models/book.models.php';

$data = $_GET['book'];
$book_name = "%$data%" ?? '';
$author = "%$data%" ?? '';

$book = new Book();
$books = $book->searchBook($book_name, $author);

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
    <?php include 'layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include 'layouts/searchbar.layouts.php' ?>

    <div class="main-content">

        <h2 class="search-text">Search result for '<?= $data ?>' </h3>

        <div class="book-grid">
            <?php foreach ($books as $book): ?>
                <div class="book-item">
                    <!-- Nút xem chi tiết -->
                    <a href="viewDetail.views.php?book=<?php echo $book['id'] ?>">
                        <img src="../public/images/<?php echo htmlspecialchars($book['cover']) ?>"
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
                        <form action="buyform.views.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <input type="hidden" name="book_name" value="<?php echo $book['name']; ?>">
                            <input type="hidden" name="author" value="<?php echo $book['author']; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-buy-now">Buy now</button>
                        </form>
                    <?php else: ?>
                        <form action="buyform.views.php" method="post">
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
    </div>

    <!--Footer-->
    <?php include 'layouts/footer.layouts.php' ?>
</body>

</html>