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
        <form action="../../../actions/staff/books/addBook.books.php" method="post" enctype="multipart/form-data">
            <label for="name">Book name</label>
            <input type="text" id="name" name="name" placeholder="Book name">

            <br>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="Author">

            <br>

            <label for="publisher">Publisher</label>
            <input type="text" id="publisher" name="publisher" placeholder="Publisher">

            <br>
            <label for="pages">Pages</label>
            <input type="text" id="pages" name="pages" placeholder="Pages">

            <br>
            <label for="category-id">Category id</label>
            <input type="text" id="category-id" name="category-id" placeholder="Category-Id">

            <br>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description">

            <br>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Price">

            <br>
            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" placeholder="Quantity">

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