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
cd oop-bookstore
```

### 2. Tạo file cấu hình
- Trong thư mục `config/`, đã có file mẫu `app.example.config.php`.
- Tạo file mới tên `app.config.php` và sao chép nội dung từ file mẫu.
- Chỉnh sửa thông tin kết nối database (host, username, password, dbname) theo môi trường của bạn.

### 3. Khởi tạo Database
- Trong thư mục `migrations/`, có các file PHP để khởi tạo cơ sở dữ liệu:
  - `20250917233233_create_mvc_bookstore_database.php`
  - `20250917233341_create_users_table.php`
  - `20250921004647_create_books_table.php`
  - `20250921004951_create_categories_table.php`
  - `20250921005950_create_orders_table.php`
  - `20250921010440_create_orderDetails_table.php`
  - `20250921010727_create_carts_table.php`
  - `20250921170733_add_pages_to_table.php`

- Chạy các file này trên phpMyAdmin hoặc qua terminal:
  - Di chuyển đến thư mục `migrations/`:
    ```bash
    cd migrations
    ```
  - Chạy từng file ví dụ:
    ```bash
    php 20250921004951_create_categories_table.php
    ```
- **Lưu ý**: Nếu chạy file php trên terminal, hãy đảm bảo máy bạn đã cài đặt sẵn môi trường cho PHP (Check php -v trong terminal).
- **Lưu ý**: Một số file có thể chứa lệnh DROP hoặc DELETE, hãy đọc kỹ trước khi chạy. Có thể chỉnh sửa cấu trúc database trong thư mục này nếu cần.

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
│  └─ homepage.actions.php
├─ config/
│  ├─ .htaccess
│  ├─ app.config.php
│  ├─ app.example.config.php
│  └─ database.config.php
├─ controllers/
│  ├─ authController.controllers.php
│  └─ userController.controllers.php
├─ handlers/
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
│  │  │  └─ searchbar.css
│  │  ├─ homepage.css
│  │  ├─ noti.css
│  │  └─ rule.css
│  ├─ images/
│  ├─ js/
│  │  ├─ confirmDeleteUser.js
│  │  ├─ createUserMessage.js
│  │  ├─ deleteUserMessage.js
│  │  ├─ editUserMessage.js
│  │  ├─ loginMessage.js
│  │  └─ registerMessage.js
│  └─ hello.txt
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
│  │  └─ searchbar.layouts.php
│  ├─ staff/
│  │  └─ dashboard.staff.php
│  └─ homepage.views.php
├─ .gitattributes
├─ .gitignore
├─ index.php
├─ instructions.txt
├─ README.md
└─ requirements.txt
```
