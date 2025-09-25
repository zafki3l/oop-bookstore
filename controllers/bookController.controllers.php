<?php

include_once __DIR__ . '/../models/book.models.php';
include_once __DIR__ . '/../config/database.config.php';

class BookController
{
    private $book;

    public function __construct($book = new Book())
    {
        $this->book = $book;
    }
	
    public function create()
    {
        $this->book->addBook();

        header('Location: /oop-bookstore/views/staff/books/index.books.php');
        exit();
    }
}