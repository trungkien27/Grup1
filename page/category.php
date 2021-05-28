<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
$categoryList = executeResult('select * from category ')
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
				Category List
			</div>
			<div class="card-body">
				<a href="add-product.php"><button class="btn btn-success">Add Product</button></a>
				<table class="table table-bordered" style="margin-top: 20px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php
$count = 0;
	foreach ($categoryList as $item) {
		echo '
			<tr>
				<td>'.(++$count).'</td>
				<td>'.$item['title'].'</td>
				<td><a href="add-product.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a></td>
				<td><button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Delete</button></td>
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
	function deleteProduct(id) {
		option = comfirm('Bạn có muốn xoá mặt hàng này !?')
		if (!option) return

		$.post('form-category.php', {
			'action': 'delete',
			'id': id 
		}
		,function(data){
			location.reload()
		})
</script>
</body>
</html>