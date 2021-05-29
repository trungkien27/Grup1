<?php
require_once('form-product.php');

$categoryList = executeResult('select * from category');
$id = getGet('id');
if ($id > 0) {
	$thisProduct = executeResult('select * from product where id = '.$id, true);
}else {
	$thisProduct = null;
}

?>

<?php
include_once('../home/header.php');
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Trang chỉnh sửa sản phẩm </h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="title">Tên sản phẩm:</label>
						<input required="true" type="text" class="form-control" id="title" name="title" value="<?=($thisProduct != null)?$thisProduct['title']:''?>">
						<input type="text" name="id" value="<?=($thisProduct != null)?$thisProduct['id']:''?>" style="display: none;">
					</div>
					<div class="form-group">
						<label for="thumbnail">Hình Ảnh:</label>
						<input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=($thisProduct != null)?$thisProduct['thumbnail']:''?>">
					</div>
					<div class="form-group">
						<label for="price">Giá:</label>
						<input required="true" min="0" type="number" class="form-control" id="price" name="price" value="<?=($thisProduct != null)?$thisProduct['price']:''?>">
					</div>
					<div class="form-group">
						<label for="category_id">Danh mục sản phẩm:</label>
						<select required="true" class="form-control" id="category_id" name="category_id">
							<option value="">-- Chọn danh mục --</option>
							<?php
								foreach ($categoryList as $item) {
									if($thisProduct != null && $item['id'] == $thisProduct['category_id']) {
										echo '<option selected value="'.$item['id'].'">'.$item['title'].'</option>';
									} else {
										echo '<option value="'.$item['id'].'">'.$item['title'].'</option>';
									}
								}
							?>
					  </select>
					</div>
					<div class="form-group">
						<label for="content">Content:</label>
						<textarea class="form-control" id="content" name="content"<?=($thisProduct != null)?$thisProduct['content']:''?>></textarea>
					</div>
					<a href="edit-product.php"><button class="btn btn-success">Lưu</button></a>
					<a href="edit-product.php"><button type="button" class="btn btn-info" style="float: right;">Quay lại </button></a>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function() {
	   $('#content').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
          ]
      });
	});
</script>
