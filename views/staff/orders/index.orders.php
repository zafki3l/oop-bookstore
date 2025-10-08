<?php
include '../../../actions/staff/orders/index.orders.php';

function deleteOrderMessage()
{
    return $_SESSION['delete_order_success'];
}
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
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/pagination.css">
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
                <div class="header-text">
                    <h2>Order Management</h2>
                    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['username']) ?></h3>
                </div>

                <div class="search-add">
                    <!-- Thanh tìm kiếm -->
                    <form action="#" method="get">
                        <input type="hidden" name="page_number" value="1">
                        <button type="submit" name="found"><i class="fas fa-search"></i></button>
                        <input type="text" name="data" placeholder="Find order">
                    </form>
                </div>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ORDER ID</th>
                            <th>USER ID</th>
                            <th>USERNAME</th>
                            <th>TOTAL PRICE</th>
                            <th>STATUS</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']) ?></td>
                                <td><?php echo htmlspecialchars($order['user_id']) ?></td>
                                <td><?php echo htmlspecialchars($order['username']) ?></td>
                                <td>
                                    <?php echo number_format(htmlspecialchars($order['total_price']), 0, ',', '.') . 'VNĐ' ?></td>
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
                                <td>
                                    <div class="action-btn">
                                        <a href="orderDetail.orders.php?id=<?php echo htmlspecialchars($order['id']) ?>"><i class="fa-solid fa-circle-info"></i></a>

                                        <button type="button" onclick="showConfirm(<?php echo htmlspecialchars($order['id']) ?>)" class="delete-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div id="confirmModal-<?= htmlspecialchars($order['id']) ?>" class="modal">
                                            <div class="modal-content">
                                                <h2>Delete</h2>
                                                <hr>
                                                <p>Click confirm to delete</p>
                                                <form action="../../../actions/staff/orders/deleteOrder.orders.php" method="POST" id="deleteForm">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($order['id']) ?>">
                                                    <button type="submit" class="submit-modal">Confirm</button>
                                                    <button type="button" class="cancel-modal" onclick="closeModal(<?php echo htmlspecialchars($order['id']) ?>)">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php include_once '../../layouts/pagination.layouts.php' ?>
            </div>
        </div>

        <div class="delete-order-message">
            <?php if (isset($_SESSION['delete_order_success'])): ?>
                <?php echo deleteOrderMessage(); ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['delete_order_success'])): ?>
            <script src="/oop-bookstore/public/js/deleteOrderMessage.js"></script>
            <?php unset($_SESSION['delete_order_success']); ?>
        <?php endif; ?>

        <script src="/oop-bookstore/public/js/confirmDeleteOrder.js"></script>

        <script src="/oop-bookstore/public/js/showOrderDetail.js"></script>


    </div>

</body>

</html>