<?php

include_once '../../controllers/authController.controllers.php';

$authController = new AuthController();
$authController->ensureLogin();
$authController->ensureAdminOrStaff();