<?php
$host = "mysql";
$username = "root";
$password = "AP17714500";
$database = "blog";

$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
	die(mysqli_error($conn));
}

?>