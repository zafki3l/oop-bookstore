<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/order/myorder.css">
    <title>My order</title>
</head>
<body>
<!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
<!-- Search bar -->
    <?php include '../layouts/searchbar.layouts.php' ?>

<main class="page">
<!-- Red band content area -->
    <section class="redband">
    <div class="container">
<!-- Tabs -->
        <div class="tabs" role="tablist" aria-label="Order filters">
            <div class="tab active" role="tab" aria-selected="true">
                <span class="key">X</span>
                <span class="label">All orders</span>
            </div>
            <div class="tab" role="tab">
                <span class="key">Z</span>
                <span class="label">Pending</span>
            </div>
            <div class="tab" role="tab">
                <span class="key">A</span>
                <span class="label">Being Delivered</span>
            </div>
            <div class="tab" role="tab">
                <span class="key">Y</span>
                <span class="label">Completed</span>
            </div>
        </div>


<!-- Orders list -->
        <div class="orders">
<!-- Order card 1 -->
            <article class="card">
                <div class="hdr"><div class="id">#ID</div>
                <div class="status">Status</div></div>
                <div class="divider"></div>
                <div class="row">
                    <img class="thumb" src="" alt="Bìa sách" />
                    <div class="meta">
                        <div class="title">Name book</div>
                        <div class="author">Tác giả: Tên tác giả</div>
                        <div class="unit">Đơn giá: <b>120.000 VND</b></div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="note">Số lượng: 1</div>
                <div class="summary">
                    <div class="total">Total: xxx VND</div>
                    <div class="actions">
                        <button class="btn buyback">Buy back</button>
                    </div>
                </div>
            </article>


<!-- Order card 2 -->
            <article class="card">
                <div class="hdr"><div class="id">#ID</div>
                <div class="status">Status</div></div>
                <div class="divider"></div>
                <div class="row">
                    <img class="thumb" src="" alt="Bìa sách" />
                    <div class="meta">
                        <div class="title">Name book</div>
                        <div class="author">Tác giả: Tên tác giả</div>
                        <div class="unit">Đơn giá: <b>120.000 VND</b></div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="note">Số lượng: 1</div>
                <div class="summary">
                    <div class="total">Total: xxx VND</div>
                    <div class="actions">
                        <button class="btn buyback">Buy back</button>
                    </div>
                </div>
            </article>
<!-- Order card 3 -->
            <article class="card">
                <div class="hdr"><div class="id">#ID</div>
                <div class="status">Status</div></div>
                <div class="divider"></div>
                <div class="row">
                    <img class="thumb" src="" alt="Bìa sách" />
                    <div class="meta">
                        <div class="title">Name book</div>
                        <div class="author">Tác giả: Tên tác giả</div>
                        <div class="unit">Đơn giá: <b>120.000 VND</b></div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="note">Số lượng: 1</div>
                <div class="summary">
                    <div class="total">Total: xxx VND</div>
                    <div class="actions">
                        <button class="btn buyback">Buy back</button>
                    </div>
                </div>
            </article>
</main>

<!--footer-->
    <?php include '../layouts/footer.layouts.php' ?>
    
</body>
</html>