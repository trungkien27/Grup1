<?

$user = validateToken();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1 style="text-align: center;">Hello <font color="red"><?=$user['fullname']?></font>(<a href="../user/logout.php">Log out</a>)</h1>
</body>
</html>