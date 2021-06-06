<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	$users = validateToken();
	// $sql = "select feedback.*, users.fullname from feedback, users where feedback.id_user = users.id and feedback.id_user = ".$users['id'];
	// $dataList = executeResult($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : "Default Title"; ?></title>
	<meta charset="utf-8">				
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style type="text/css">
		.nav-link {
			margin-right: 20px;
		}
		.navbar-light .nav-item:hover .nav-link  {
		    color: #f12020;
		}
		.navbar-light .nav-item .nav-link  {
		   font-size: 14spx;
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
		.dropdown:hover .dropdown-menu {display: block;}

		header{
		  position: fixed;
		  top: 0;
		  left: 0;
		  width: 100%;
		  box-sizing: border-box;
		  justify-content: space-between;
		  align-items: center;
		  transition: 0.6s;
		  z-index: 100000;
		}
	</style>
</head>
<body style="margin-top: 0px;">
	<header>
		<nav class="navbar navbar-expand-sm  navbar-light " style="background-color: #ffffff;">
		<a class="navbar-brand" href="../home/trangchu.php">
    		<img src="https://static.wixstatic.com/media/4e382d_0d579ec3ec6241af9e1380ed79c56b7b~mv2.png/v1/fill/w_406,h_46,al_c,q_85,usm_0.66_1.00_0.01/Asset%202_3x.webp" alt="logo" style="width:100%;">
 		</a>
		 <div class="container">
		 	<ul class="navbar-nav" style="color: #000000; font-weight: bold;">
			    <li class="nav-item active">
      				<a  class="nav-link" href="../home/trangchu.php">Trang Chủ</a>	
      			</li>
      			 <li class="nav-item active">
      				<a class="nav-link" href="../home/about.php">Giới Thiệu</a>	
      			</li>	     	
	    		<li class="nav-item active dropdown">
	      			<a class="nav-link dropdown-toggle" href="../home/dichvu.php" id="navbardrop" data-toggle="dropdown">Dịch Vụ</a>
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
	      <a class="nav-link" href="../home/contact-us.php">Liên Hệ</a>
	    </li>
	    <li class="nav-item active">
	      <a class="nav-link" href="../home/jointeam.php">Join Our Team</a>
	    </li>
	   

<?php	if(validateToken() != null) {?>
			<li class="nav-item active">
		        <a class="nav-link" href="../user/logout.php"><i class="bi bi-door-open-fill"></i>Đăng Xuất</a>
		    </li>
<?php	}else{ ?>
		<li class="nav-item active">
	      <a class="nav-link" href="../user/login.php"><i class="bi bi-door-open-fill"></i>Đăng Nhập</a>
	    </li>
<?php	} ?>
  
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
					 <i class="bi bi-cart3"></i><span style="font-weight: bold; color: #000000; "> <?=$count?></span>
				</button>
			</a>		
	</nav>
	</header>
	<script type="text/javascript">
  		 function changePageTitle() {
            newPageTitle = 'The title has changed!';
            document.title = newPageTitle;
        }
</script>
	

