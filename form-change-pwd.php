<?php 
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');
	$users = validateToken();
	$sql = "select * from users ";
	$dataList = executeResult($sql);
	$order_id = executeResult('select * from orders where user_id ='.$users['id'],true);

$email = $old_pwd =$new_pwd= $pwd = '';
if (!empty($_POST)) {
	$new_pwd = getPost('new_pwd');
	$email = getPost('email');
	$old_pwd = getPost('old_pwd');
	$pwd = getPost('pwd');
	$updated_at = date('Y-m-d H:i:s');

	if ($email == $users['email'] && $old_pwd == $users['password'] && $new_pwd == $pwd) {
		$new_pwd = md5(md5($password).MD5_PRIMARY_KEY);
		$sql = "update users set password = '$new_pwd',updated_at = '$updated_at'  where id ='$users['id']'"
		execute($sql );
	}else if ($email != $users['email'] && $old_pwd != $users['password']) {
		confirm('Email hoặc mật khẩu sai 
			Vui lòng nhập lại');
	}else{
		confirm('Mật khẩu nhập lại không đúng.xin thử lại');
	}

}