<?php
// session_start();

$title = 'Edit Page';
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

include_once('../layout/admin-header.php');
// require_once('form-product.php');
?>
<!-- body START -->
	<div class="container" style="margin-top: 10px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý phản hồi </h2>
			</div>
			<div class="panel-body" style="margin-top: 30px;">
				<div class="row">
					<!-- <div class="col-md-3">
						<select style="height: 35px;width: 250px;">
							<option> Sắp xếp theo </option>
						</select>
					</div>
					<div class="col-md-4">
						<form method="get">
							<input type="text" name="search" class="form-control"placeholder="Tìm kiếm theo tên ">
						</form>
					</div> -->
					<!-- <div class="col-md-3">
						<a href="add-product.php"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm sản phẩm mới</button></a>		
					</div> -->
				</div>
				<table class="table table-bordered" style="margin-top: 10px;">
					<thead>
						<tr>
							<th>STT</th>
							<th>ID người dùng </th>
							<th>Tiêu đề </th>
							<th>Hình ảnh </th>
							<th>Nội dung  </th>
							<th>Ngày tạo </th>
						</tr>
					</thead>
					<tbody>
<?php 

if (!empty($_GET)) {
	if (isset($_GET['search'])) {
		$search = $_GET['search'];


	}
}


	$num_page = 6;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$index = ($page - 1) * $num_page;
	//gia du page 1 -> index = (1-1)*6 = 0
	//page 2 -> index = (2-1)*6= 6

	//tim tong so san pham trong database
	$sql = 'select count(*) total from feedback';
	$productList = executeResult($sql);
	$total = $productList[0]['total'];

	//lay so sp chia cho so sp tren 1 trang -> ra duoc so trang, lam tron len.
	$totalPage = ceil($total/$num_page);

	

	$sql = "select id, user_id, title, note, picture, created_at from feedback limit ".$index.','.$num_page;

	// $sql = 'select id, title, thumbnail, price, quantity, updated_at from product where title like "%'.$_GET['search'].'%" limit'.$index.','.$num_page;
	$productList = executeResult($sql);


	$count = $index;

	// $count = 0;
	foreach ($productList as $item) {
		echo '<tr>
				<td style="width:40px;">'.++$count.'</td>
				<td style="width:100px;">'.$item['user_id'].'</td>
				<td>'.$item['title'].'</td>
				<td><a "style="width: 100px;">'.$item['picture'].'</a></td>
				<td style="width:410px;">'.$item['note'].'</td>
				<td style="width:150px;">'.$item['created_at'].'</td>
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
</div>
<script type="text/javascript">
	// function deleteProduct(id) {
	// 	option = confirm('Bạn chắc chắn muốn xóa sản phẩm này ??')
	// 	if (!option) return

		// $.post('form-product.php', {
		// 	'action': 'delete',
		// 	'id': id
		// }, function(data) {
		// 	location.reload();
		// })
	// }
</script>
<!-- body END -->

</body>
</html> 