<?php 
	$title = "Nail | Đổi Thông Tin";
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	require_once('../layout/header.php');

	
	require_once('../user/form-change-pwd.php');
?>
<link rel="stylesheet" type="text/css" href="../css/change-pwd.css">
<div class="container" style="margin-top: 87px;margin-bottom: 32px;">
    <div class="wrapper">
      <div class="tex">
        <h4>Đổi Thông Tin</h4>
      </div>
     <div class="input-data">
        <input required="true" type="email" name="email">
        <div class="underline"></div>
        <label>Email</label>
     </div>
     <div class="input-data">
        <input required="true" type="password" name="old_pwd">
        <div class="underline"></div>
        <label>Mật khẩu cũ</label>
     </div>
     <div class="input-data">
        <input required="true" type="password"  name="new_pwd">
        <div class="underline"></div>
        <label>Mật khẩu mới</label>
     </div>
     <div class="input-data">
          <input  required="true" type="password" name="pwd"></input>
          <div class="underline"></div>
          <label>Nhập lại mật khẩu mới</label>
      </div>
      <div class="social_media">
        <ul>
          <li><button style="border: none; outline:none;color: #fff">Lưu Thông Tin</button></li>
          <li><a href="../user/myacc.php">Quay lại</a></li>
      </ul>
      </div>
    </div>
</div>

<?php 
	require_once('../layout/footer.php');
?>