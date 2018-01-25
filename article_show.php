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
	<?php
		require "config.php";
		$query = mysqli_query($conn, "") or die(mysqli_error($conn));
	?>
	<div class="container">
		<div class="card text-white bg-primary mb-3">
		  <div class="card-header">Header</div>
		  <div class="card-body">
		    <h5 class="card-title">Primary card title</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
	</div>
</body>
</html>
