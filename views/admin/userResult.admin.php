<?php
include_once '../../actions/admin/findUser.admin.php';
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
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>

</body>

</html>