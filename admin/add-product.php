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

<!DOCTYPE html>
<html>
<head>
	<title>Add Product - Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Product</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="title">Title:</label>
					  <input required="true" type="text" class="form-control" id="title" name="title" value="<?=($thisProduct != null)?$thisProduct['title']:''?>">
					  <input type="text" name="id" value="<?=($thisProduct != null)?$thisProduct['id']:''?>" style="display: none;">
					</div>
					<div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=($thisProduct != null)?$thisProduct['thumbnail']:''?>">
					</div>
					<div class="form-group">
					  <label for="price">Price:</label>
					  <input required="true" min="0" type="number" class="form-control" id="price" name="price" value="<?=($thisProduct != null)?$thisProduct['price']:''?>">
					</div>
					<div class="form-group">
					  <label for="category_id">Category:</label>
					  <select required="true" class="form-control" id="category_id" name="category_id">
					  	<option value="">-- Select --</option>
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
					  <textarea class="form-control" id="content" name="content"><?=($thisProduct != null)?$thisProduct['content']:''?></textarea>
					</div>
					<a href="product-list.php>"><button class="btn btn-success">Save</button></a>
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
</body>
</html>