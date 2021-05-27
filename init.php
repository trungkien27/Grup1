<?php
require_once('db/dbhelper.php');

if(!empty($_POST)) {
	$sql = "create database if not exists ".DATABASE;
	initDB($sql);

	$sql = "create table if not exists user (
		id int primary key auto_increment,
		fullname varchar(50),
		email varchar(50),
		password varchar(32),
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);

	$sql = "create table if not exists category (
		id int primary key auto_increment,
		title varchar(50),
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);

	$sql = "create table if not exists product (
		id int primary key auto_increment,
		category_id int references category (id),
		title varchar(50),
		price float,
		thumbnail varchar(200),
		content varchar(500),
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);

	$sql = "create table if not exists gallery (
		id int primary key auto_increment,
		thumbnail varchar(200),
		title varchar(50),
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);

	$sql = "create table if not exists orders (
		id int primary key auto_increment,
		fullname varchar(50),
		phone_number varchar(20),
		email varchar(50),
		address varchar(200),
		order_date datetime,
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);

	$sql = "create table if not exists order_details  (
		id int primary key auto_increment,
		order_id int references orders (id),
		product_id int references product (id),
		quantity int,
		total_price float,
		note varchar(500),
		created_at datetime,
		updated_at datetime
	)";
	execute($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Init Database</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="text-align: center;">Init DataBase</h1>
	<h3 style="text-align: center;">
		<form method="post">
			<button name="action" value="init_database">Start Init DataBase</button>
		</form>
	</h3>
</body>
</html>