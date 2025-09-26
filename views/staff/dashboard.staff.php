<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';

include_once '../../actions/staff/dashboard.staff.php';

function loginMessage()
{
    return htmlspecialchars($_SESSION['login_success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/rule.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/noti.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>

    <div class="main-content">
        <div class="dashboard-grid">
            <div class="div1">
                <div class="dashboard staff-info">
                    <div class="info-header">
                        <h2>STAFF INFORMATION</h2>
                    </div>
                    <hr>
                    <div class="info-content">
                        <div class="img">
                            <i class="fa-solid fa-user-circle fa-5x"></i>
                        </div>
                        <div class="text">
                            <p>User ID: <?php echo htmlspecialchars($_SESSION['id']); ?></p>
                            <p>Username: <?php echo htmlspecialchars($username); ?></p>
                            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <p>Role: <?php echo htmlspecialchars($_SESSION['role'] == 2 ? 'Staff' : 'Admin'); ?></p>
                        </div>

                    </div>
                </div>
                <div class="div2">
                    <a href="books/index.books.php">
                        <div class="dashboard box1 book-manage">Book Management</div>
                    </a>
                    <div class="dashboard box1 category-man">Quản lý thể loại</div>
                </div>
            </div>

            <div class="div1 bottom">
                <div class="dashboard sales-report">Thống kê doanh số</div>
                <div class="div2">
                    <div class="dashboard box2 order-manage">Quản lý đơn hàng</div>
                    <div class="dashboard box2 total-order">Tổng đơn hàng</div>
                </div>
            </div>
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