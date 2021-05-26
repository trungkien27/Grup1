<?php
session_start();

$title = 'Product Page';
include_once('../layout/header.php');
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
// include_once('code-cart.php');

$productList = executeResult('select * from product');
?>
<!-- body START -->
<div class="row">
	<div class="col-md-4">
		<ul style="background-color: #e3e2e1;">
			<a href=""><li>Laptop</li></a>
			<a href=""><li>PC</li></a>
			<a href=""><li>Linh kien may tinh</li></a>
			<a href=""><li>Loa, tai nghe</li></a>
			<a href=""><li>USB, o cung</li></a>
			<a href=""><li>May in</li></a>

		</ul>
	</div>
	<div class="col-md-8">
		<img src="https://hanoicomputercdn.com/media/banner/28_Apr90c4b0034d1a0a4e5a75575b357c70bd.jpg" style="width: 100%;">
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		Tìm kiếm sản phẩm
		<form method="get">
			<input type="text" name="search" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
		</form>
	</div>
</div>

<div class="row">
<?php
if (!empty($_GET)) {
	if (isset($_GET['search'])) {
		$search = $_GET['search'];

	$sql = 'select * from product where title like "%'.$_GET['search'].'%"';
	$productList = executeResult($sql);
	}
}

foreach ($productList as $item) {
	echo '<div class="col-md-3" style="border: solid 2px #e9e6e6; padding: 20px;">
			<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
			<a href="detail.php?id='.$item['id'].'"><p style="font-size: 16px;">'.$item['title'].'</p></a>
			<p style="font-size: 16px; color: red">'.number_format($item['price'], 0, '', '.').' VND</p>
			<button class="btn btn-success" onclick="addToCart(<?=$id?>)">Thêm vào giỏ</button>
		</div>';
}
?>

</div>
<!-- <script type="text/javascript">
	function addToCart(id) {
		$.post('code-cart.php', {
			'id': id, 
			'action': 'add'
		}, function(data) {
			location.reload()
		})
	}
</script> -->


<!-- body END -->
<?php
include_once('../layout/footer.php');
?>