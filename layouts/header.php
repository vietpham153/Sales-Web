<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container .row {
			min-height: 300px;
		}
	</style>
</head>
<body style = "background-image:url('./images/bgshop.png')";>
	<!-- header -->
	<header style="border-bottom: blue 7px solid;">
		<a href="index.php"><img src=".\images\shop.png" width="200PX" ></a>
		<ul style="float: right; margin-right: 450px">
			<li style="display: inline-block; margin-right: 200px">
				<a href="index.php"><b><font face="Brush Script MT" size="10">COGAM </font></a></b>
			</li>
			</ul>
		</header>
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container">
	  	<ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="index.php">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="shop.php">Products</a>
		    </li>

		    <li class="nav-item">
		      <a class="nav-link" href="phanhoi.php">Contact</a>
		    </li>
		  </ul>
<?php
$cart = [];
if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];
}
$count = 0;
foreach ($cart as $item) {
	$count += $item['num'];
}
?>
			<a href="cart.php">
				<button type="button" class="btn btn-primary">
					Cart <span class="badge badge-light"><?=$count?></span>
				</button>
			</a>
	  </div>
	</nav>
	