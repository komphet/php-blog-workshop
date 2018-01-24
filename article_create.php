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
<form action="article_create_exec.php" method="get">
    <h1>Create Article</h1>
    <table>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td colspan="2">
                Content:
                <br>
                <textarea name="content" style="width: 100%;"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Save">
</form>
</body>
</html>