<?php
include_once '../models/book.models.php';

$book = new Book();
$books = $book->onSales();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/homepage/homepage.css">
    <link rel="stylesheet" href="../../public/css/homepage/bookSection.css">
</head>

<body>
    <h2 class="section">ON SALES</h2>

    <div class="book-grid">
        <?php foreach ($books as $book): ?>
            <div class="book-item">
                <!-- Nút xem chi tiết -->
                <a href="viewDetail.views.php?book=<?php echo $book['id'] ?>&discounted=yes">
                    <img src="../public/images/<?php echo htmlspecialchars($book['cover']) ?>"
                        alt="<?php echo htmlspecialchars($book['name']) ?>">
                </a>
                <h3 class="book-title"><?php echo htmlspecialchars($book['name']) ?></h3>
                <p class="book-author"><?php echo htmlspecialchars($book['author']) ?></p>
                <p class="discounted-price">
                    <?php
                    $discounted_price = $book['price'] * (1 + 0.2) / (1 + 0.2);
                    echo number_format($discounted_price, 0, ',', '.');
                    ?> VND (20% Discounted)
                </p>

                <p class="original-price">
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
                        <input type="hidden" name="cover" value="<?php echo $book['cover']; ?>">
                        <input type="hidden" name="price" value="<?php echo $discounted_price; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn-buy-now">Buy now</button>
                    </form>
                <?php else: ?>
                    <form action="buyform.views.php" method="post">
                        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                        <input type="hidden" name="book_name" value="<?php echo $book['name']; ?>">
                        <input type="hidden" name="author" value="<?php echo $book['author']; ?>">
                        <input type="hidden" name="price" value="<?php echo $discounted_price; ?>">
                        <input type="hidden" name="cover" value="<?php echo $book['cover']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn-buy-now">Buy now</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>