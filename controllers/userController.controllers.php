<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';

class UserController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        $user = $this->user;
        $this->emptyInput($user);
        $this->checkEmailFormat($user);
        $user->createUser();

        $_SESSION['create-user-success'] = 'Create new user successfully!';
        header('Location: /oop-bookstore/views/admin/dashboard.admin.php');
        exit();
    }

    public function edit()
    {
        $user = $this->user;
        $user->editUser();

        $_SESSION['edit-user-success'] = 'Edit user successfully!';
        header('Location: /oop-bookstore/views/admin/dashboard.admin.php');
        exit();
    }

    public function delete($id)
    {
        $user = $this->user;
        $user->deleteUser($id);
        
        $_SESSION['delete-user-success'] = 'Delete user successfully!';
        header('Location: /oop-bookstore/views/admin/dashboard.admin.php');
        exit();
    }

    private function emptyInput($user)
    {
        if (empty($user->getUsername()) && empty($user->getEmail()) && empty($user->getPassword()) && empty($user->getAddress())) {
            $_SESSION['error'] = "Empty input!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }

        if (empty($user->getUsername())) {
            $_SESSION['error_username'] = "Empty username!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }

        if (empty($user->getEmail())) {
            $_SESSION['error_email'] = "Empty email!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }

        if (empty($user->getPassword())) {
            $_SESSION['error_password'] = "Empty password!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }

        if (empty($user->getAddress())) {
            $_SESSION['error_address'] = "Empty address!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }
    }

    private function checkEmailFormat($user)
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_email'] = "Invalid email format!";
            header('Location: /oop-bookstore/views/admin/addUser.admin.php');
            exit();
        }
    }
}