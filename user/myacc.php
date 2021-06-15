<?php 
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	require_once('../layout/header.php');
	 $users = validateToken();
	 $sql = "select * from user";
	 $dataList = executeResult($sql);
	$order_id = executeResult('select * from orders where user_id ='.$users['id'],true);
?>

<div class="container" style="margin-top:10%;">
	<div class="row">
		<div class="col-md-3" style="display: block; margin-top: 10%;">
			<li class="active" style="list-style: none;">
              <a  class="nav-link" href="../user/myacc.php" style="color: black; text-decoration-line: none;">Tài khoản của tôi</a>  
            </li>
            <li class=" active" style="list-style: none;">
              <a class="nav-link" href="../user/information-product.php" style="color: black; text-decoration-line: none;">Đơn hàng</a> 
            </li> 
		</div>
		<div class="col-md-9" style="background-color: pink;">
			<h2 style="margin-top: 10px; margin-left: 20px;">Hồ sơ của tôi</h2>
			<div class="row">
				<div class="col-md-3">
					<h5 style="margin-bottom: 20px;">Tên người dùng :</h5>
					<h5 style="margin-bottom: 20px;">Email người dùng :</h5>
					<h5 style="margin-bottom: 20px;">Số điện thoại :</h5>
					<h5 style="margin-bottom: 20px;">Địa chỉ :</h5>
				</div>
				<div class="col-md-9" >
					<h5 style="margin-bottom: 20px;"><?=$users['fullname']?></h5>
					<h5 style="margin-bottom: 20px;"><?=$users['email']?></h5>
					<h5 style="margin-bottom: 20px;"><?=$order_id['phone_number']?></h5>
					<h5 style="margin-bottom: 20px;"><?=$order_id['address']?></h5>
				</div>
				<button style="margin: 10px;border: none;outline: none;" class="bg-success"><a href="../user/change-pwd.php" style="text-decoration-line: none;color: white;">Đổi thông tin cá nhân </a></button>
			</div>
		</div>			
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
?>