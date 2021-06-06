<?php
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');
	$email =$title = $note = $id = '';
	if (!empty($_POST)) {
		$email = getPost('email');
		$user = executeResult('select * from users where email = '.$email,true);
		$id = $user['id'];
 		$title = getPost('title');
 		$note = getPost('note');
 		$created_at = $updated_at = date('Y-m-d H:i:s');
 		if ($id != null) {
 			$sql = "insert into feedback(user_id, title, note, created_at, updated_at) values ('$id', '$title', '$note', '$created_at', '$updated_at')";
			execute($sql);
 		}
	}
