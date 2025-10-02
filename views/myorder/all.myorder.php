<?php
session_start();
include '../../models/order.models.php';

$order = new Order();
$orders = $order->getAllUserOrder();

$all = $order->countAllUserOrder();
$pending = $order->countUserOrderByStatus(0);
$beingDelivered = $order->countUserOrderByStatus(1);
$completed = $order->countUserOrderByStatus(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/myorder.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <title>My order</title>
</head>
<body>
<!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
<!-- Search bar -->
    <?php include '../layouts/searchbar.layouts.php' ?>

    <div class="main-content">
        <main class="page">
            <!-- Red band content area -->
            <section class="redband">
                <div class="container">
                    <?php include 'list.myorder.php' ?>

                    <!-- Orders list -->
                    <div class="orders">
                        <?php foreach ($orders as $order): ?>
                            <article class="card">
                                <div class="hdr"><div class="id"># <?= $order['order_id'] ?></div>
                                <div class="status">
                                    <p><?php
                                        switch ($order['status']) {
                                            case 0: $statusName = 'Pending'; break;
                                            case 1: $statusName = 'Being Delivered'; break;
                                            case 2: $statusName = 'Completed'; break;
                                            default: $statusName = 'Unknown'; 
                                        } 
                                        echo $statusName;
                                    ?></p>
                                </div></div>
                                <div class="divider"></div>
                                <div class="row">
                                    <img class="thumb" src="/oop-bookstore/public/images/<?= $order['cover'] ?>"/>
                                    <div class="meta">
                                        <div class="title"><?= $order['book_name'] ?></div>
                                        <div class="author"><?= $order['author'] ?></div>
                                        <div class="unit"><b><?= number_format($order['price'], 0, ',', '.') ?> VND</b></div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="note">Quantity: x<?= $order['quantity'] ?></div>
                                
                                <div class="summary">
                                    <div class="right-box">
                                        <div class="total"><strong>Total: <?= number_format($order['total_price'], 0, ',', '.') ?> VND</strong></div>
                                        <?php if ($order['status'] == 2): ?>
                                            <form action="../buyform.views.php" method="post">
                                                
                                                <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                                                <input type="hidden" name="book_id" value="<?php echo $order['book_id']; ?>">
                                                <input type="hidden" name="book_name" value="<?php echo $order['book_name']; ?>">
                                                <input type="hidden" name="author" value="<?php echo $order['author']; ?>">
                                                <input type="hidden" name="price" value="<?php echo $order['price'] ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn buyback">Buy again</button>
                                            </form>      
                                        <?php endif; ?>  
                                    </div>
                                                                    
                                </div>
                                
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>        
        </main>
    </div>
    

<!--footer-->
    <?php include '../layouts/footer.layouts.php' ?>
    
</body>
</html>