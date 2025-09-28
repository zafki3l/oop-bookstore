# OOP Bookstore

Dự án **Bookstore Management** được viết bằng PHP sử dụng mô hình OOP và MVC cơ bản. Ứng dụng cho phép quản lý người dùng, sách, giỏ hàng, đơn hàng, và hỗ trợ hệ thống đăng nhập/đăng ký.

---

## Cấu hình môi trường
Dự án được phát triển và chạy trên:
- Apache 2.4.58
- MariaDB 10.4.32
- PHP 8.2.12 (VS16 X86 64bit thread safe) + PEAR
- phpMyAdmin 5.2.1

### Yêu cầu hệ thống
- Máy chủ web hỗ trợ PHP (Apache)
- Cơ sở dữ liệu MySQL/MariaDB
- PHP phiên bản 8.2.12 trở lên

---

## Hướng dẫn cài đặt

### 1. Clone dự án
```bash
git clone https://github.com/zafki3l/oop-bookstore.git

-> Sau đó Di chuyển project tới folder htdocs của xampp: C:\xampp\htdocs\oop-bookstore
```

### 2. Tạo file cấu hình
- Trong thư mục `config/`, đã có file mẫu `app.example.config.php`.
- Tạo file mới tên `app.config.php` và sao chép nội dung từ file mẫu.
- Chỉnh sửa thông tin kết nối database (host, username, password, dbname) theo môi trường của bạn.

### 3. Khởi tạo Database
- Trong phpmyadmin, tạo 1 database mới tên là `mvc_book_store`
- Trong thư mục `sql/`, đã có sẵn file `mvc_book_store.sql`
- import file `mvc_book_store.sql` vào trong database `mvc_book_store`, dữ liệu sẽ được tự động khởi tạo

### 4. Chạy ứng dụng
- Đặt thư mục dự án vào thư mục gốc của máy chủ web (ví dụ: `htdocs` của XAMPP).
- Truy cập qua trình duyệt: `http://localhost/oop-bookstore/`.

---

## Công nghệ sử dụng
- **Backend**: PHP
- **Cơ sở dữ liệu**: MySQL/MariaDB
- **Frontend**: HTML, CSS, JavaScript

---

## Cấu trúc thư mục
```
oop-bookstore/
├─ actions/
│  ├─ admin/
│  │  ├─ createUser.admin.php
│  │  ├─ dashboard.admin.php
│  │  ├─ deleteUser.admin.php
│  │  └─ editUser.admin.php
│  ├─ auth/
│  │  ├─ login.auth.php
│  │  ├─ logout.auth.php
│  │  └─ register.auth.php
│  ├─ staff/
│  │  ├─ books/
│  │  │  ├─ addBook.books.php
│  │  │  ├─ deleteBook.books.php
│  │  │  ├─ editBook.books.php
│  │  │  └─ index.books.php
│  │  └─ dashboard.staff.php
│  └─ homepage.actions.php
├─ config/
│  ├─ .htaccess
│  ├─ app.config.php
│  ├─ app.example.config.php
│  └─ database.config.php
├─ controllers/
│  ├─ authController.controllers.php
│  ├─ bookController.controllers.php
│  └─ userController.controllers.php
├─ handlers/
│  ├─ bookErrorHandler.handlers.php
│  └─ userErrorHandler.handlers.php
├─ migrations/
│  ├─ 20250917233233_create_mvc_bookstore_database.php
│  ├─ 20250917233341_create_users_table.php
│  ├─ 20250921004647_create_books_table.php
│  ├─ 20250921004951_create_categories_table.php
│  ├─ 20250921005950_create_orders_table.php
│  ├─ 20250921010440_create_orderDetails_table.php
│  ├─ 20250921010727_create_carts_table.php
│  ├─ 20250921170733_add_pages_to_table.php
│  ├─ create.ps1
│  └─ migration.migrations.php
├─ models/
│  ├─ book.models.php
│  ├─ model.models.php
│  └─ user.models.php
├─ public/
│  ├─ css/
│  │  ├─ admin/
│  │  │  ├─ addUser.css
│  │  │  ├─ dashboard.css
│  │  │  └─ editUser.css
│  │  ├─ auth/
│  │  │  ├─ login.css
│  │  │  └─ register.css
│  │  ├─ layouts/
│  │  │  ├─ footer.css
│  │  │  ├─ header.css
│  │  │  ├─ pagination.css
│  │  │  ├─ searchbar.css
│  │  │  └─ sidebar.css
│  │  ├─ staff/
│  │  │  ├─ addBook.css
│  │  │  ├─ bookIndex.css
│  │  │  ├─ dashboard.css
│  │  │  └─ editBook.css
│  │  ├─ homepage.css
│  │  ├─ noti.css
│  │  └─ rule.css
│  ├─ icon/
│  │  └─ birdcage.png
│  ├─ images/
│  │  ├─ 0ff0f3bac1a921ba5c70918084b1962320250926104718.png
│  │  ├─ 0gzoylpn1758871778.png
│  │  ├─ 0gzoylpn20250926093110.png
│  │  ├─ 0gzoylpn20250926093901.png
│  │  ├─ 0gzoylpn20250926094040.png
│  │  ├─ 0gzoylpn20250926094337.png
│  │  ├─ 0gzoylpn20250926102624.png
│  │  ├─ 0gzoylpn20250926103004.png
│  │  ├─ 0gzoylpn20250926104730.png
│  │  ├─ 0gzoylpn20250926192513.png
│  │  ├─ 1758870202.jpg
│  │  ├─ 1758870214.jpg
│  │  ├─ 1758870870.png
│  │  ├─ 1758870971.png
│  │  ├─ 1758871656.png
│  │  ├─ 415SkSLLrzL20250926162534.jpg
│  │  └─ Kurumi Tokisaki20250926234920.jpg
│  └─ js/
│     ├─ addBookMessage.js
│     ├─ confirmDeleteBook.js
│     ├─ confirmDeleteUser.js
│     ├─ createUserMessage.js
│     ├─ deleteBookMessage.js
│     ├─ deleteUserMessage.js
│     ├─ editBookMessage.js
│     ├─ editUserMessage.js
│     ├─ loginMessage.js
│     └─ registerMessage.js
├─ sql/
│  └─ mvc_book_store.sql
├─ views/
│  ├─ admin/
│  │  ├─ addUser.admin.php
│  │  ├─ dashboard.admin.php
│  │  ├─ editUser.admin.php
│  │  └─ searchUser.admin.php
│  ├─ auth/
│  │  ├─ login.auth.php
│  │  └─ register.auth.php
│  ├─ layouts/
│  │  ├─ footer.layouts.php
│  │  ├─ header.layouts.php
│  │  ├─ pagination.layouts.php
│  │  ├─ searchbar.layouts.php
│  │  └─ sidebar.layouts.php
│  ├─ staff/
│  │  ├─ books/
│  │  │  ├─ addBook.books.php
│  │  │  ├─ editBook.books.php
│  │  │  ├─ index.books.php
│  │  │  └─ searchBook.books.php
│  │  └─ dashboard.staff.php
│  └─ homepage.views.php
├─ .gitattributes
├─ .gitignore
├─ .htaccess
├─ index.php
├─ instructions.txt
├─ README.md
└─ requirements.txt
```