<?php

class BookErrorHandler
{
    private $book;

    public function __construct($book = new Book())
    {
        $this->book = $book;
    }

    public function emptyBookName($redirectPath)
    {
        if (empty($_POST['name'])) {
            $_SESSION['error_name'] = "Empty book name!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }

    public function PageValidate($redirectPath)
    {
        if ($_POST['pages'] < 0) {
            $_SESSION['error_pages'] = "Pages cannot be a negative number!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }

    public function priceValidate($redirectPath)
    {
        if ($_POST['price'] < 0) {
            $_SESSION['error_price'] = "Price cannot be a negative number!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }

    public function quantityValidate($redirectPath)
    {
        if ($_POST['quantity'] < 0) {
            $_SESSION['error_quantity'] = "Quantity cannot be a negative number!";
            header('Location: ' . $redirectPath);
            exit();
        }
    }
}