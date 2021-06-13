<?php 
	include_once('../layout/head.php');
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');
	 $users = validateToken();
	 $sql = "select users.fullname,users.id from users ";
	 $dataList = executeResult($sql);
	$order_id = executeResult('select id from orders where user_id ='.$users['id'],true);
	$ip = executeResult('select order_details.id,order_details.order_id,order_details.product_id,order_details.quantity,order_details.total_price,order_details.price,order_details.title,product.thumbnail from order_details,product where product.id = order_details.product_id and order_id ='.$order_id['id']);

	
?>

<div class="container" style="margin-top:5%;">
	<div class="row">
		<div class="col-md-3" style="display: block; margin-top: 10%;">
			<li class="active" style="list-style: none;">
              <a  class="nav-link" href="../user/myacc.php" style="color: black; text-decoration-line: none;">Tài khoản của tôi</a>  
            </li>
            <li class=" active" style="list-style: none;">
              <a class="nav-link" href="../user/information-product.php" style="color: black; text-decoration-line: none;">Đơn hàng</a> 
            </li> 
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th style="width: 30%;">Hình ảnh</th>
								<th>Giá</th>
								<th>Số lượng sản phẩm</th>
								<th>Tổng số tiền</th>
							
							</tr>
						</thead>
						<tbody>
			<?php
			$count = 0;
			foreach ($ip as $item) {
				echo '<tr>
						<th>'.(++$count).'</th>
						<th>'.$item['title'].'</th>
						<th><img src="'.$item['thumbnail'].'"style="width:50%; height: 100px ; text-align:center" ></th>
						<th>'.number_format($item['price'], 0, ',', '.').' VNĐ</th>
						<th>'.$item['quantity'].'</th>
						<th>'.number_format($item['total_price'], 0, ',', '.').' VNĐ</th>
					</tr>
				';
			}
			?>
						</tbody>
					</table>
		</div>			
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
?>