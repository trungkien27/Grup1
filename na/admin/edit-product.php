<?php
session_start();

$title = 'Edit Page';
include_once('../layout/header.php');
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
require_once('form-product.php');
?>
<!-- body START -->

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý sản phẩm</h2>
			</div>
			<div class="panel-body">
				<a href="add-product.php"><button class="btn btn-info">Thêm sản phẩm mới</button></a>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Giá bán</th>
							<th>Ngày cập nhật</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php 
	$num_page = 4;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$index = ($page - 1) * $num_page;
	//gia du page 1 -> index = (1-1)*6 = 0
	//page 2 -> index = (2-1)*6= 6

	//tim tong so san pham trong database
	$sql = 'select count(*) total from product';
	$productList = executeResult($sql);
	$total = $productList[0]['total'];

	//lay so sp chia cho so sp tren 1 trang -> ra duoc so trang, lam tron len.
	$totalPage = ceil($total/$num_page);

	//lay tu product o vi tri index, lay num_page phan tu
	$sql = "select id, title, thumbnail, price, updated_at from product limit ".$index.','.$num_page;
	$productList = executeResult($sql);

	$count = $index;

	// $count = 0;
	foreach ($productList as $item) {
		echo '<tr>
				<td>'.++$count.'</td>
				<td>'.$item['title'].'</td>
				<td><a href="product-detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 160px;"/></a></td>
				<td>'.$item['price'].'</td>
				<td>'.$item['updated_at'].'</td>
				<td><a href="add-product.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa sản phẩm</button></a></td>
				<td><button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Xóa sản phẩm</button></td>
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
	function deleteProduct(id) {
		option = confirm('Bạn chắc chắn muốn xóa sản phẩm này ??')
		if (!option) return

		$.post('form-product.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload();
		})
	}
</script>
<!-- body END -->
<?php
include_once('../layout/footer.php');
?>