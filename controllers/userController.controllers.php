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
}