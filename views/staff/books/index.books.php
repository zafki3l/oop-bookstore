<?php 

session_start();
include_once '../../../actions/staff/books/index.books.php';

$books = $data;

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
        <h1>HELLO</h1>
        
        <a href="addBook.books.php">Add book</a>
        <table border="1">
            <thead>
                <th>BOOK ID</th>
                <th>BOOK NAME</th>
                <th>AUTHOR</th>
                <th>PUBLISHER</th>
                <th>PAGES</th>
                <th>CATEGORY ID</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>STATUS</th>
                <th>COVER</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><?= $book['name'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['publisher'] ?></td>
                        <td><?= $book['pages'] ?></td>
                        <td><?= $book['category_id'] ?></td>
                        <td><?= $book['description'] ?></td>
                        <td><?= $book['price'] ?></td>
                        <td><?= $book['quantity'] ?></td>
                        <td><?= $book['status'] ?></td>
                        <td><?= $book['cover'] ?></td>
                        <td><?= $book['created_at'] ?></td>
                        <td><?= $book['updated_at'] ?></td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../dashboard.staff.php">Go back</a>
    </div>
    
</body>
</html>