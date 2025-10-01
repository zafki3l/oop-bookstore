<?php

session_start();

include_once '../models/book.models.php';

$book_id = $_GET['book'];
$book = new Book();
$bookData = $book->getBookById($book_id);
$quantity = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/cartmanagement/cartmanagement.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>Book Detail</title>
</head>

<body>
    <!--Header-->
    <?php include 'layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include 'layouts/searchbar.layouts.php' ?>

    <div class="main-content">
        <div class="book-container">
            <form action="#" method="post" class="book-container">
                <div class="img-book">
                    <img src="../public/images/<?php echo htmlspecialchars($bookData['cover']); ?>"
                        alt="<?php echo htmlspecialchars($bookData['name']); ?>">
                </div>
                <div class="name-book">
                    <h1><?php echo htmlspecialchars($bookData['name']); ?></h1>
                </div>
                <div class="brand-book">
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($bookData['author']); ?></p>
                </div>
                <div class="content-summary">
                    <p><strong>Description:</strong> <?php echo htmlspecialchars(number_format(($bookData['price'] * (1 + 0.2)), 0, ',', '.')); ?>VNĐ</p>
                </div>

                <div class="qty-wrap">
                    <div class="qty">
                        <button type="button" class="minus">-</button>
                        <span class="val"><?php echo $quantity; ?>
                        </span>
                        <input type="hidden" name="quantity" value="<?= $quantity ?>" class="quantity-input">
                        <button type="button" class="plus">+</button>
                    </div>
                </div>
                <button type="submit" class="buy">Mua ngay</button>
            </form>

            <form action="../actions/carts/addcart.carts.php" method="post">
                <input type="hidden" name="book_id" value="<?= $bookData['id'] ?>">
                <input type="hidden" name="price" value="<?= $bookData['price'] * (1 + 0.2) ?>">
                <input type="hidden" name="quantity" value="<?= 1 ?>">
                <button type="submit">Add to cart</button>
            </form>
        </div>

    </div>

    <!--Footer-->
    <?php include 'layouts/footer.layouts.php' ?>

</body>

</html>

<script>
    const container = document.querySelector('.book-container');

    if (container) {
        const plus = container.querySelector('.plus');
        const minus = container.querySelector('.minus');
        const val = container.querySelector('.val');
        const hiddenInput = container.querySelector('input[name="quantity"]');

        let quantity = parseInt(val.innerText);

        plus.addEventListener('click', () => {
            quantity++;
            val.innerText = quantity;
            hiddenInput.value = quantity;
        });

        minus.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                val.innerText = quantity;
                hiddenInput.value = quantity;
            }
        });
    }
</script>