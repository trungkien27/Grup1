<?php
// session_start();

$title = 'Nail | Product Page';
include_once('../home/header.php');
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
require_once('../cart/api-product.php');

$search = getGet('search');
$cate=getGET('cate');

if ($cate !='') {
	$tail1=' and category_id ='.$cate;
}else{ 
	$tail1='';
}

$search = getGet('search');
if ($search != '') {
	$tail2 = " and product.title like '%$search%' ";
} else {
	$tail2 = '';
}

$totalItems = executeResult("select count(*) as countItem from product join category 
	where
		product.category_id = category.id".$tail1, $tail2, true);

$total = $totalItems['countItem'];
$href = 'list-product.php?cate='.$tail1.'&search='.$search.'&';

$page = getGet('page');
if ($page == '') {
	$page = 1;
}

$limit = 8;
$totalPages = ceil($total/$limit);
$start = ($page - 1) * $limit;

$data = executeResult("select product.* from product join category
	where
		product.category_id = category.id ".$tail1.$tail2."
			order by updated_at DESC limit $start, $limit ");
		
?>


<link rel="stylesheet" type="text/css" href="list-product.css">
<body>
<<<<<<< HEAD
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
							
=======

<?php
foreach ($data as $item) {
	echo '<div class="col-md-3">
				<div class="product-box">
					<div class="product-img">
						<p href="../cart/detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></p>
					</div>

					<div class="product-content">
						<a href="../cart/detail.php?id='.$item['id'].'"  style="text-decoration: none;"><h4 style="height: 34.91px;" >'.$item['title'].'</h4></a>

<<<<<<< HEAD
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
=======
						<div class="price">
							<p >'.number_format($item['price'], 0, '', '.').' VND</p>
						</div>		
					<button style="margin-bottom: 10px;color: #fff" class="btn-dark" onclick="addToCart('.$item['id'].')"></i> Thêm vào giỏ</button>
>>>>>>> 7952b6f156d37be95179a282a6f09c662ca75db0
					</div>
		        </div>							
		 </div>';
}
<<<<<<< HEAD
?>
									
		</div>		
	</div>
</section>
	

	
=======
?>							
		</div>		
	</div>
</section>
	<div class="container" style="margin-bottom: 5%; margin-left: 43%;">
		<ul class="pagination">
			<?php
				if ($page > 1 ) {
					echo '<li class="page-item"><a class="page-link" href="'.$href.'page='.($page -1).'">Previous</a></li>';
				}
>>>>>>> 7952b6f156d37be95179a282a6f09c662ca75db0

				$pageList = [1, $page-1 ,$page, $page+1, $totalPages];

				$isFirst = $isBefore = false;
				for ($i=1; $i <= $totalPages; $i++) { 
					if (!in_array($i, $pageList)) {
						if (!$isFirst && $i < $page) {
							$isFirst = true;
							echo '<li class="page-item"><a class="page-link" href="'.$href.'page='.($page - 2).'">...</a></li>';
						}
						if (!$isBefore && $i > ($page+1)) {
							$isBefore = true;
							echo '<li class="page-item"><a class="page-link" href="'.$href.'page='.($page + 2).'">...</a></li>';
						}
						continue;
					}
					if ($i == $page) {
						echo '<li class="page-item active"><a class="page-link" href="'.$href.'page='.$i.'">'.$i.'</a></li>';
					} else {
						echo '<li class="page-item"><a class="page-link" href="'.$href.'page='.$i.'">'.$i.'</a></li>';
					}
				}
				if ($page < $totalPages) {
					echo '<li class="page-item"><a class="page-link" href="'.$href.'page='.($page +1).'">Next</a></li>';
				}
			?>
		</ul>
	</div>

<?php
	include_once('../layout/footer.php');
?>
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
<<<<<<< HEAD
<?php
	include_once('../home/footer.php');
?>

