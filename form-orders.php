<?php
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');


$title = '';

if (!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteOder();
			break;
		default:

			break;
	}
}

function deleteOrder() {
	$id  = getPost('id');
	$sql =  'delete orders.*,order_details.* from orders,order_details where id = '.$id;
	execute($sql);
}

