<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());	
	mysqli_query($con,'create database if not exists KaarigarDB') or die(mysqli_error($con));
	mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());


mysqli_query($con,"create table if not exists product_master_tb(image varchar(255),Name varchar(255),descp varchar(255),dimension varchar(255),price int,about varchar(255),process varchar(255),Types int,primary key(name))") or die(mysqli_error($con));



?>
</body>
</html>