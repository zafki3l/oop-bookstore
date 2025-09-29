<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>meiianhdepvl</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?php

$book_sections = [
    "NEW BOOK" => [
        [
            "img" => "../img/meianh1.jpg",
            "alt" => "Brave New World",
            "title" => "Brave New World",
            "author" => "Aldous Huxley",
            "price" => "120.000"
        ],
        [
            "img" => "../img/meianh2.jpg",
            "alt" => "Vietnam: A History",
            "title" => "Vietnam: A History",
            "author" => "Stanley Karnow",
            "price" => "224.000"
        ],
        [
            "img" => "../img/meianh3.jpg",
            "alt" => "The Lord Of The Rings",
            "title" => "The Lord Of The Rings...",
            "author" => "J.R.R Tolkien",
            "price" => "280.000"
        ],
        [
            "img" => "../img/meianh4.jpg",
            "alt" => "Outlive",
            "title" => "Outlive: The Science and...",
            "author" => "Peter Attia MD",
            "price" => "256.000"
        ],
        [
            "img" => "../img/meianh5.jpg",
            "alt" => "To Kill a Mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "price" => "152.000"
        ]
    ],
    "ON SALES" => [
        [
            "img" => "../img/meianh1.jpg",
            "alt" => "Brave New World",
            "title" => "Brave New World",
            "author" => "Aldous Huxley",
            "price" => "120.000"
        ],
        [
            "img" => "../img/meianh2.jpg",
            "alt" => "Vietnam: A History",
            "title" => "Vietnam: A History",
            "author" => "Stanley Karnow",
            "price" => "224.000"
        ],
        [
            "img" => "../img/meianh3.jpg",
            "alt" => "The Lord Of The Rings",
            "title" => "The Lord Of The Rings...",
            "author" => "J.R.R Tolkien",
            "price" => "280.000"
        ],
        [
            "img" => "../img/meianh4.jpg",
            "alt" => "Outlive",
            "title" => "Outlive: The Science and...",
            "author" => "Peter Attia MD",
            "price" => "256.000"
        ],
        [
            "img" => "../img/meianh5.jpg",
            "alt" => "To Kill a Mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "price" => "152.000"
        ]
    ],
    "BEST SELLER" => [
         [
            "img" => "../img/meianh1.jpg",
            "alt" => "Brave New World",
            "title" => "Brave New World",
            "author" => "Aldous Huxley",
            "price" => "120.000"
        ],
        [
            "img" => "../img/meianh2.jpg",
            "alt" => "Vietnam: A History",
            "title" => "Vietnam: A History",
            "author" => "Stanley Karnow",
            "price" => "224.000"
        ],
        [
            "img" => "../img/meianh3.jpg",
            "alt" => "The Lord Of The Rings",
            "title" => "The Lord Of The Rings...",
            "author" => "J.R.R Tolkien",
            "price" => "280.000"
        ],
        [
            "img" => "../img/meianh4.jpg",
            "alt" => "Outlive",
            "title" => "Outlive: The Science and...",
            "author" => "Peter Attia MD",
            "price" => "256.000"
        ],
        [
            "img" => "../img/meianh5.jpg",
            "alt" => "To Kill a Mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "price" => "152.000"
        ]
    ]
];
foreach ($book_sections as $section_title => $books) {
    //Bắt đầu một vòng lặp để duyệt qua từng khu vực trong mảng $book_sections.
?>

<div class="sale-section">
    <h1><?php echo htmlspecialchars($section_title); //In ra tiêu đề của khu vực sách (ví dụ: <h1>NEW BOOK</h1>). Hàm htmlspecialchars() được dùng để chuyển đổi các ký tự đặc biệt thành các thực thể HTML,
     ?></h1>
    <div class="books-container">
        <?php
        
        foreach ($books as $book) { //Bên trong vòng lặp lớn, có một vòng lặp nhỏ hơn để duyệt qua từng quyển sách trong danh sách $books của khu vực hiện tại. Biến $book sẽ chứa thông tin của một quyển sách.
        ?>
        <div class="book-card sale-item">
            <div class="image-wrapper">
                <img src="<?php echo htmlspecialchars($book['img']); ?>" alt="<?php echo htmlspecialchars($book['alt']); ?>" class="book-cover">
            </div>
            <p class="title"><?php echo htmlspecialchars($book['title']); ?></p>
            <p class="author"><?php echo htmlspecialchars($book['author']); ?></p>        <!-- <php echo htmlspecialchars($book['...']); là lấy dữ liệu từ mảng $book ở trên ?> -->

            <p class="price sale-price"><?php echo htmlspecialchars($book['price']); ?> VND (20% Discounted)</p>
            <button class="buy-button">Buy now</button>         <!-- tạo ra 1 nút buy now để có thể ấn vào -->

        </div>
        
        <?php
    }  
    ?>
    </div>
</div>
<?php 
} 
 ?>