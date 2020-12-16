<?php

if (!checkRole('settings', 'edit')) {
    no_permission();
} else {
    $ActionURL = $_GET['action'];
    switch ($ActionURL) {
        case 'add':
            require 'email_account/add.php';
            break;
        case 'edit':
            require 'email_account/edit.php';
            break;
        default:
            require 'email_account/home.php';
    }
}
?>
