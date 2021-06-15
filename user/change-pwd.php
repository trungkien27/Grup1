<?php 
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	require_once('../layout/header.php');

	
	require_once('../user/form-change-pwd.php');
?>

<div class="container" style="margin-top: 10%;">
	<div class="card">
		<div class="card-heading bg-primary" style="color: white;">
			<h2 class="text-center">Đổi thông tin </h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input required="true" type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
				  <label>Mật khẩu cũ:</label>
				  <input required="true" type="password" class="form-control" name="old_pwd">
				</div>
				<div class="form-group">
				  <label>Mật khẩu mới:</label>
				  <input required="true" type="password" class="form-control" name="new_pwd">
				</div>
				<div class="form-group">
				  <label>Nhập lại mật khẩu :</label>
				  <input required="true" type="password" class="form-control" name="pwd">
				</div>
				<button class="btn btn-success">Lưu thay đổi</button>
				<a href="../user/myacc.php" class="btn btn-dark" type="button">Quay lại</a>
			</form>
		</div>
	</div>
</div>

<?php 
	require_once('../layout/footer.php');
?>