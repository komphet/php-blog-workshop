<?php
require './layouts/header.php';

$pages = [
    'register',
    'login',
    'logout',
    'forgotpass',
    'create',
    'show',
    'edit',
    'delete',
];

if (in_array($_GET['page'], $pages)) {
    require "system/" . $_GET['page'] . ".php";
} else {
    require "system/home.php";
}

require './layouts/footer.php';
?>