<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteProduct();
			break;
		default:
			$id = getPost('id');
			if($id > 0) {
				updateProduct();
			} else {
				addProduct();
			}
			break;
	}
}

function deleteProduct() {
	$id = getPost('id');
	$sql = 'delete from product where id = '.$id;
	execute($sql);
}

function addProduct() {
	$title = $price = $thumbnail = $content = $category_id = '';

	$title = getPost('title');
	$price = getPost('price');
	$thumbnail = getPost('thumbnail');
	$content = getPost('content');
	$category_id = getPost('category_id');

	
		$created_at = $updated_at = date('Y-m-d H+5:i:s');
		
	

	

	$sql = "insert into product(title, price, thumbnail, content, category_id, created_at, updated_at) values ('$title', '$price', '$thumbnail', '$content', $category_id, '$created_at', '$updated_at')";
	execute($sql);
}

function updateProduct() {
	$title = $price = $thumbnail = $content = $category_id = '';

	$title = getPost('title');
	$price = getPost('price');
	$thumbnail = getPost('thumbnail');
	$content = getPost('content');
	$category_id = getPost('category_id');
	$id = getPost('id');

	$updated_at = date('Y-m-d H+5:i:s');

	$sql = "update product set title = '$title', price = '$price', thumbnail = '$thumbnail', content = '$content', category_id = $category_id, updated_at = '$updated_at' where id = $id";
	execute($sql);
}