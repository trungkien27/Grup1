
<?php
$title = 'Chi tiết sản phẩm';
include_once('../home/header.php');
require_once('../db/dbhelper.php');

$id = 0;
if(isset($_GET['id'])) {
	$id = $_GET['id'];
}
$sql = "select * from product where id = $id";
$product = executeResult($sql, true);
?>
<!-- body START -->
<div class="row">
	<div class="col-md-5">
		<img src="<?=$product['thumbnail']?>" style="width: 100%">
	</div>
	<div class="col-md-7">
		<p style="font-size: 32px;"><?=$product['title']?></p>
		<p style="font-size: 32px;">Tra Gop: <?=$product['price']?></p>
		<p style="font-size: 32px; color: red"><?=number_format($product['price'], 0, '', '.')?></p>
		<button class="btn btn-success" style="width: 100%; padding: 10px; font-size: 26px;" onclick="addToCart()">Add to cart</button>
	</div>
</div>
<!-- body END -->
<script type="text/javascript">
	function addToCart() {
		var id = '<?=$product['id']?>'
		var thumbnail = '<?=$product['thumbnail']?>'
		var title = '<?=$product['title']?>'
		var price = '<?=$product['price']?>'

		var isFind = false
		for (var i = 0; i < cartList.length; i++) {
			if(cartList[i].id == id) {
				cartList[i].num++
				isFind = true
				break
			}
		}

		if(!isFind) {
			cartList.push({
				"id": id,
				"thumbnail": thumbnail,
				"title": title,
				"price": price,
				"num": 1
			})
		}

		console.log(cartList)

		var now = new Date();
		var time = now.getTime();
		var expireTime = time + 30*24*60*60*1000;
		now.setTime(expireTime);

		document.cookie = "cart="+JSON.stringify(cartList)+";path=/;expires="+now.toUTCString()

		//Dem so phan tru trong gio hang
		var total = 0
		for (var i = 0; i < cartList.length; i++) {
			total += cartList[i].num
		}
		$('#cart_num').html(total)
	}
</script>
<?php
include_once('../home/footer.php');
?>

<?php 
	require_once('../layout/head.php');
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	$id = getGet('id');
	$productList = executeResult('select * from product where id = '.$id, true);
?>

<div class="row" style="display: flex;">
	<div class="col-md-6" style="margin-left: 50px;">
		<img src="<?=$productList['thumbnail']?>" style="width: 60%">
	</div>
	<div class="col-md-5">
		<p  style="font-size: 26px;color: black;"><?=$productList['title']?></p>
		<p style="font-size: 26px;color: black;">Còn lại: <?=$productList['quantity']?></p>
		<p style="font-size: 26px; color: red"><?=number_format($productList['price'], 0, '', '.')?> VND</p>
		<input type="number" name="soluong" min="1" style="width: 100px;color: black;margin-bottom: 30px;">
		<div class="col-md-12" style="display: flex;">
			<button class="btn btn-success col-md-6" onclick="addToCart(<?=$id?>)" style="width: 100%; font-size: 26px;height:50px;margin-top: 10px;">Add to cart</button>
			<a href="checkout.php" class="col-md-6">
				<button class="btn btn-danger" style="width: 100%; font-size: 26px; margin-top: 10px;">Checkout</button>
			</a>
		</div>
	</div>
	<div class="col-md-9" style="color: black; margin-top: 30px;margin-bottom: 50px; margin-left: 50px;">
		<h1 style="color: black;">Một số thông tin về sản phẩm</h1>
		<?=$productList['content']?>
	</div>
</div>
<div class="container" style="width: 90%">
	<div class="row">
		<div class="col-md-12">
			<h2 style="color: black;">Một số sản phẩm tương tự</h2>
		</div>
		<?php
			
			$sanpham = executeResult('select * from product where category_id =' .$productList['category_id'],);
			if ($sanpham != null) {
				foreach ($sanpham as $item) {
					echo '<div class="col-md-3"style="margin-top: 20px; margin-bottom: 20px; ">
						<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%;color: black;"></a>
						<a href="detail.php?id='.$item['id'].'"><p style="font-size: 16px;color: black;">'.$item['title'].'</p></a>
						<p style="font-size: 16px; color: red">'.number_format($item['price'], 0, '', '.').' VND</p>
						</div>';
			    }
			}
		?>

	</div>
</div>

<script type="text/javascript">
	function addToCart(id) {
		$.post('api-product.php', {
			'action': 'add',
			'id': id ,
			'num': 1
		}, function(data) {
			location.reload()
		})
	}
</script>


<?php 
	require_once('../layout/footer.php');
?>