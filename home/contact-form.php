
	// $id = getGet('id');
 // 	$title = $note = '';
 // 	if (!empty($_POST)) {
 // 		$title = getPost('title');
 // 		$note = getPost('note');
 // 		$created_at = $updated_at = date('Y-m-d H:i:s');
 // 		if ($id > 0 && $id != null) {
 // 			$sql = "insert into feedback(user_id, title, note, created_at, updated_at) values ('$id', '$title', '$note', '$created_at', '$updated_at')";
	// 		execute($sql);
 // 		}

 // 	} 	


<?php

$title = $note = $picture = '';
if(!empty($_POST))	{
	$title = getPost('title');
	$note = getPost('note');
	$picture = moveFileToPhotos('picture');
	$created_at = $updated_at = date('Y-m-d H:i:s');
	$userID = getPost('userID');

	//thêm thông tin vào bảng feedback
	$sql = "insert into feedback (user_id, title, note, created_at, updated_at, picture) values ('$userID', '$title', '$note', '$created_at', '$updated_at', '$picture')";
	execute($sql);
	echo('abc');
}

