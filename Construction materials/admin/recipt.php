<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
th
{
font-size:24px;
color:#693;	
	
}
#selectrecipt
{
	margin-left:500px;
	margin-top:50px;
	width:10%;
	font-size:16px;
}
table
{
	background-color:#DEDEBE;
	margin-left:380px;
	margin-top:100px;
	font-size:24px;
	font-style:italic;
}
body
{
	background-color:#72E786;
}
div
{
	margin-left:370px;
	margin-top:-20px;
	color:#006;
	font-size:18px;
}
input
{
	color:#063;
	font-size:13px;
	width:5%;
}

</style>
<body>
<?php
$mob=$mobile="";
if(isset($_POST['sbshow']))
{
$mob=$_POST['cbmobile'];	
require("allDatabaseop.php");
$rs=mysqli_query($con,"select * from booking_tb where mobile='$mob'") or die(mysqli_connect_error);
echo "<table cellpadding='3' cellspacing='20' border='1'><tr><th>Name</th><th>Product</th><th>Amount(in Quintals)</th>
<th>Price</th></tr>";
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$product=$row[2];
	$amt=$row[3];
	$price=$row[4];
	
	echo"<tr><td>$name</td><td>$product</td><td>$amt</td><td>$price</td></tr>";
}

}


?>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<?php
require("allDatabaseop.php");
$rs=mysqli_query($con,"select mobile from booking_tb") or die(mysqli_connect_error);
echo"<select id='selectrecipt' name='cbmobile'><option>select</option>";
while($row=mysqli_fetch_array($rs))
{
	
	$mobile=$row[0];
echo"<option ";
if($mobile==$mob)
	echo "selected='selected' ";
echo " >$mobile</option>";
//echo"<option>$mobile</option>";
}
echo"</select>";

?>
<input type="submit" value="submit" name="sbshow"/>
<div>
Mobile Number
</div>
</form>
</body>
</html>