<?php
require_once '../db/dbhelper.php';
require_once '../utils/utility.php';
  $users = validateToken();
  $sql = "select user.fullname from user ";
  $dataList = executeResult($sql);
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
  <link rel="stylesheet" type="text/css" href="../layout/style.css">

<style>

.navbar {
  /*position: fixed;*/
  top: 20;
}

.topnav {
  overflow: hidden;
  background-color: #fff;
}

.topnav a {
  float: left;
  display: block;
  color: #000;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  font-family: Cambria;
  text-transform: uppercase;
  font-weight: bold;
}

.active {
  background-color: #fff;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
  position: relative;
  display: inline-block;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: #000;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: #000;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  color: #f12020;
}

.dropdown-content a:hover {
  color: #f12020;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 1446px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 1446px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

.logo {
  width: 325px;
  height: 49px;
}

#myTopnav {
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
<body>

<header>
  <div class="topnav navbar" id="myTopnav">
  <a class="navbar-brand" href="../home/trangchu.php">
    <img class="logo" src="https://static.wixstatic.com/media/4e382d_0d579ec3ec6241af9e1380ed79c56b7b~mv2.png/v1/fill/w_406,h_46,al_c,q_85,usm_0.66_1.00_0.01/Asset%202_3x.webp" alt="logo" style="width:325px;">
  </a>
    <a href="../home/trangchu.php">trang chủ</a>
    <a href="../home/about.php">giới thiệu</a>
    <a href="../admin/list-product.php">sản phẩm</a>
<!--   <div class="dropdown">
    <button class="dropbtn" href="../admin/list-product.php">sản phẩm 
      <i class="fa fa-caret-down"></i>
    </button>
      <div class="dropdown-content">
       
            foreach ($categoryList as $item) {
              echo '<a href="../admin/list-product.php?id='.$item['id'].'">'.$item['title'].'</a>';
            
    </div>
  </div>       -->
  <!-- <div class="dropdown"> -->
    <!-- <a class="dropbtn">chia sẻ<a> -->
      <!-- <div class="dropdown-content"> -->
        <a href="../page/gallery.php">thư viện ảnh</a>
        <a href="../page/tips.php">tips </a>
      <!-- </div> -->
  <!-- </div> -->
  
  <a href="../home/contact-us.php">liên hệ</a>

<?php
 if(validateToken() != null) {
  echo ' <li class="nav-item active">
    <a class="nav-link" href="../user/logout.php"><i class="bi bi-door-open-fill"></i>Đăng Xuất</a>
    </li>';
  } else { 
  echo '<li class="nav-item active">
    <a class="nav-link" href="../user/login.php"><i class="bi bi-door-open-fill"></i>Đăng Nhập</a>
    </li>';
  } 
?>

  <a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>

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
   <a href="../cart/cart.php">
      <button class="btn btn-outline-dark btn-lg" style="border: none;">
        <span style="font-family: Cambria;font-size: 22px;color: red;"><i class="fa fa-shopping-cart"></i> <?=$count?></span>
      </button>
    </a>
</div>
</header>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>