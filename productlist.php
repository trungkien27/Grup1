<?php 
	require_once('../layout/head.php');
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');
	$productList = executeResult('select * from product');
?>
<!-- body START -->

<div class="container" style="90%" >
	<div class="row" >
		<form method="get" style="margin-bottom: 10px;margin-top: 7%; " class="col-md-12">
			<div style="width: 20%; display: flex;border: 1px solid pink;height: 30px;border-radius: 10px;outline: none;">
				<input type="text" name="search" class="form-control" style="border: none;height: 25px;margin-left: 5px;" placeholder="Tìm kiếm theo tên">
				<button style="border: none; margin-right: 7px; background-color: white; outline: none;"><i  class="bi bi-search"></i></button>
			</div>
		</form>
		<?php
		if (!empty($_GET)) {	
			if (isset($_GET['search'])) {
				$search = $_GET['search'];

			$sql = 'select * from product where title like "%'.$_GET['search'].'%"';
			$productList = executeResult($sql);
			}
		}
		$num_page = 12;
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
		$sql = "select id, title, thumbnail, price, quantity, updated_at from product limit ".$index.','.$num_page;

		// $sql = 'select id, title, thumbnail, price, quantity, updated_at from product where title like "%'.$_GET['search'].'%" limit'.$index.','.$num_page;
		$productList = executeResult($sql);

		$count = $index;

		foreach ($productList as $item) {
			echo '<div class="col-md-3"style="margin-top: 20px; margin-bottom: 20px;width:100%;text-align: center;">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%;height:250px;"></a>
					<a href="detail.php?id='.$item['id'].'" style="text-decoration-line: none;"><p style="font-size: 16px;color:black;">'.$item['title'].'</p></a>
					<p style="font-size: 16px; color: red">'.number_format($item['price'], 0, '', '.').' VND</p>
					<button class="btn btn-success" onclick="addToCart('.$item['id'].')">Thêm vào giỏ <i class="bi bi-cart3"></i></button>
				</div>';
		}
		?>
	</div>
	
		<ul class="pagination" style="margin:0px auto;">
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
<script type="text/javascript">
	function addToCart(id) {
		$.post('api-product.php', {
			'id': id, 
			'action': 'add',
			'num' : 1
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php 
	require_once('../layout/footer.php');
?>