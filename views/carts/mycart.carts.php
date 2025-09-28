<?php
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

            <h1>Tổng số sản phẩm <?= $total ?> </h1>

            <?php if (!empty($carts)): ?>
                <?php foreach ($carts as $cart): ?>
                    <article class="card">
                        <div class="thumb">
                            <img src="/oop-bookstore/public/images/<?= $cart['cover']  ?>">
                        </div>

                        <div class="meta">
                            <div class="book-name"><?= $cart['book_name'] ?> </div>
                            <div class="author"><?= $cart['author'] ?> </div>
                            <div class="price-small"><?= $cart['price'] ?> </div>
                        </div>

                        <div class="qty-wrap">
                            <div class="col-label">Số lượng</div>
                            <div class="qty" role="group" aria-label="Quantity">
                                <button class="minus">-</button>
                                <span class="val"><?= $cart['quantity'] ?></span>
                                <button class="plus">+</button>
                            </div>
                        </div>

                        <div class="money-wrap">
                            <div class="col-label">Thành tiền</div>
                            <div class="money"><?= $cart['total_price'] ?> </div>
                        </div>

                        <div class="action">
                            <form action="../../actions/buyNow.actions.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                                <div class="act">
                                    <button type="submit" class="buy">Mua ngay</button>
                                </div>
                            </form>
                            
                            <div class="del">
                                <a href="../../actions/carts/deleteCart.carts.php?id=<?= $cart['id'] ?>" class="trash">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>There's no products in cart</h3>
            <?php endif; ?>
        </main>
    </div>
    <!--footer-->
    <?php include '../layouts/footer.layouts.php' ?>

    <script src="/oop-bookstore/public/js/quantityUpdater.js"></script>
</body>

</html>