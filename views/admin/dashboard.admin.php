<?php
include_once '../../actions/admin/dashboard.admin.php';

function loginMessage()
{
    return $_SESSION['login_success'];
}

function createUserMessage()
{
    return $_SESSION['create-user-success'];
}

function editUserMessage()
{
    return $_SESSION['edit-user-success'];
}

function deleteUserMessage()
{
    return $_SESSION['delete-user-success'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        <!-- Thông báo login thành công -->
        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo htmlspecialchars(loginMessage()); ?>
            <?php endif; ?>
        </div>

        <!-- Thông báo tạo user thành công -->
        <div class="create-user-message">
            <?php if (isset($_SESSION['create-user-success'])): ?>
                <?php echo htmlspecialchars(createUserMessage()); ?>
            <?php endif; ?>
        </div>

        <!-- Thông báo edit user thành công -->
        <div class="edit-user-message">
            <?php if (isset($_SESSION['edit-user-success'])): ?>
                <?php echo htmlspecialchars(editUserMessage()); ?>
            <?php endif; ?>
        </div>

        <!-- Thông báo xóa user thành công -->
        <div class="delete-user-message">
            <?php if (isset($_SESSION['delete-user-success'])): ?>
                <?php echo htmlspecialchars(deleteUserMessage()); ?>
            <?php endif; ?>
        </div>

        <h1>WELCOME <?php echo htmlspecialchars($username) ?></h1>

        <!-- Thanh tìm kiếm -->
        <?php include_once 'searchUser.admin.php' ?>

        <a href="addUser.admin.php">Add user</a>

        <!-- Bảng quản lý user -->
        <table border="1">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']) ?></td>
                        <td><?php echo htmlspecialchars($user['username']) ?></td>
                        <td><?php echo htmlspecialchars($user['email']) ?></td>
                        <td><?php echo htmlspecialchars($user['address']) ?></td>
                        <td>
                            <?php
                            switch ($user['role']) {
                                case 0:
                                    $roleName = 'Guest';
                                    break;
                                case 1:
                                    $roleName = 'Customer';
                                    break;
                                case 2:
                                    $roleName = 'Staff';
                                    break;
                                case 3:
                                    $roleName = 'Admin';
                                    break;
                                default:
                                    $roleName = 'Unknown';
                            }
                            echo htmlspecialchars($roleName);
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($user['created_at']) ?></td>
                        <td><?php echo htmlspecialchars($user['updated_at']) ?></td>
                        <td>
                            <a href="editUser.admin.php?id=<?php echo htmlspecialchars($user['id']) ?>">Edit</a>
                            <button onclick="showConfirm(<?php echo htmlspecialchars($user['id']) ?>)">Delete</button>

                            <!-- Delete Modal -->
                            <div id="confirmModal-<?php echo htmlspecialchars($user['id']) ?>" class="modal">
                                <div class="modal-content">
                                    <p>Click confirm to delete</p>
                                    <form action="../../actions/admin/deleteUser.admin.php" method="post" id="deleteForm">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <button type="submit">Confirm</button>
                                        <button type="button" onclick="closeModal(<?php echo htmlspecialchars($user['id']) ?>)">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Hiển thị thông báo login thành công -->
        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>

        <!-- Hiển thị thông báo khi tạo user thành công -->
        <?php if (!empty($_SESSION['create-user-success'])): ?>
            <script src="/oop-bookstore/public/js/createUserMessage.js"></script>
            <?php unset($_SESSION['create-user-success']); ?>
        <?php endif; ?>

        <!-- Hiển thị thông báo khi edit user thành công -->
        <?php if (!empty($_SESSION['edit-user-success'])): ?>
            <script src="/oop-bookstore/public/js/editUserMessage.js"></script>
            <?php unset($_SESSION['edit-user-success']); ?>
        <?php endif; ?>

        <!-- Hiển thị thông báo khi delete user thành công -->
        <?php if (!empty($_SESSION['delete-user-success'])): ?>
            <script src="/oop-bookstore/public/js/deleteUserMessage.js"></script>
            <?php unset($_SESSION['delete-user-success']); ?>
        <?php endif; ?>

        <script src="/oop-bookstore/public/js/confirmDeleteUser.js"></script>
    </div>
</body>

</html>