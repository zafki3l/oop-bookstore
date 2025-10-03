<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/oop-bookstore/public/css/layouts/searchbar.css">
    <title>Bookstore</title>
</head>

<body>
    <div class="header">
        <ul type="none" class="user-menu">
            <!-- Search bar -->
            <li class="search-bar">
                <form action="/oop-bookstore/views/searchResult.views.php" method="get">
                    <input type="text" name="book" placeholder="Search books..." />
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </li>

            <!-- Cart icon -->
            <li class="cart-icon">
                <a href="/oop-bookstore/views/carts/mycart.carts.php?user=<?= $_SESSION['id'] ?? '' ?>"><i class="fas fa-shopping-cart"></i></a>
            </li>
        </ul>
    </div>
</body>

</html>
