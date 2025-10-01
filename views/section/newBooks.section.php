<?php
include_once '../models/book.models.php';

$book = new Book();
$books = $book->newBooks();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/homepage/homepage.css">
    <link rel="stylesheet" href="../../public/css/homepage/bookSection.css">
    <title>ON SALES</title>
</head>

<body>
    <h2 class="section">ON SALES</h2>

    <div class="book-grid">
        <?php foreach ($books as $book): ?>
            <div class="book-item">
                <!-- Nút xem chi tiết -->
                <a href="#">
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
                    <form action="#" method="post">
                        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn-buy-now">Buy now</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>