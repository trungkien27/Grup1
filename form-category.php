<?php
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');


$title = '';

if (!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteCategory();
			break;

		default:
			$id = getPost('id');
			if ($id > 0) {
				updateCategory();
			} else {
				addCategory();
			}

			break;
	}
}

function deleteCategory() {
	$id  = getPost('id');
	$sql =  'delete from category where id = '.$id;
	execute($sql);
}

function updateCategory() {
	$title = $id =  '';
	$id = getGet('id');
	$title = getPost('title');
	if (!empty($title)) {
		$updated_at = date('Y-m-d H:i:s');
		$sql = "update catagory set title = '$title',updated_at = '$updated_at'";
		// echo $sql;
		execute($sql);
	}	
}

function addCategory() {
	$title     = getPost('title');

	if (!empty($title)) {
		$created_at = $updated_at = date('Y-m-d H:i:s');
		$sql = "insert into category(title, created_at, updated_at) values ('$title', '$created_at', '$updated_at')";
		// echo $sql;
		execute($sql);
	}
}
