<?php

require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
require_once('form-category.php');

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
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý danh mục sản phẩm </h2>
			</div>
			<div class="panel-body">
				<a href="add-category.php"><button class="btn btn-success">Thêm danh mục sản phẩm mới </button></a>
				<table class="table table-bordered" style="margin-top: 20px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php 
	$num_page = 5;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$index = ($page - 1) * $num_page;
	//gia du page 1 -> index = (1-1)*6 = 0
	//page 2 -> index = (2-1)*6= 6

	//tim tong so san pham trong database
	$sql = 'select count(*) total from category';
	$categoryList = executeResult($sql);
	$total = $categoryList[0]['total'];

	//lay so sp chia cho so sp tren 1 trang -> ra duoc so trang, lam tron len.
	$totalPage = ceil($total/$num_page);

	//lay tu product o vi tri index, lay num_page phan tu
	$sql = "select id, title, created_at, updated_at from category limit ".$index.','.$num_page;
	$categoryList = executeResult($sql);

	$count = $index;

	// $count = 0;
	foreach ($categoryList as $item) {
		echo '<tr>
				<td>'.++$count.'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['created_at'].'</td>
				<td>'.$item['updated_at'].'</td>
				<td><a href="add-category.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa danh mục </button></a></td>
				<td><button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xóa danh mục</button></td>
			</tr>';
}
?>
					</tbody>
				</table>
				<ul class="pagination">
					<?php
						if ($page >1 ) {
							echo '<li class="page-item"><a class="page-link" href="?page='.($page -1).'">Previous</a></li>';
						}

						$pageList = [1, $page-1 ,$page, $page+1, $totalPage];

						$isFirst = $isBefore = false;
						for ($i=1; $i <= $totalPage; $i++) { 
							if (!in_array($i, $pageList)) {
								if (!$isFirst && $i < $page) {
									$isFirst = true;
									echo '<li class="page-item"><a class="page-link" href="?page='.($page - 2).'">...</a></li>';
								}
								if (!$isBefore && $i > ($page+1)) {
									$isBefore = true;
									echo '<li class="page-item"><a class="page-link" href="?page='.($page + 2).'">...</a></li>';
								}
								continue;
							}
							if ($i == $page) {
								echo '<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
							} else {
								echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
							}
						}
						if ($page < $totalPage) {
							echo '<li class="page-item"><a class="page-link" href="?page='.($page +1).'">Next</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function deleteCategory(id) {
		option = confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này ??')
		if (!option) return

		$.post('form-category.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload();
		})
	}
</script>
</body>
</html>