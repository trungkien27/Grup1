<?php 
	include_once('../layout/head.php');
	require_once('../db/dbhelper.php');
	require_once('../utity/utility.php');
	 $users = validateToken();
	 $sql = "select * from users ";
	 $dataList = executeResult($sql);
	$order_id = executeResult('select * from orders where user_id ='.$users['id'],true);
	require_once('../user/form-change-pwd.php');
?>

<div class="container" style="margin-top: 10%;">
	<div class="card">
		<div class="card-heading bg-primary" style="color: white;">
			<h2 class="text-center">Đổi mật khẩu</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
				  <label for="email">Email :</label>
				  <input required="true" type="email" class="form-control" id="title" name="email">
				</div>
				<div class="form-group">
				  <label for="email">Mật khẩu cũ :</label>
				  <input required="true" type="password" class="form-control" id="title" name="old_pwd">
				</div>
				<div class="form-group">
				  <label for="email">Mật khẩu mới :</label>
				  <input required="true" type="password" class="form-control" id="title" name="new_pwd">
				</div>
				<div class="form-group">
				  <label for="email">Nhập lại mật khẩu :</label>
				  <input required="true" type="password" class="form-control" id="title" name="pwd">
				</div>
				<button class="btn btn-success">Lưu</button>
			</form>
		</div>
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
?>