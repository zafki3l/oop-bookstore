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
    <link rel="stylesheet" href="/oop-bookstore/public/css/admin/dashboard.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">

        <div class="dashboard-container">
            <div class="dashboard-header">
                <div class="header-text">
                    <h2>ADMIN DASHBOARD</h1>
                    <h3>WELCOME <?php echo htmlspecialchars($username) ?></h3>
                </div>

                <!-- Thanh tìm kiếm -->
                <div class="dashboard-search-add">
                    <?php include_once 'searchUser.admin.php' ?>
                    <a href="addUser.admin.php">Add user</a>
                </div>
            </div>

            <!-- Bảng quản lý user -->
            <div class="dashboard-table">
                <table>
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
                                <td class="action-btn">
                                    <a href="editUser.admin.php?id=<?php echo htmlspecialchars($user['id']) ?>" class="edit-btn">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <button onclick="showConfirm(<?php echo htmlspecialchars($user['id']) ?>)" class="delete-btn">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div id="confirmModal-<?php echo htmlspecialchars($user['id']) ?>" class="modal">
                                        <div class="modal-content">
                                            <h2>Delete</h2>
                                            <hr>
                                            <p>Click confirm to delete</p>
                                            <form action="../../actions/admin/deleteUser.admin.php" method="post" id="deleteForm">
                                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                                <button type="submit" class="submit-modal">Confirm</button>
                                                <button type="button" class="cancel-modal" onclick="closeModal(<?php echo htmlspecialchars($user['id']) ?>)">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

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