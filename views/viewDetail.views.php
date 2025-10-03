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
    <link rel="stylesheet" href="/oop-bookstore/public/css/viewdetail.css">
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
            <div class="img-book">
                <img src="../public/images/<?php echo htmlspecialchars($bookData['cover']); ?>"
                    alt="<?php echo htmlspecialchars($bookData['name']); ?>">
            </div>

            <div class="content">
                <div class="name-book">
                    <h1><?php echo htmlspecialchars($bookData['name']); ?></h1>
                </div>
                <div class="author-book">
                    <p><?php echo htmlspecialchars($bookData['author']); ?></p>
                </div>
                <div class="price">
                    <?php if (!empty($_GET['discounted'])): ?>
                        <p><strong><?php echo htmlspecialchars(number_format(($bookData['price'] * (1 + 0.2) / (1 + 0.2)), 0, ',', '.')); ?> VNĐ</strong></p>
                    <?php else: ?>
                        <p><strong><?php echo htmlspecialchars(number_format(($bookData['price'] * (1 + 0.2)), 0, ',', '.')); ?> VNĐ</strong></p>
                    <?php endif; ?>
                </div>

                <div class="qty-wrap">
                    <label for="">Quantity:</label>
                    <div class="qty">
                        <button type="button" class="minus">-</button>
                        <span class="val"><?php echo $quantity; ?></span>
                        <input type="hidden" id="main-quantity" value="<?= $quantity ?>">
                        <button type="button" class="plus">+</button>
                    </div>
                </div>

                <div class="button">
                    <!-- Buy form -->
                    <form action="buyform.views.php" method="post" class="buy-form">
                        <input type="hidden" name="book_name" value="<?= $bookData['name'] ?>">
                        <input type="hidden" name="author" value="<?= $bookData['author'] ?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                        <input type="hidden" name="book_id" value="<?= $bookData['id'] ?>">
                        <input type="hidden" name="cover" value="<?php echo $bookData['cover']; ?>">
                        <input type="hidden" name="price" value="<?= $bookData['price'] * (1 + 0.2) ?>">
                        <input type="hidden" name="quantity" class="buy-quantity" value="<?= $quantity ?>">
                        <button type="submit" class="buy">Buy now</button>
                    </form>

                    <!-- Cart form -->
                    <form action="../actions/carts/addcart.carts.php" method="post" class="cart-form">
                        <input type="hidden" name="book_id" value="<?= $bookData['id'] ?>">
                        <input type="hidden" name="price" value="<?= $bookData['price'] * (1 + 0.2) ?>">
                        <button type="submit" class="cart-btn">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="book-detail">
            <div class="header">
                <h3>More Information About "<?php echo htmlspecialchars($bookData['name']); ?>"</h3>
            </div>
            <div class="stock">
                <label for="">Stock-Quantity:</label>
                <p><?php echo htmlspecialchars($bookData['quantity']); ?></p>
            </div>

            <div class="name">
                <label for="">Book Name:</label>
                <p><?php echo htmlspecialchars($bookData['name']); ?></p>
            </div>

            <div class="author">
                <label for="">Author:</label>
                <p><?php echo htmlspecialchars($bookData['author']); ?></p>
            </div>

            <div class="publisher-book">
                <label for="">Publisher:</label>
                <p><?php echo htmlspecialchars($bookData['publisher']); ?></p>
            </div>

            <div class="pages-book">
                <label for="">Pages:</label>
                <p><?php echo htmlspecialchars($bookData['pages']); ?></p>
            </div>
        </div>

        <div class="book-description">
            <div class="header">
                <h3>Description</h3>
            </div>
            <div class="description">
                <p><?php echo htmlspecialchars($bookData['description']); ?></p>
            </div>
        </div>

    </div>

    <!--Footer-->
    <?php include 'layouts/footer.layouts.php' ?>

</body>

</html>

<script>
    const plus = document.querySelector('.plus');
const minus = document.querySelector('.minus');
const val = document.querySelector('.val');
const mainQuantity = document.getElementById('main-quantity');

const buyQuantity = document.querySelector('.buy-quantity');
const cartQuantity = document.querySelector('.cart-quantity');

let quantity = parseInt(val.innerText);

function updateQuantityDisplay() {
    val.innerText = quantity;
    mainQuantity.value = quantity;
    buyQuantity.value = quantity;
    cartQuantity.value = quantity;
}

plus.addEventListener('click', () => {
    quantity++;
    updateQuantityDisplay();
});

minus.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        updateQuantityDisplay();
    }
});

</script>