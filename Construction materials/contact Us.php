<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#table3
{
	margin-left:25%;
	margin-top:3%;
	float:left;
	//border:dotted;
	//width:30%;
	//background-color:#FFB;
	
}
#div1
{
	width:100%;
	height:770px;
	background-color:#09F;
}
#div3
{
	margin-top:20%;
}
</style>
</head>
<body>
<div id="div1">
<?php
require("headSection.php");
require("js/imageSlider1.php");

$name=$email=$mobile=$msg="";
if(isset($_POST['sbmit']))
{
	$name=$_POST['sbname'];
	$email=$_POST['sbmail'];
	$mobile=$_POST['sbmobile'];
	$msg=$_POST['sbmsg'];
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());	
	mysqli_query($con,'create database if not exists KaarigarDB') or die(mysqli_error($con));
	mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
	mysqli_query($con,"create table if not exists Contact_Us(name varchar(50),email varchar(50),mobile varchar(15),msg varchar(250))") or die(mysqli_connect_error());
	mysqli_query($con,"insert into Contact_Us(name,email,mobile,msg) values('$name','$email','$mobile','$msg')") or die(mysqli_connect_error());	
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table id="table3" border="1" cellpadding="3" cellspacing="5">
	<tr>
        <td colspan="2">
        <input placeholder="Name" type="text" name="sbname" />	
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        <input placeholder="Gmail" type="text" name="sbmail"/>
        </td>
        
    </tr>
    <tr>
    	<td colspan="2">
        <input placeholder="Mobile Number" type="text" name="sbmobile"/>
        </td>
        
    </tr>

    <tr>
        <td>
        	<textarea placeholder="Your Message" name="sbmsg" style="width:99%"></textarea>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        	<input type="submit" name="sbmit" value="Submit"/>
        </td>
    </tr>
</table>
</form>
<div id="div3">
<?php
require("footer.php");
?>
</div>
</div>
</body>
</html>