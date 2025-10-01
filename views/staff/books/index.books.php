<?php
include_once '../../../actions/staff/books/index.books.php';

function addBookMessage()
{
    return $_SESSION['add_book_success'];
}

function editBookMessage()
{
    return $_SESSION['edit_book_success'];
}

function deleteBookMessage()
{
    return $_SESSION['delete_book_success'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/sidebar.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/bookIndex.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/pagination.css">
    <title>Book Management</title>
</head>

<body>
    <!--Header-->
    <?php include '../../layouts/header.layouts.php' ?>

    <div class="main-content">
        <!--Sidebar-->

        <div class="sidebar">
            <?php include '../../layouts/sidebar.layouts.php' ?>
        </div>

        <div class="content">
            <div class="book-header">
                <div class="header-text">
                    <h2>Book Management</h2>
                    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['username']) ?></h3>
                </div>

                <!-- Thanh tìm kiếm -->
                <div class="search-add">
                    <?php include_once 'searchBook.books.php' ?>
                    <a href="addBook.books.php" class="addBook">Add book</a>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>BOOK ID</th>
                            <th>BOOK NAME</th>
                            <th>AUTHOR</th>
                            <th>PUBLISHER</th>
                            <th>PAGES</th>
                            <th>CATEGORY</th>
                            <th>DESCRIPTION</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>STATUS</th>
                            <th>COVER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?= htmlspecialchars($book['id']) ?></td>
                                <td><?= htmlspecialchars($book['name']) ?></td>
                                <td><?= htmlspecialchars($book['author']) ?></td>
                                <td><?= htmlspecialchars($book['publisher']) ?></td>
                                <td><?= htmlspecialchars($book['pages']) ?></td>
                                <td><?= htmlspecialchars($book['category']) ?></td>
                                <td><?= htmlspecialchars($book['description']) ?></td>
                                <td><?= number_format(htmlspecialchars($book['price']), 0, ',', '.') ?>VNĐ</td>
                                <td><?= htmlspecialchars($book['quantity']) ?></td>
                                <td><?= htmlspecialchars($book['status'] == 1 ? 'In stock' : 'Out stock') ?></td>
                                <td><img src="/oop-bookstore/public/images/<?= htmlspecialchars($book['cover']) ?>" alt="<?= htmlspecialchars($book['cover']) ?>"></td>
                                <td>
                                    <a href="editBook.books.php?id=<?= $book['id'] ?>" class="edit-btn"><i class="fa-solid fa-pen"></i></a>
                                    <button onclick="showConfirm(<?= htmlspecialchars($book['id']) ?>)" class="delete-btn">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div id="confirmModal-<?= htmlspecialchars($book['id']) ?>" class="modal">
                                        <div class="modal-content">
                                            <h2>Delete</h2>
                                            <hr>
                                            <p>Click confirm to delete</p>
                                            <form action="../../../actions/staff/books/deleteBook.books.php" method="POST" id="deleteForm">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
                                                <button type="submit" class="submit-modal">Confirm</button>
                                                <button type="button" class="cancel-modal" onclick="closeModal(<?php echo htmlspecialchars($book['id']) ?>)">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Phân trang -->
                <?php include_once '../../layouts/pagination.layouts.php' ?>
            </div>

        </div>


        <div class="add-book-message">
            <?php if (isset($_SESSION['add_book_success'])): ?>
                <?php echo addBookMessage(); ?>
            <?php endif; ?>
        </div>

        <div class="edit-book-message">
            <?php if (isset($_SESSION['edit_book_success'])): ?>
                <?php echo editBookMessage(); ?>
            <?php endif; ?>
        </div>

        <div class="delete-book-message">
            <?php if (isset($_SESSION['delete_book_success'])): ?>
                <?php echo deleteBookMessage(); ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['add_book_success'])): ?>
            <script src="/oop-bookstore/public/js/addBookMessage.js"></script>
            <?php unset($_SESSION['add_book_success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['edit_book_success'])): ?>
            <script src="/oop-bookstore/public/js/editBookMessage.js"></script>
            <?php unset($_SESSION['edit_book_success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['delete_book_success'])): ?>
            <script src="/oop-bookstore/public/js/deleteBookMessage.js"></script>
            <?php unset($_SESSION['delete_book_success']); ?>
        <?php endif; ?>

        <script src="/oop-bookstore/public/js/confirmDeleteBook.js"></script>
    </div>

</body>

</html>