<?php
		require_once('../db/dbhelper.php');
		require_once('../utity/utility.php');
		$orderList = executeResult('select * from orders');
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
				Order
			</div>
			<div class="card-body">
				<table class="table table-bordered" style="margin-top: 20px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Tên</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Ngày đặt hàng</th>
							<th>Chú thích</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php
$count = 0;
	foreach ($orderList as $item) {
		echo '
			<tr>
				<td>'.(++$count).'</td>
				<th>'.$item['fullname'].'</th>
				<th>'.$item['phone_number'].'</th>
				<th>'.$item['address'].'</th>
				<th>'.$item['order_date'].'</th>
				<th>'.$item['note'].'</th>
				<th><a href="order_details.php?id='.$item['id'].'" style="text-decoration-line: none;">Thông tin chi tiết</a></th>
				<th><button onclick="deleteOrder('.$item['id'].')" class="btn btn-danger">Xoá</button></th>
			</tr>
		';
	}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function deleteOrder(id) {
		option = comfirm('Bạn có muốn xoá khách hàng này !?')
		if (!option) return

		$.post('form-orders.php', {
			'action': 'delete',
			'id': id 
		}
		,function(data){
			location.reload()
		}
	)
</script>
</body>
</html>