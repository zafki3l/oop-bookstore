<?php

include_once __DIR__ . '/../models/book.models.php';
include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../handlers/bookErrorHandler.handlers.php';

class BookController
{
    private $book;
    private $bookErrorHandler;

    public function __construct($book = new Book(), $bookErrorHandler = new BookErrorHandler())
    {
        $this->book = $book;
        $this->bookErrorHandler = $bookErrorHandler;
    }

    /**
     * Summary of create
     * Chức năng thêm sách
     * @return never
     */
    public function create()
    {
        session_start();
        $redirectPath = '/oop-bookstore/views/staff/books/addBook.books.php';

        // Error handling
        $this->bookErrorHandler->emptyBookName($redirectPath);
        $this->bookErrorHandler->PageValidate($redirectPath);
        $this->bookErrorHandler->priceValidate($redirectPath);
        $this->bookErrorHandler->quantityValidate($redirectPath);

        $this->uploadFile();
        $this->book->addBook();

        $_SESSION['add_book_success'] = 'Add book successfully';
        header('Location: /oop-bookstore/views/staff/books/index.books.php?page_number=1');
        exit();
    }

    /**
     * Summary of edit
     * Chức năng sửa sách
     * @param mixed $id
     * @return never
     */
    public function edit($id)
    {
        session_start();
        $redirectPath = '/oop-bookstore/views/staff/books/editBook.books.php?id=' . $id;

        // Error handling
        $this->bookErrorHandler->emptyBookName($redirectPath);
        $this->bookErrorHandler->PageValidate($redirectPath);
        $this->bookErrorHandler->priceValidate($redirectPath);
        $this->bookErrorHandler->quantityValidate($redirectPath);

        $this->uploadFile();
        $this->emptyCoverInput($id);
        $this->book->editBook($id);

        $_SESSION['edit_book_success'] = 'Edit book successfully';
        header('Location: /oop-bookstore/views/staff/books/index.books.php?page_number=1');
        exit();
    }

    /**
     * Summary of delete
     * Chức năng xóa sách
     * @param mixed $id
     * @return never
     */
    public function delete($id)
    {
        session_start();
        $this->book->deleteBook($id);

        $_SESSION['delete_book_success'] = 'Delete book successfully';
        header('Location: /oop-bookstore/views/staff/books/index.books.php?page_number=1');
        exit();
    }

    /**
     * Summary of uploadFile
     * Xử lý upload file
     * @return void
     */
    private function uploadFile()
    {
        //Nếu như người dùng đã upload file
        if (!empty($_FILES['cover']['name'])) {
            // Lấy tên file
            $image_name = $_FILES['cover']['name'];

            // Tách tên file
            $tmp = explode('.', $image_name);

            // Đặt tên mới cho file để tránh trùng tên
            $newFileName = reset($tmp) . date('YmdHis') .  '.' . end($tmp);

            // Đường dẫn muốn file upload đến
            $uploadPath = __DIR__ . '/../public/images/' . $newFileName;

            // Di chuyển file đến đường dẫn chỉ định
            move_uploaded_file($_FILES['cover']['tmp_name'], $uploadPath);

            // Set cover = $newFileName
            $this->book->setCover($newFileName);
        } else {
            $this->book->setCover('No Image'); // Nếu chưa upload file thì set cover = 'No Image'
        }
    }

    /**
     * Summary of emptyCoverInput
     * Giữ ảnh cũ nếu người dùng không upload gì
     * @param mixed $id
     * @return void
     */
    private function emptyCoverInput($id)
    {
        $bookData = $this->book->getBookById($id);
        if ($this->book->getCover() == 'No Image') {
            $this->book->setCover($bookData['cover']);
        }
    }
}
