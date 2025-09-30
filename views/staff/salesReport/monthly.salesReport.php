<?php
session_start();
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
    <link rel="stylesheet" href="/oop-bookstore/public/css/staff/salesReport.css">
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
            <div class="report-header">
                <div class="header-text">
                    <h2>SALES REPORT</h2>
                    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['username']) ?></h3>
                </div>
            </div>

            <div class="chart">
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        </div>
        <script src="/oop-bookstore/public/js/chart.js"></script>
    </div>

</body>

</html>