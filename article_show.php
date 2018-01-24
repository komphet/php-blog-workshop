<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
<?php
require 'config.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM articles WHERE id = $id") or die(mysqli_error($conn));
$result = mysqli_fetch_assoc($query);
?>
Title: <?php echo $result['title'] ?><br>
Created At: <?php echo $result['created_at'] ?><br>
Content: <?php echo $result['content'] ?><br>
</body>
</html>