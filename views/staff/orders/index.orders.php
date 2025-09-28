<?php
session_start();
include '../../action/staff/orders/index.orders.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/sidebar.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/orderIndex.css">

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
                    <?php include_once 'searchOrder.orders.php' ?>
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
                                    <?php
                                    switch($order['status']){
                                        case 0:
                                            $statusName = 'Pending';
                                            break;
                                        case 1:
                                            $statusName = 'In Transis';
                                            break;
                                        case 2: 
                                            $statusName = 'Completed';
                                            break;
                                        default:
                                            $statusName = 'Unknown';
                                    }
                                    echo htmlspecialchars($statusName);
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($order['create_at'])  ?></td>
                                <td><?php echo htmlspecialchars($order['update_at']) ?></td>
                                <td class="action-btn">
                                    <a href="editOrder.orders.php?id=<?php echo htmlspecialchars($order['id']) ?>" class="edit-btn"></a>
                                    <button onclick="showConfirm(<?php echo htmlspecialchars($order['id']) ?>" class="delete-btn"></button>
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