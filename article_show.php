<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Article Show</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	<!-- END CSS -->

	<!-- JAVASCRIPT -->
	<script type="text/javascript" src="/assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- END JAVASCRIPT -->

	<style type="text/css">
		.red-bg{
			background: rgba(255,0,0,0.3);
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			function alertError(){
				echo "<div class='alert alert-danger'>ไม่มีบทความนี้ ออกไปเลยไป ชิ้วๆ <a href='index.php'>[กลับ]</a></div>";
				exit();
			}


			if(!isset($_GET['id']) || $_GET['id'] == ''){
				alertError();
			}

			$id = $_GET['id'];
			require "config.php"; 
			$query = mysqli_query($conn, "SELECT * FROM articles WHERE id = $id") or die(mysqli_error($conn));

			$count = mysqli_num_rows($query);
			if($count <= 0){
				alertError();
			}


			if(isset($_GET['action']) && $_GET['action'] == 'delete'){
				mysqli_query($conn,"DELETE FROM articles WHERE id = $id;") or die(mysqli_error());
				echo "<div class='alert alert-danger'>ลบข้อมูลแล้วนะคัรบ <a href='index.php'>[กลับ]</a></div>";
				exit();
			}

			$result = mysqli_fetch_assoc($query);
		?>
		<div class="card text-white bg-primary mb-3">
		  <div class="card-header">
		  	<?php echo $result['title']; ?> 
		  	<a class="btn btn-success btn-sm" href="index.php">กลับ</a>
		  </div>
		  <div class="card-body">
		    <p class="card-text">
		    	<?php 
		    	 echo $result['content'];
		    	?>	
		    </p>
		  </div>
		  <div class="card-footer">
		    	สร้างเมื่อ: <?php echo $result['created_at'];?>	
		    	<a class="btn btn-warning btn-sm" href="article_edit.php?id=<?php echo $id ?>">แก้ไข</a>
		    	<a class="btn btn-danger btn-sm" href="article_show.php?id=<?php echo $id ?>&action=delete">ลบ</a>
		  </div>
		</div>
	</div>
</body>
</html>
