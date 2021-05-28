<?php
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');


$title = '';

if (!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteProduct();
			break;

		default:
			$id = getPost('id');
			if ($id > 0) {
				updateProduct();
			} else {
				addProduct();
			}

			break;
	}
}

function deleteProduct() {
	$id  = getPost('id');
	$sql =  'delete from category where id = '.$id;
	execute($sql);
}