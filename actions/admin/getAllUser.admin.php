<?php

include_once '../../config/database.config.php';
include_once '../../models/user.models.php';

$db = new Database();
$user = new User($db);

$data = $user->getAllUser();

return $data;