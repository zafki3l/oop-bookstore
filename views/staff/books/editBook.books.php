<?php
session_start();
include_once '../../../models/book.models.php';
include_once '../../../models/category.models.php';

$category = new Category();
$categories = $category->getCategoryName();

$book = new Book();
$bookData = $book->getBookById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/editBook.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/sidebar.css">
    <title>Edit Book</title>
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
                <h2>EDIT BOOK INFORMATION</h2>
            </div>

            <div class="container-content">
                <form action="../../../actions/staff/books/editBook.books.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']) ?>">

                    <div class="form-group">
                        <label for="name">Book name</label>
                        <input type="text" id="name" name="name" placeholder="Book name" value="<?php echo htmlspecialchars($bookData['name']) ?>">

                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" placeholder="Author" value="<?php echo htmlspecialchars($bookData['author']) ?>">

                    </div>

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input type="text" id="publisher" name="publisher" placeholder="Publisher" value="<?php echo htmlspecialchars($bookData['publisher']) ?>">

                    </div>

                    <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="text" id="pages" name="pages" placeholder="Pages" value="<?php echo htmlspecialchars($bookData['pages']) ?>">

                    </div>

                    <div class="form-group">
                        <label for="category-id">Category:</label>
                        <select name="category-id" id="category-id">
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" 
                                <?php echo htmlspecialchars($bookData['category_id'] == $category['id'] ? 'selected' : '') ?>>
                                    <?= $category['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"><?php echo htmlspecialchars($bookData['description']) ?></textarea>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" placeholder="Price" value="<?php echo htmlspecialchars($bookData['price']) ?>">

                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo htmlspecialchars($bookData['quantity']) ?>">
                    </div>


                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" id="cover" name="cover" placeholder="cover">

                    </div>

                    <div class="form-group">
                        <a href="index.books.php" class="cancel-btn">Cancel</a>
                        <input type="submit" name="submit" value="Save" class="submit-btn">

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
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>