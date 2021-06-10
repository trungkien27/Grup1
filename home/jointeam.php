<?php
	$title = "Nail | Join Our Team";
	include_once('../home/header.php');
?> 

<body>
	<link rel="stylesheet" type="text/css" href="jointeam.css">
	<div style="width: 1360px;height: 1211px;display: flex;">
		<div class="join1" style="	width: 680px;height: 1184px;left: 79.5px; ">
			<p class="font_a" style="vertical-align: initial;">Tham gia nhóm NB của chúng tôi</p>

			<div style="margin: 79px; line-height: 27px;">
				<p class="font_b">Tại NB, mọi người đều đóng góp một phần vào sự phát triển của chúng tôi!</p>

				<P class="font_b">Chúng tôi luôn tìm kiếm những người tuyệt vời để tham gia vào nhóm của chúng tôi và chia sẻ các giá trị cốt lõi của chúng tôi! Nếu bạn là một chuyên gia làm đẹp được cấp phép, vui lòng gọi cho chúng tôi và chúng tôi sẽ sẵn lòng nói chuyện với bạn!</P>

				<p class="font_b">Hãy cho chúng tôi biết cách chúng tôi có thể giúp bạn phát triển cùng với chúng tôi!</p>
			</div>
			<div style="width: 680px;height: 558px; margin-left: 40px;">
				<form method="POST">
					<div class="input_join">
						<input required="true" type="text" name="fullname" placeholder="Họ Và Tên">
					</div>
					<div class="input_join">
						<input required="true" type="email" name="email" placeholder="Email">
					</div>
					<div class="input_join">
						<input required="true" type="text" name="phone" placeholder="Số Điện Thoại">
					</div>
					<div class="input_join">
						<select  name="select">
							<option style="display: none;">Vị Trí Ứng Tuyển</option>
							<option value="Chuyên Gia Thẩm Mỹ">Chuyên Gia Thẩm Mỹ</option>
							<option value="Kỹ Thuật Viên LÀm Móng">Kỹ Thuật Viên LÀm Móng</option>
							<option value="Chuyên Gia TRị Liệu Xoa Bóp">Chuyên Gia TRị Liệu Xoa Bóp</option>
							<option value="Lễ Tân">Lễ Tân</option>
						</select>
					</div>
					<div class="input_join">
						<input id="txtDate" type="date" name="date" placeholder="Ngày Hẹn">
					</div>
					<div class="input_join">
						<input  required="true" type="text" name="link" placeholder="Link CV">
					</div>
					<button style="margin-top: 42px;margin-left: 231px;font-size: 24px;padding-left: 30px;padding-right: 30px;" class="btn btn-dark">Gửi</button>


				</form>
			</div>
		</div>
		<div class="join2" style="	width: 680px;height: 1184px;right: 79.5px;">

		</div>
	</div>
	<script type="text/javascript">
		$(function(){
    		var dtToday = new Date();
    
    		var month = dtToday.getMonth() + 1;
   			var day = dtToday.getDate();
    		var year = dtToday.getFullYear();
    		if(month < 10)
        		month = '0' + month.toString();
    		if(day < 10)
        		day = '0' + day.toString();
    
    		var minDate= year + '-' + month + '-' + day;
    
    		$('#txtDate').attr('min', minDate);
})
	</script>


<?php
	include_once('../home/footer.php');
?>