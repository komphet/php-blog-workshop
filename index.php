<?php
require './layouts/header.php';

switch ($_GET['page']){
    case "create":
    case "register":
        require "system/".$_GET['page'].".php";
        break;
    default:
        require "system/home.php";
}

require './layouts/footer.php';
?>