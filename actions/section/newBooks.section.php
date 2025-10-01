<?php

include_once '../../models/book.models.php';

$book = new Book();
$books = $book->newBooks();