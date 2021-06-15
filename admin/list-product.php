<?php
// session_start();

$title = 'Nail | Product Page';
include_once('../home/header.php');
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
require_once('../cart/api-product.php');



if ($id = getGet('id')) {
	$productList = executeResult('select * from product where category_id = '.$id);	
} else {
	$productList = executeResult('select * from product');
} 

if ($productList == null) {
	header('Location: ../admin/list-product.php');
	die();
}

		
?>


<link rel="stylesheet" type="text/css" href="list-product.css">
<body>
<!-- <div style="margin-left: 940px;margin-top: 30px;">
 --><form style="margin-top: 50px;display: flex;margin-left: 1087px;" class="search-box" method="get">
		<input type="text" name="search" placeholder="Tìm Kiếm">
		<button class="search-btn" type="submit" name="button">
		<i class="fas fa-search"></i>
		</button>
	</form>
<!-- </div> -->
<section  class="product-section" style="margin-top: 54px; ">
    
		<div class="container">
			<div class="row" >
				<div class="col-md-12"><h3 class="title-pro">SẢN PHẨM</h3></div>
							
<?php
if (!empty($_GET)) {
	if (isset($_GET['search'])) {
		$search = $_GET['search'];

	$sql = 'select * from product where title like "%'.$_GET['search'].'%"';
	$productList = executeResult($sql);
	}
}

foreach ($productList as $item) {
	echo '<div class="col-md-3">
				<div class="product-box" >
					<div class="product-img" href="../cart/detail.php>
						<a ?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
					</div>

					<div class="product-content">
						<a style="text-decoration: none;" href="../cart/detail.php?id='.$item['id'].'"><h4 style="height: 34.91px;" >'.$item['title'].'</h4></a>

						<div class="price">
							<p >'.number_format($item['price'], 0, '', '.').' VND</p>
						</div>		
					<button style="margin-bottom: 10px;color: #fff;border-radius: 7px;" class="btn-dark" onclick="addToCart('.$item['id'].')"></i> Thêm vào giỏ</button>
					</div>
		        </div>							
		 </div>';
}
?>
									
		</div>		
	</div>
</section>
	

	

<script type="text/javascript">

	
	function addToCart(id) {
        alert('Thêm vào giỏ thành công! Hãy kiểm tra giỏ hàng.')
		$.post('api-product.php', {
			'action': 'add',
			'id': id,
			'num': 1,
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	include_once('../home/footer.php');
?>