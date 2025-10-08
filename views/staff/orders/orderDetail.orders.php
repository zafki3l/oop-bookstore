<?php
session_start();
include_once '../../../actions/staff/orders/getOrderDetail.orders.php';

$orderItems = $data;
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

    <title>Order Item</title>
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
                    <h2>Order Details</h2>
                    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['username']) ?></h3>
                </div>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ITEM ID</th>
                            <th>ORDER ID</th>
                            <th>BOOK_ID</th>
                            <th>BOOK NAME</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL PRICE</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($orderItems as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']) ?></td>
                                <td><?php echo htmlspecialchars($item['order_id']) ?></td>
                                <td><?php echo htmlspecialchars($item['book_id']) ?></td>
                                <td><?php echo htmlspecialchars($item['book_name']) ?></td>
                                <td><?php echo htmlspecialchars($item['price']) ?></td>
                                <td><?php echo htmlspecialchars($item['quantity']) ?></td>
                                
                                <td><?php echo number_format(htmlspecialchars($item['total_price']), 0, ',', '.') . 'VNĐ' ?></td>
                                <td><?php echo htmlspecialchars($item['created_at'])  ?></td>
                                <td><?php echo htmlspecialchars($item['updated_at']) ?></td>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>