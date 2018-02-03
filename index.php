<?php
require './layouts/header.php';

$pages = [
    'create',
    'register',
    'login',
    'logout',
];

if (in_array($_GET['page'], $pages)) {
    require "system/" . $_GET['page'] . ".php";
} else {
    require "system/home.php";
}

require './layouts/footer.php';
?>