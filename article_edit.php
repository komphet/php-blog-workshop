<!doctype html>
<html lang="th">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Create Articale - สร้างบทความ</title>
</head>
<body>
        <?php
            function alertError(){
                echo "<div class='alert alert-danger'>ไม่มีบทความนี้ ออกไปเลยไป ชิ้วๆ <a href='index.php'>[กลับ]</a></div>";
                exit();
            }

            $id = is_null($_GET['id']) ? $_POST['id'] : $_GET['id'];

            if(is_null($id) || $id == ''){
                alertError();
            }

            require "config.php"; 

            if(isset($_POST['id'])){
                $title = $_POST['title'];
                $content = $_POST['content'];
                mysqli_query($conn, "UPDATE articles SET title = '$title', content = '$content', updated_at = NOW() WHERE id = $id") or die(mysqli_error($conn));
                 echo "<div class='alert alert-success'>แก้ไขข้อความเรียบร้อยแล้ว</div>";
            }

            $query = mysqli_query($conn, "SELECT * FROM articles WHERE id = $id") or die(mysqli_error($conn));

            $count = mysqli_num_rows($query);
            if($count <= 0){
                alertError();
            }

            $result = mysqli_fetch_assoc($query);
        ?>
<form action="article_edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <h1>Edit Article</h1>
    <table>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $result['title']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                Content:
                <br>
                <textarea name="content" style="width: 100%;"><?php echo $result['content']; ?></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Save">
</form>
    <a href="index.php">[Back]</a>

</body>
</html>