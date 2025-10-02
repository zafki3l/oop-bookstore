<?php
session_start();
include_once '../../actions/carts/cartmanagement.carts.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/cartmanagement/cartmanagement.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/pagination.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>cart management</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include '../layouts/searchbar.layouts.php' ?>

    <div class="main-content">
        <main class="page">
            <?php
            $total = 0;
            foreach ($carts as $cart) {
                $total++;
            }
            ?>

            <h1>Total Cart Item <?= $total ?> </h1>

            <?php if (!empty($carts)): ?>
                <?php foreach ($carts as $cart): ?>
                        <form action="../buyform.views.php" method="post" class="card">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="book_id" value="<?= $cart['book_id'] ?>">
                            <input type="hidden" name="book_name" value="<?= $cart['book_name'] ?>">
                            <input type="hidden" name="author" value="<?= $cart['author'] ?>">
                            <input type="hidden" name="price" value="<?= $cart['price'] ?>">
                        <div class="thumb">
                            <img src="/oop-bookstore/public/images/<?= $cart['cover']  ?>">
                        </div>

                        <div class="meta">
                            <div class="book-name"><?= $cart['book_name'] ?> </div>
                            <div class="author"><?= $cart['author'] ?> </div>
                            <div class="price-small"><?= number_format($cart['price'], 0, ',', '.') ?> </div>
                        </div>

                        <div class="qty-wrap">
                            <div class="qty">
                            <button type="button" class="minus">-</button>
                            <span class="val"><?= $cart['quantity'] ?></span>
                            <input type="hidden" name="quantity" value="<?= $cart['quantity'] ?>" class="quantity-input">
                            <button type="button" class="plus">+</button>
                            </div>
                        </div>

                        <div class="money-wrap">
                            <div class="col-label">Total</div>
                            <div class="money"><?= number_format($cart['total_price'], 0, ',', '.') ?>VNĐ </div>
                        </div>

                        <div class="action">
                            <button type="submit" class="buy">Buy Now</button>

                            <a href="../../actions/carts/deleteCart.carts.php?id=<?= $cart['id'] ?>" class="trash">
                            <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                        </form>

                <?php endforeach; ?>
            <?php else: ?>
                <h3>There's no products in cart</h3>
            <?php endif; ?>
        </main>
        <br>
        <br>
        <br>
    </div>
        <!--footer-->
        <?php include '../layouts/footer.layouts.php' ?>

        <script src="/oop-bookstore/public/js/quantityUpdater.js"></script>
</body>

</html>