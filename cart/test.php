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
	<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body style="background-color: #f8f8f8;">
	<form method="post">
	<div class="container" style="margin-top:7%;">
		<div class="row">
			
			<div class="col-md-5" >
				<div class="thanh"></div>
				<h3><span class="fas fa-map-marker-alt"></span>Địa Chỉ Nhận Hàng </h3>
				<div class="form-group" style="display:none;">
				  <label for="userid">userid:</label>
				  <input type="number" class="form-control" id="userID" name="userID" value="<?=$user['id']?>">
				</div>
				<div class="form-group">
				  <label for="usr">Tên người nhận:</label>
				  <input required="true" type="text" class="form-control" id="usr" name="fullname">
				</div>
				<div class="form-group">
				  <label for="address">Địa chỉ: </label>
				  <input required="true" type="text" class="form-control" id="address" name="address">
				</div>
				<div class="form-group">
				  <label for="phone_number">Số điện thoại: </label>
				  <input required="true" type="text" class="form-control" id="phone_number" name="phone_number">
				</div>
				<div class="form-group">
				  <label for="note">Ghi chú: </label>
				  <textarea class="form-control" rows="4" name="note" id="note"></textarea>
				</div>
			</div>
			<div class="col-md-7">	
			<div class="container">
				<h3> Sản Phẩm</h3>
			<div class="table-responsive">
				<table class="table" style="background-color: #fff;">
					<thead class="thead-dark">
						<tr >
							<th scope="col" class="text-white">STT</th>
							<th scope="col" class="text-white">Tên Sản Phẩm</th>
							<th scope="col" class="text-white">Số Lượng</th>
							<th scope="col" class="text-white">Số Tiền</th>
							<th scope="col" class="text-white">Tổng Cộng</th>
						</tr>
					</thead>
					<tbody  style="background-color: #fff;">
						<tr>
							<td></td>
							<td>ỷeyerye</td>
							<td>y4343</td>
							<td>342</td>
							<td>54543</td>
						</tr>
						<tr>
							<td></td>
							<td>ỷeyerye</td>
							<td>y4343</td>
							<td>342</td>
							<td>54543</td>
						</tr>
					</tbody>	
					</table>
				</div>
				
					<div class="thanhtoan" style="">
					<div  style="background-color: #ffffff;height: 50px;">
						<span style="float: left;font-size: 23px;font-weight: bold;margin-top: 10px;">Phương thức thanh toán</span>
						<span style="float: right;margin-top: 10px;">Thanh toán khi nhận hàng</span>
						
					</div>
					<p><span >Tổng tiền hàng:</span><span style="margin-left: 68%">11</span></p>
					<p><span>Phí vận chuyển:</span><span style="margin-left: 68%">11</span></p>
					<p><span>Tổng thah toán:</span><span style="margin-left: 68%;font-size: 25px;font-weight: bold;">11</span></p>
					<div style="height: 50px;border-top: 1px dashed rgba(0,0,0,.09);">
						<button style="float: right;margin-top: 19px;margin-right: 32px;" class="btn btn-dark">Đặt Hàng</button>
					</div>
				</div>
			</div>
		</div>	
</body>
</html>
