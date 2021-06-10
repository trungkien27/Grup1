<?php
	$id = getGet('id');
 	$title = $note = '';
 	if (!empty($_POST)) {
 		$title = getPost('title');
 		$note = getPost('note');
 		$created_at = $updated_at = date('Y-m-d H:i:s');
 		$sql = "insert into feedback(user_id, title, note, created_at, updated_at) values ('$id', '$title', '$note', '$created_at', '$updated_at')";
		execute($sql);

 	} 	
