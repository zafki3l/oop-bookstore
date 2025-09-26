<?php

include_once '../../../models/book.models.php';

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
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <?php include '../../layouts/header.layouts.php' ?>

    <div class="main-content">
        <form action="../../../actions/staff/books/editBook.books.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']) ?>">
            <label for="name">Book name</label>
            <input type="text" id="name" name="name" placeholder="Book name" value="<?php echo htmlspecialchars($bookData['name']) ?>">

            <br>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="Author" value="<?php echo htmlspecialchars($bookData['author']) ?>">

            <br>

            <label for="publisher">Publisher</label>
            <input type="text" id="publisher" name="publisher" placeholder="Publisher" value="<?php echo htmlspecialchars($bookData['publisher']) ?>">

            <br>
            <label for="pages">Pages</label>
            <input type="text" id="pages" name="pages" placeholder="Pages" value="<?php echo htmlspecialchars($bookData['pages']) ?>">

            <br>
            <label for="category-id">Category id</label>
            <input type="text" id="category-id" name="category-id" placeholder="Category-Id" value="<?php echo htmlspecialchars($bookData['category_id']) ?>">

            <br>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" value="<?php echo htmlspecialchars($bookData['description']) ?>">

            <br>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Price" value="<?php echo htmlspecialchars($bookData['price']) ?>">

            <br>
            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo htmlspecialchars($bookData['quantity']) ?>">

            <br>

            <label for="cover">Cover</label>
            <input type="file" id="cover" name="cover" placeholder="cover">

            <br>
            <input type="submit" name="submit">
        </form>
        <a href="index.books.php">Cancel</a>
    </div>
</body>
</html>