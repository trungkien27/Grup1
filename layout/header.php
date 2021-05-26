<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		.main {
			min-height: 700px;
		}
	</style>
</head>
<body>
	<!-- header START -->
	<!-- Grey with black text -->
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container" style="padding: 0px !important;">
	  	<ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="list-product.php">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="list-product.php">Shop</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">About</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Track Order</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Contact Us</a>
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
			<a href="edit-product.php" style="text-align: right; color: white;">Sửa sản phẩm</a>
			<a href="cart.php">
				<button type="button" class="btn btn-primary">
					Cart <span class="badge badge-light"><?=$count?></span>
				</button>
			</a>
	  </div>
	</nav>
	<!-- header END -->

	<div class="container main">