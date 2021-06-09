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

