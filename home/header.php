<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">				
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style type="text/css">
		.nav-link {
			margin-right: 20px;
		}
		.navbar-light .nav-item:hover .nav-link  {
		    color: #f12020;
		}
		.navbar-light .nav-item:hover .nav-link i{
		    color: #f12020;
		    font-weight: bold;
		}

		.navbar-light .dropdown-item:hover,
		.navbar-light .dropdown-item:focus {
		    color: #f12020;
		    background-color: rgba(255,255,255,.5);
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm  navbar-light " style="background-color: #ffffff;">
		<a class="navbar-brand" href="#">
    		<img src="https://static.wixstatic.com/media/4e382d_0d579ec3ec6241af9e1380ed79c56b7b~mv2.png/v1/fill/w_406,h_46,al_c,q_85,usm_0.66_1.00_0.01/Asset%202_3x.webp" alt="logo" style="width:100%;">
 		</a>
		 <div class="container">
		 	<ul class="navbar-nav" style="color: #000000; font-weight: bold;">
			    <li class="nav-item active">
      				<a  class="nav-link" href="#">Trang Chủ</a>	
      			</li>
      			 <li class="nav-item active">
      				<a class="nav-link" href="#">Giới Thiệu</a>	
      			</li>	     	
	    		<li class="nav-item active dropdown">
	      			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        		Dịch Vụ
	      			</a>
	      	<div class="dropdown-menu" style="border: none; font-weight: bold;">
		        <a style="font-weight: bold;" class="dropdown-item" href="#">Cải tiến móng</a>
		        <a style="font-weight: bold;" class="dropdown-item" href="#">Cắt sửa móng tay & móng chân</a>
		        <a style="font-weight: bold;" class="dropdown-item" href="#">Waxing</a>
		        <a style="font-weight: bold;" class="dropdown-item" href="#">Thêm Ons</a>
		     </div>
	    </li>
	    <li class="nav-item active">
	      <a class="nav-link" href="#">Cửa Hàng</a>
	    </li>
	    <li class="nav-item active">
	      <a class="nav-link" href="#">Hình Ảnh Chỉa Sẻ</a>
	    </li>
	   <li class="nav-item active">
	      <a class="nav-link" href="#">Liên Hệ</a>
	    </li>
	    <li class="nav-item active">
	      <a class="nav-link" href="#">Join Our Team</a>
	    </li>

	    <li class="nav-item active">
	      <a class="nav-link" href="../user/login.php"><i class="bi bi-door-open-fill"></i>Đăng Nhập</a>
	    </li>
	  </ul>
	  
	  <?php
		  	$cart = [];
			if(isset($_COOKIE['cart'])) {
				$json = $_COOKIE['cart'];
				$cart = json_decode($json, true);
			}
			$count = 0;
			foreach ($cart as $item) {
				$count += $item['num'];
			}
		  ?>
			<a href="cart.php">
				<button type="button" class="btn btn-outline-danger btn-sm" style="font-size: 20px;border: none;">
					 <i class="bi bi-cart3"></i><span style="font-weight: bold; color: #000000; ">Cart <?=$count?></span>
				</button>
			</a>		
	</nav>
</div>


