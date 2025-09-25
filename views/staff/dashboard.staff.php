<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';

function loginMessage() { return htmlspecialchars($_SESSION['login_success']); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/dashboard.css">
    <title>Staff Dashboard</title>
</head>
<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        
        <div class="dashboard-grid">
            <div class="dashboard-box staff-info">Thông tin nhân viên</div>
            <div class="dashboard-box book-manage"><a href="#">Book Management</a></div>
            <div class="dashboard-box category-man">Quản lý thể loại</div>
            <div class="dashboard-box sales-report">Thống kê doanh số</div>
            <div class="dashboard-box order-manage">Quản lý đơn hàng</div>
            <div class="dashboard-box total-order">Tổng đơn hàng</div>
        </div>

        <div class="login-message">
            <?php if (isset($_SESSION['login_success'])): ?>
                <?php echo loginMessage(); ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['login_success'])): ?>
            <script src="/oop-bookstore/public/js/loginMessage.js"></script>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
    </div>
</body>
</html>