<?php
$title = 'Chi tiết sản phẩm';
include_once('../layout/header.php');
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
include_once('layouts/footer.php');
?>