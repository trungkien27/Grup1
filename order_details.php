<?php
		require_once('../db/dbhelper.php');
		require_once('../utity/utility.php');
		$id = getGet('id');
		$orderList = executeResult('select * from orders where id ='.$id,true);
		$orderdetail = executeResult('select * from order_details where order_id =' .$id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Category</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 10px;">
	<div class="card">
		<div class="card-header bg-primary" style="color: white;text-align: center;">
			Thông tin chi tiết
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<div class="card">
						 <div class="card-header bg-primary" style="color: white; text-align: center;">
						 	<h3>Thông tin người nhận</h3>
						 </div>
						 <div class="card-body">
								<h4>Họ và tên : <?=$orderList['fullname']?></h4>
								<h4>Số điện thoại : <?=$orderList['phone_number']?></h4>
								<h4>Địa chỉ : <?=$orderList['address']?></h4>
								<h4>Ngày đặt hàng : <?=$orderList['order_date']?></h4>
						 </div>
					</div>
				</div>
				<div class="col-md-7" style="float: right;">
					<div class="card">
						<div class="card-body bg-primary" style="color: white;text-align: center;">
							<h3>Thông tin sản phẩm</h3>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead  style="text-align: center;">
									<tr>
										<th>STT</th>
										<th>Mã sản phẩm</th>
										<th>Tên sản phẩm</th>
										<th>Giá</th>
										<th>Số lượng</th>
										<th>Tổng tiền</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$count=0;
										$tong = 0;
										for ($i=0; $i < count($orderdetail) ; $i++) { 
											echo '<tr>
												<td>'.(++$count).'</td>
												<td>'.$orderdetail[$i]['product_id'].'</td>
												<td>'.$orderdetail[$i]['title'].'</td>
												<td>'.number_format($orderdetail[$i]['price'], 0, ',', '.').' VNĐ</td>
												<td>'.$orderdetail[$i]['quantity'].'</td>
												<td>'.number_format($orderdetail[$i]['total_price'], 0, ',', '.').' VNĐ</td>
											</tr>
											';
											$tong += $orderdetail[$i]['total_price'];
										}	 	
									?>
								</tbody>
								<h4 style="color: red;">Tổng số tiền :<?=number_format($tong, 0, ',', '.')?> VNĐ</h4>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>