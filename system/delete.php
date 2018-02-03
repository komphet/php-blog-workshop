<?php
require "system/config.php";
if(!is_null($_GET['id'])){
    $blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT blogs.id, title,content, blogs.updated_at, blogs.created_at, username FROM  blogs JOIN users ON users.id = user_id WHERE blogs.id = " . $_GET['id']));
}

if (is_null($_SESSION['user']) || is_null($_GET['id']) || $_SESSION['user']['username'] != $blog['username']) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=/?msg=" . urlencode("Permission Deny.") . ".\">";
    echo "Redirecting...";
    exit();
}

mysqli_query($conn, "DELETE FROM blogs WHERE id = " . $_GET['id']) or die(mysqli_error($conn));
echo "<meta http-equiv=\"refresh\" content=\"0;url=/?msg=" . urlencode("Blog has deleted successfully.") . ".\">";
echo "Redirecting...";
exit();
?>