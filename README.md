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