<?php

$cart_id = $_POST['cart_id'] ?? '';
session_start() 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/homepage.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/buyform.css">
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
                <div class="header">
                    <h3>User Information</h3>
                </div>
                <div class="username">
                    <label for="">Username:</label>
                    <input type="text" value="<?= $_SESSION['username'] ?>" readonly>
                </div>
                
                <div class="email">
                    <label for="">Email:</label>
                    <input type="text" value="<?= $_SESSION['email'] ?>" readonly>
                </div>
                
                <div class="address">
                    <label for="">Address:</label>
                    <input type="text" value="<?= $_SESSION['address'] ?>" readonly>
                </div>
                
            </div>

            <div class="book-infor">
                <div class="header">
                    <h3>Book Information</h3>
                </div>

                <div class="content">
                    <div class="cover">
                        <img src="../public/images/<?= $_POST['cover'] ?>" alt="">
                    </div>
                    
                    <div class="book-content">
                        <div class="book_name">
                            <label for="">Book name:</label>
                            <p><?= $_POST['book_name'] ?></p>
                        </div>
                        
                        <div class="book_author">
                            <label for="">Author:</label>
                            <p><?= $_POST['author'] ?></p>
                        </div>

                        <div class="price">
                            <label for="">Price:</label>
                            <p><?= number_format($_POST['price'], 0, ',', '.') ?> VND</p>
                        </div>

                        <div class="quantity">
                            <label for="">Quantity:</label>
                            <p><?= $_POST['quantity'] ?></p>
                        </div>

                        <div class="total-price">
                            <p><?= ("(x {$_POST['quantity']} item)") . 'Total Price: ' . number_format($_POST['price'] * $_POST['quantity'], 0, ',', '.') ?> VND</p>
                        </div>
                        <div class="button">
                            <form action="../actions/buyNow.actions.php" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                                <input type="hidden" name="book_id" value="<?= $_POST['book_id'] ?>">
                                <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
                                <input type="hidden" name="quantity" value="<?= $_POST['quantity'] ?>">
                                <button type="submit" class="buy-btn" name="buy">Buy Now</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            
            </div>

            
        <?php else: ?>
            <form action="../actions/buyNow.actions.php" method="post">
                <div class="user-infor">
                    <div class="header">
                        <h3>User Information</h3>
                    </div>
                    <div class="username">
                        <label for="">Username:</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    
                    <div class="email">
                        <label for="">Email:</label>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    
                    <div class="address">
                        <label for="">Address:</label>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                    
                </div>
                <div class="book-infor">
                <div class="header">
                    <h3>Book Information</h3>
                </div>

                <div class="content">
                    <div class="cover">
                        <img src="/oop-bookstore/public/images/<?= $_POST['cover'] ?>" alt="">
                    </div>
                    
                    <div class="book-content">
                        <div class="book_name">
                            <label for="">Book name:</label>
                            <p><?= $_POST['book_name'] ?></p>
                        </div>
                        
                        <div class="book_author">
                            <label for="">Author:</label>
                            <p><?= $_POST['author'] ?></p>
                        </div>

                        <div class="price">
                            <label for="">Price:</label>
                            <p><?= number_format($_POST['price'], 0, ',', '.') ?> VND</p>
                        </div>

                        <div class="quantity">
                            <label for="">Quantity:</label>
                            <p><?= $_POST['quantity'] ?></p>
                        </div>

                        <div class="total-price">
                            <p><?= ("(x {$_POST['quantity']} item)") . 'Total Price: ' . number_format($_POST['price'] * $_POST['quantity'], 0, ',', '.') ?> VND</p>
                        </div>
                        <div class="button">
                            <form action="../actions/buyNow.actions.php" method="post">
                                <input type="hidden" name="book_id" value="<?= $_POST['book_id'] ?>">
                                <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
                                <input type="hidden" name="quantity" value="<?= $_POST['quantity'] ?>">
                                <button type="submit" class="buy-btn" name="buy">Buy Now</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            
            </div>
            </form>
        <?php endif; ?>
    </div>

<!--Footer-->
<?php include 'layouts/footer.layouts.php' ?>
</body>

</html>