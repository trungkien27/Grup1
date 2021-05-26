<?php
require_once('../db/dbhelper.php');
$productList = executeResult('select id, title, thumbnail, price, updated_at from product');
if (!empty($_GET)) {
	if (isset($_GET['search'])) {
		$search = $_GET['search'];


		$sql = "select * from product where title like '%".$search."%'";
		// $sql = "select * from product where title like '%".$search."%' limit $displayposition,10";
		$productList = select_Product($sql);
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Product - Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Product List</h2>
			</div>
			<div class="panel-body">
				<a href="add-product.php"><button class="btn btn-success">Add</button></a>
				<form class="form-inline" method="get" style="margin-right: 0px">
				    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
				    <button class="btn btn-success" type="submit">Search</button>
				 </form>
				<table style="margin-top: 10px" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Hình Ảnh</th>
							<th>Tiêu Đề</th>
							<th style="width: 150px">Giá</th>
							<th>Cập Nhập Tại</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php
	$num_page = 6;
	$page = 1;
	if(isset($_GET['page'])) {
		
		$page = $_GET['page'];
	}
	$index = ($page - 1) * $num_page;

	$sql = 'select count(*) total from product';
	$thisProduct = executeResult($sql );
	$total = $thisProduct[0]['total'];

	$totalPage = ceil($total/$num_page);

	if ($thisProduct != null && $thisProduct > 0) {
		$sql = 'select id, title, thumbnail, price, updated_at from books limit '.$index.', '.$num_page;
		$thisProduct = executeResult($sql);
	}else {
		$thisProduct = null;
	}
	$count = 0;
	foreach ($productList as $item) {
		echo '<tr>
				<td>'.(++$count).'</td>
				<td><img src="'.$item['thumbnail'].'" style="width: 160px;"/></td>
				<td>'.$item['title'].'</td>
				<td>'.number_format($item['price'] ,0, ',', '.').' VNĐ</td>
				<td>'.$item['updated_at'].'</td>
				<td><a href="add-product.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a></td>
				<td><button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Delete</button></td>
			</tr>';
	}
?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
	<div class="container">
		<ul class="pagination justify-content-center" style="margin:20px 0">  
<?php
						if($page > 1) {
							echo '<li class="page-item"><a class="page-link" href="?page='.($page - 1).'">Previous</a></li>';
						}

						$pageList = [1, $page - 1, $page, $page + 1, $totalPage];

						$isFirst = $isBefore = false;
						for ($i=1; $i <= $totalPage; $i++) {
							if(!in_array($i, $pageList)) {
								if(!$isFirst && $i < $page) {
									$isFirst = true;
									echo '<li class="page-item"><a class="page-link" href="?page='.($page - 2).'">...</a></li>';
								}
								if(!$isBefore && $i > ($page+1)) {
									$isBefore = true;
									echo '<li class="page-item"><a class="page-link" href="?page='.($page + 2).'">...</a></li>';
								}
								continue;
							}
							if($i == $page) {
								echo '<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
							} else {
								echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
							}
						}
						if($page < $totalPage) {
							echo '<li class="page-item"><a class="page-link" href="?page='.($page + 1).'">Next</a></li>';
						}
?>	 
		</ul>
	</div> 
<script type="text/javascript">
	function deleteProduct(id) {
		option = confirm('Are you sure to delete this product?')
		if(!option) return

		$.post('form-product.php', {
			'action': 'delete',
			'id': id
		}, function(date) {
			location.reload()
		})
	}
</script>
</body>
</html>