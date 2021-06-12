
<?php

require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

//lấy từ cookie tên là 'token' (nếu có), xóa token từ bảng user
	$token = '';
	if(isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		
		$sql = "update user set token = null where token = '$token'";
		execute($sql);

	}

setcookie('token', '', time() -3000, '/');
header('Location: ../home/trangchu.php');