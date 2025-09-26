<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/addBook.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/sidebar.css">
    <title>Create New Book</title>
</head>

<body>
    <!--Header-->
    <?php include '../../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="sidebar">
            <?php include '../../layouts/sidebar.layouts.php' ?>
        </div>

        <div class="container">
            <div class="container-header">
                <h2>ADD NEW BOOK</h2>
            </div>

            <div class="container-content">
                <form action="../../../actions/staff/books/addBook.books.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Book name:</label>
                        <input type="text" id="name" name="name" placeholder="Book name">
                    </div>

                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" placeholder="Author">

                    </div>

                    <div class="form-group">
                        <label for="publisher">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" placeholder="Publisher">
                    </div>

                    <div class="form-group">
                        <label for="pages">Pages:</label>
                        <input type="text" id="pages" name="pages" placeholder="Pages">

                    </div>

                    <div class="form-group">
                        <label for="category-id">Category:</label>
                        <select name="category-id" id="category-id">
                            <option value="1">Fiction</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" placeholder="Price">

                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" id="quantity" name="quantity" placeholder="Quantity">

                    </div>


                    <div class="form-group">
                        <label for="cover">Cover:</label>
                        <input type="file" id="cover" name="cover" placeholder="cover">

                    </div>

                    <div class="form-group">
                        <a href="index.books.php" class="cancel-btn">Cancel</a>
                        <input type="submit" name="submit" class="submit-btn" value="Create Book">
                    </div>

                    <!-- Hiển thị lỗi -->
                    <?php if (!empty($_SESSION['error_name'])): ?>
                        <div class="error-box"><?= htmlspecialchars($_SESSION['error_name']) ?></div>
                        <?php unset($_SESSION['error_name']); ?>
                    <?php elseif (!empty($_SESSION['error_pages'])): ?>
                        <div class="error-box"><?= htmlspecialchars($_SESSION['error_pages']) ?></div>
                        <?php unset($_SESSION['error_pages']); ?>
                    <?php elseif (!empty($_SESSION['error_price'])): ?>
                        <div class="error-box"><?= htmlspecialchars($_SESSION['error_price']) ?></div>
                        <?php unset($_SESSION['error_price']); ?>
                    <?php elseif (!empty($_SESSION['error_quantity'])): ?>
                        <div class="error-box"><?= htmlspecialchars($_SESSION['error_quantity']) ?></div>
                        <?php unset($_SESSION['error_quantity']); ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>