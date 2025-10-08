<?php
session_start();
include_once '../../../actions/staff/categories/index.categories.php';

function addCategoryMessage()
{
    return $_SESSION['add-category'];
}

function deleteCategoryMessage()
{
    return $_SESSION['delete-category'];
}

function editCategoryMessage()
{
    return $_SESSION['edit-category'];
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
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/categoryIndex.css">
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
            <div class="category-header">
                <div class="header-text">
                    <h2>Book Management</h2>
                    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['username']) ?></h3>
                </div>

                <div class="add">
                    <form action="../../../actions/staff/categories/create.categories.php" method="post">
                        <input type="text" name="name" placeholder="New Category">
                        <button type="submit" class="addCategory">Add Category</button>
                    </form>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>CATEGORY ID</th>
                            <th>CATEGORY NAME</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= htmlspecialchars($category['id']) ?></td>
                                <td>
                                    <?= htmlspecialchars($category['name']) ?>
                                    <!-- Edit -->
                                    <button onclick="showEditModal(<?= htmlspecialchars($category['id']) ?>)" class="edit-btn">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <div id="edit-<?php echo htmlspecialchars($category['id']) ?>" class="modal">
                                        <div class="modal-content" id="edit-modal">
                                            <h2>Edit Category</h2>
                                            <hr>
                                            <br>
                                            <br>
                                            <form action="../../../actions/staff/categories/edit.categories.php" method="post" id="editForm">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                                <div class="form-group">
                                                    <label for="">Category Name:</label>
                                                    <input type="text" name="name" placeholder="Category" value="<?= htmlspecialchars($category['name']) ?>">
                                                </div>

                                                <div class="form-group">

                                                    <button type="button" class="cancel-modal" onclick="closeEditModal(<?php echo htmlspecialchars($category['id']) ?>)">Cancel</button>
                                                    <button type="submit" class="submit-modal">Confirm</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($category['created_at']) ?></td>
                                <td><?= htmlspecialchars($category['updated_at']) ?></td>
                                <td>
                                    <button onclick="showConfirmDelete(<?= htmlspecialchars($category['id']) ?>)" class="delete-btn">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div id="confirmModal-<?php echo htmlspecialchars($category['id']) ?>" class="modal">
                                        <div class="modal-content">
                                            <h2>Delete</h2>
                                            <hr>
                                            <p>Click confirm to delete</p>
                                            <form action="../../../actions/staff/categories/delete.categories.php" method="post" id="deleteForm">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                                <button type="submit" class="submit-modal">Confirm</button>
                                                <button type="button" class="cancel-modal" onclick="closeDeleteModal(<?php echo htmlspecialchars($category['id']) ?>)">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="add-category-message">
                <?php if (isset($_SESSION['add-category'])): ?>
                    <?php echo addCategoryMessage(); ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($_SESSION['add-category'])): ?>
                <script src="/oop-bookstore/public/js/addCategoryMessage.js"></script>
                <?php unset($_SESSION['add-category']); ?>
            <?php endif; ?>

            <div class="delete-category-message">
                <?php if (isset($_SESSION['delete-category'])): ?>
                    <?php echo deleteCategoryMessage(); ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($_SESSION['delete-category'])): ?>
                <script src="/oop-bookstore/public/js/deleteCategoryMessage.js"></script>
                <?php unset($_SESSION['delete-category']); ?>
            <?php endif; ?>

            <div class="edit-category-message">
                <?php if (isset($_SESSION['edit-category'])): ?>
                    <?php echo editCategoryMessage(); ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($_SESSION['edit-category'])): ?>
                <script src="/oop-bookstore/public/js/editCategoryMessage.js"></script>
                <?php unset($_SESSION['edit-category']); ?>
            <?php endif; ?>

            <script src="/oop-bookstore/public/js/confirmDeleteCategory.js"></script>
            <script src="/oop-bookstore/public/js/editCategoryModal.js"></script>
        </div>
    </div>

</body>

</html>