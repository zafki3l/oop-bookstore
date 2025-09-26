<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../handlers/userErrorHandler.handlers.php';

class UserController
{
    private $user;
    private $userErrorHandler;

    public function __construct($user = new User(), userErrorHandler $userErrorHandler)
    {
        $this->user = $user;
        $this->userErrorHandler = $userErrorHandler;
    }

    public function create()
    {
        $redirectPath = '/oop-bookstore/views/admin/addUser.admin.php';
        $user = $this->user;
        $this->userErrorHandler->emptyInput($user, $redirectPath);
        $this->userErrorHandler->checkEmailFormat($user, $redirectPath);
        $this->userErrorHandler->isEmailExist($user, $redirectPath);

        $user->createUser();

        $_SESSION['create-user-success'] = 'Create new user successfully!';
        header('Location: /oop-bookstore/views/admin/dashboard.admin.php');
        exit();
    }

    public function edit()
    {
        $redirectPath = '/oop-bookstore/views/admin/editUser.admin.php?id=' . $this->user->getId();
        $user = $this->user;
        $this->userErrorHandler->emptyInput($user, $redirectPath, true);
        $this->userErrorHandler->checkEmailFormat($user, $redirectPath);
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