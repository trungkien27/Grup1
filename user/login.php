<!DOCTYPE html>
<html>
<head>
	<title>Login - Page </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="banner.jpg">
	<div class="hero">
			<div class="form-box">
				<div class="button-box">
					<div id="btn"></div>
					<button  type="button" class="toggle-btn" onclick="login()">Login In</button>
					<button  type="button" class="toggle-btn" onclick="register()">Register</button>								
				</div>
				<div class="social-icon">
					<img src="fb.png">
					<img src="tw.png">
					<img src="gp.png">
				</div>			
				<form id="login" method="post" class="input-group" >
					
					<input type="text" name="email" id="email" class="input-field" placeholder=" Email" required="true">

					
					<input type="password" name="password" class="input-field" placeholder=" Password" required="true">

					<input type="checkbox" class="check-box" id="rememberMe" value="lsRememberMe"><span for>Remeber Password</span>
					<button type="submit" class="submit-btn">Log In</button>
				</form>
				<form id="register" method="post" class="input-group">
					<input type="text" name="name" class="input-field" placeholder=" Name" required="true" >

					<input type="email" name="email" class="input-field" placeholder=" Email" required="true">
					
					<input type="password" name="password" class="input-field" placeholder=" Password" required="true">
					<input type="checkbox" class="check-box" required="true"><span>I agree to the terms & condittins</span>
					<button type="submit" class="submit-btn">Register</button>
				</form>
		</div>
	</div>
	<script type="text/javascript">
		var x = document.getElementById("login");
		var y = document.getElementById('register');
		var z = document.getElementById("btn");

		function register() {
			x.style.left = '-400px';
			y.style.left = '50px';
			z.style.left = '110px';
		}
		function login() {
			x.style.left = '50px';
			y.style.left = '450px';
			z.style.left = '0';	
		}
		const rmCheck = document.getElementById("rememberMe"),
		    emailInput = document.getElementById("email");

		if (localStorage.checkbox && localStorage.checkbox !== "") {
		  rmCheck.setAttribute("checked", "checked");
		  emailInput.value = localStorage.username;
		} else {
		  rmCheck.removeAttribute("checked");
		  emailInput.value = "";
		}

		function lsRememberMe() {
		  if (rmCheck.checked && emailInput.value !== "") {
		    localStorage.username = emailInput.value;
		    localStorage.checkbox = rmCheck.value;
		  } else {
		    localStorage.username = "";
		    localStorage.checkbox = "";
		  }
}
	</script>
</body>
</html>