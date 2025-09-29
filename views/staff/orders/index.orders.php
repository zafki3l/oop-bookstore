<?php
include '../../../actions/staff/orders/index.orders.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/sidebar.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">

    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/orderIndex.css">
    <link rel="shortcut icon" href="/oop-bookstore/public/icon/birdcage.png" type="image/x-icon">

    <title>Order Management</title>
</head>

<body>
    <?php include '../../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="sidebar">
            <?php include '../../layouts/sidebar.layouts.php' ?>
        </div>

        <div class="content">
            <div class="order-header">
                <h2>Order Management</h2>

                <div class="search-add">

                </div>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ORDER ID</th>
                            <th>USER ID</th>
                            <th>STATUS</th>
                            <th>CREATE AT</th>
                            <th>UPDATE AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']) ?></td>
                                <td><?php echo htmlspecialchars($order['user_id']) ?></td>
                                <td>
                                    <form method="POST" action="/oop-bookstore/actions/staff/orders/index.orders.php">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($order['id']); ?>">

                                        <select name="status" onchange="this.form.submit()">
                                            <option value="0" <?php echo ($order['status'] == 0) ? 'selected' : ''; ?>>Pending</option>
                                            <option value="1" <?php echo ($order['status'] == 1) ? 'selected' : ''; ?>>In Transit</option>
                                            <option value="2" <?php echo ($order['status'] == 2) ? 'selected' : ''; ?>>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo htmlspecialchars($order['created_at'])  ?></td>
                                <td><?php echo htmlspecialchars($order['updated_at']) ?></td>
                                <td class="action-btn">
                                    <a href="editOrder.orders.php?id=<?php echo htmlspecialchars($order['id']) ?>" class="edit-btn">Edit</a>
                                    <button onclick="showConfirm(<?php echo htmlspecialchars($order['id']) ?>" class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>