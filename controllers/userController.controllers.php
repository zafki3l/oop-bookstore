<?php

include_once __DIR__ . '/../models/user.models.php';
include_once __DIR__ . '/../config/database.config.php';
include_once __DIR__ . '/../handlers/userErrorHandler.handlers.php';

class UserController
{
    // Attributes
    private $user;
    private $userErrorHandler;

    // Constructor
    public function __construct($user = new User(), userErrorHandler $userErrorHandler)
    {
        $this->user = $user;
        $this->userErrorHandler = $userErrorHandler;
    }

    /**
     * Summary of create
     * Chức năng thêm user
     * @return never
     */
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

    /**
     * Summary of edit
     * Chức năng sửa User
     * @return never
     */
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

    /**
     * Summary of delete
     * Chức năng xóa user
     * @param mixed $id
     * @return never
     */
    public function delete($id)
    {
        $user = $this->user;
        $user->deleteUser($id);
        
        $_SESSION['delete-user-success'] = 'Delete user successfully!';
        header('Location: /oop-bookstore/views/admin/dashboard.admin.php?page_number=1');
        exit();
    }
}