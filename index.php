<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
</head>
<body>
รายการบทความ
<br>
<a href="article_create.php">[เพิ่มบทความ]</a>
<br>
<table width="500" border="1">
	<tr>
		<th>#</th>
		<th>title</th>
		<th>timestamp</th>
		<th></th>
	</tr>
	<tr>
		<td>1</td>
		<td>ทดสอบนะจ๊ะ</td>
		<td>
			<?php
				date_default_timezone_set('Asia/Bangkok');
				echo date("Y-m-d H:i:s");
			?>
		</td>
		<td>[ดูบทความ]</td>
	</tr>
</table>
</body>
</html>