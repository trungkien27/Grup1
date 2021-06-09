<?php
session_start();

$title = 'Edit Page';
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

include_once('../layout/admin-header.php');
require_once('form-product.php');
?>
<!-- body START -->
	<div class="container" style="margin-top: 10px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý sản phẩm</h2>
			</div>
			<div class="panel-body" style="margin-top: 30px;">
				<div class="row">
					<div class="col-md-3">
						<select style="height: 35px;width: 250px;">
							<option> Sắp xếp theo </option>
						</select>
					</div>
					<div class="col-md-4">
						<form method="get">
							<input type="text" name="search" class="form-control"placeholder="Tìm kiếm theo tên ">
						</form>
					</div>
					<div class="col-md-3">
						<a href="add-product.php"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm sản phẩm mới</button></a>		
					</div>
				</div>
				<table class="table table-bordered" style="margin-top: 10px;">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Giá bán</th>
							<th>Số lượng </th>
							<th>Ngày cập nhật</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>


<?php

	$num_page = 6;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$index = ($page - 1) * $num_page;

	$sql = 'select count(*) total from product';
	$productList = executeResult($sql);
	$total = $productList[0]['total'];

	$totalPage = ceil($total/$num_page);

if (!empty($_GET)) {
	if (isset($_GET['search'])) {
		$search = $_GET['search'];
}

	$sql = "select id, title, thumbnail, price, quantity, updated_at from product where title like '%$search%' limit ".$index.','.$num_page;
	$productList = executeResult($sql);

	$count = $index;

	// $count = 0;
	foreach ($productList as $item) {
		echo '<tr>
				<td style="width:70px;">'.++$count.'</td>
				<td>'.$item['title'].'</td>
				<td><a href="product-detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 160px;"/></a></td>
				<td style="width:110px;">'.$item['price'].'</td>
				<td style="width:110px;">'.$item['quantity'].'</td>
				<td style="width:200px;">'.$item['updated_at'].'</td>
				<td style="width:110px;"><a href="add-product.php?id='.$item['id'].'"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</button></a></td>
				<td style="width:110px;"><button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</button></td>
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
									echo '<li class="page-item"><a class="page-link" href="edit-product.php?search='.$search.'&page='.($page - 2).'">...</a></li>';
								}
								if (!$isBefore && $i > ($page+1)) {
									$isBefore = true;
									echo '<li class="page-item"><a class="page-link" href="edit-product.php?search='.$search.'&page='.($page + 2).'">...</a></li>';
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

</body>
</html> 



<?php
$conn=mysql_connect("localhost","root","123") or die("Khong the ke noi");
mysql_select_db("email",$conn) or die ("Khong ket noi dc CSDL");
$tin=mysql_query("select id from dangky");
?>
<?php
$row_per_page=2 ; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị
if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;
$tim=$_GET['_timkiem'];
echo $tim;
$sql=mysql_query("select * from dangky where name='".$_GET['tukhoa']."' order by name asc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
?>
<table border="1" cellspacing="0" cellpadding="0">
<tr>
 <td bgcolor="#FFFFCC">Name</td>
 <td bgcolor="#FFFFCC">Email</td>
</tr>
<?php while($row=mysql_fetch_array($sql))
{?>
  <tr>
    <td><?php echo $row[name] ?></td>
 <td><?php echo $row[_email] ?></td>
  </tr>
<?php
}  ?>
</table>
<?php
if($page!=0)
{
  echo "<a href='index.php?start=".($start+$row_per_page)."&tukhoa=".$_GET['tukhoa']."'>Tới</a>";
} $tong=mysql_num_rows($sql);
if($tong>=$row_per_page)
{
$page_cr=($start/$row_per_page)+1;
for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<div class='phantrang'>"."<a href='index.php?start=".$row_per_page*($i-1)."&tukhoa=".$_GET['tukhoa']."'>$i&nbsp;</a>"."</div>";
 else echo "<div class='phantrang'>".$i." "."</div>";
}
}
?>