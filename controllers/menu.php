<?php
$main_menu_items = [
    "Category" => "#",
    "Homepage" => "#",
    "Admin Dashboard" => "#",
    "Staff Dashboard" => "#"
];

$user_actions = [
    "Account" => "#",
    "Logout" => "#"
];
?>
<div class="top-nav-bar">
    <ul class="main-menu">
        <?php foreach ($main_menu_items as $title => $url): ?>
            <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>
        <?php endforeach; ?>
        <link rel="stylesheet" href="style.css">
    </ul>

    <ul class="user-actions">
        <?php foreach ($user_actions as $title => $url): ?>
            <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>