<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
</head>
<body>
<?php
	require 'config.php';
	$query = mysqli_query($conn, "SELECT * FROM articles ORDER BY id DESC") or die(mysqli_error($conn));
	$count = ( int )mysqli_num_rows($query);
?>
รายการบทความ
<br>
<a href="article_create.php">[เพิ่มบทความ]</a>
<br>
มีทั้งหมด <?php echo $count; ?> บทความ
<table width="500" border="1">
	<tr>
		<th>#</th>
		<th>title</th>
		<th>timestamp</th>
		<th></th>
	</tr>
	<?php 
		while($row = mysqli_fetch_assoc($query)) :
	?>
		<tr>

			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['title'] ?></td>
			<td>
				<?php echo $row['created_at'] ?>
			</td>
			<td>
				<a href="article_show.php?id=<?php echo $row['id']; ?>">[ดูบทความ]</a>
				
			</td>
		</tr>
	<?php 
		endwhile
	?>
</table>
</body>
</html>