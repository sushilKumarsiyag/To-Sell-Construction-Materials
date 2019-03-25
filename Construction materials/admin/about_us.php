<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
th
{
	background-color:#030;
	color:#FFF;
	font-weight:900;
	font-style:italic;
}
body
{
	background-color:#999;
	margin:0px;
	padding:0px;
}
#div
{
	//border:dotted;
	width:50%;
	float:left;
	height:30px;
	font-size:28px;
	color:#033;
	text-align:center;			
	background-color:#FFF;
}
#tableupdate
{
	margin-top:11px;
	//border:dotted;
	position:relative;
	margin-left:770px;
}
#div1
{
	width:50%;
	height:30px;
	margin-left:670px;
	font-size:28px;
	color:#033;
	text-align:center;			

	background-color:#FFF;
	//border:dotted;
}
#tableinsert
{
	margin-left:80px;
	margin-top:100px;
	
}
#divinsert
{
	float:left;
	width:50%;
	height:600px;
	background-color:#C93;
}
#divupdate
{
	margin-left:5px;
	background-color:#666;
	//width:40%;
	border:thick;
	height:600px;

}
#div0
{
	width:100%;
	background-color:#FFF;
	height:30px;
	font-size:28px;
	color:#033;
	text-align:center;			
	border:groove;
}
body
{
	padding-top:0px;
	font-size:20px;
	font-weight:700;
	background-color:#CCC;
}
#select
{
	margin-left:110px;
	margin-top:60px;
	//border:dashed;
	position:relative;
}
</style>
<body>
<div id="div0">
<marquee id="marquee">
About_us
</marquee>
</div>
<div id="div">

	Insert

</div>
<div id="div1">

	Update and delete

</div>
<div id="divinsert">
<?php

if(isset($_POST['sbinsert']))
{
$name=$_POST['txname'];
$qty=$_POST['txquality'];
$deg=$_POST['txdeg'];
$mobile=$_POST['txmob'];
$email=$_POST['txemail'];
$add=$_POST['txaddress'];
require("allDatabaseop.php");
mysqli_query($con,"create table if not exists about_us(Name varchar(50),Quality varchar(250),degree varchar(250),Mobile varchar(18),Email varchar(250),Address varchar(250))") or die(mysqli_connect_error());	

mysqli_query($con,"insert into about_us(Name,Quality,degree,Mobile,Email,Address) values('$name','$qty','$deg','$mobile','$email','$add')") or die(mysqli_connect_error());	



}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table id="tableinsert" border="1" cellpadding="1" cellspacing="9">
<tr>
	<th>
    	Name
    </th>
	<td>
    	<input type="text" name="txname"/>
    </td>
</tr>
<tr>
	<th>
    	Quality
    </th>
	<td>
    	<input type="text" name="txquality"/>
    </td>
</tr>
<tr>
	<th>
    	degree
    </th>
	<td>
    	<input type="text" name="txdeg"/>
    </td>
</tr>

<tr>
	<th>
    	Mobile Number
    </th>
	<td>
    	<input type="text" name="txmob"/>
    </td>
</tr>
<tr>
	<th>
    	E-mail
    </th>
	<td>
    	<input type="text" name="txemail"/>
    </td>
</tr>
<tr>
	<th>
    	Address
    </th>
	<td>
    	<textarea style="width:97%" name="txaddress"></textarea>
    </td>
</tr>
<tr>
	<td>
    	<input style="width:100%" type="submit" name="sbinsert" value="insert"/>
    </td>
</tr>
</table>
</form>
</div>
<div id="divupdate">

<?php
$nm=$nam=$add=$qty=$mobile=$email=$deg="";
if(isset($_POST['sbinsert']))
{
$name=$_POST['txname'];
$qty=$_POST['txquality'];
$deg=$_POST['txdeg'];
$mobile=$_POST['txmob'];
$email=$_POST['txemail'];
$add=$_POST['txaddress'];
require("allDatabaseop.php");
mysqli_query($con,"create table if not exists about_us(Name varchar(50),Quality varchar(250),degree varchar(250),Mobile int,Email varchar(250),Address varchar(250))") or die(mysqli_connect_error());	

mysqli_query($con,"insert into about_us(Name,Quality,degree,Mobile,Email,Address) values('$name','$qty','$deg',$mobile,'$email','$add')") or die(mysqli_connect_error());	



}

if(isset($_POST['sbshow']))
{
	$nm=$_POST['cbname'];
require("allDatabaseop.php");
$rs=mysqli_query($con,"select * from About_us where Name='$nm'") or die(mysqli_connect_error());	
while($row=mysqli_fetch_array($rs))
{
$nam=$row[0];	
$qty=$row[1];
$deg=$row[2];
$mobile=$row[3];
$email=$row[4];
$add=$row[5];
	
	
}
}

if(isset($_POST['sbupdate']))
{
	
$nm=$_POST['cbname'];
require("allDatabaseop.php");
$nam=$_POST['txname'];
$qty=$_POST['txquality'];
$deg=$_POST['txdeg'];
$mobile=$_POST['txmob'];
$email=$_POST['txemail'];
$add=$_POST['txaddress'];
mysqli_query($con,"update About_us set Name='$nam',Quality='$qty',degree='$deg',Mobile='$mobile',Email='$email',Address='$add' where Name='$nm'") or die(mysqli_connect_error());	
	
	
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<?php

require("allDatabaseop.php");

$rs=mysqli_query($con,"select Name from About_us") or die(mysqli_connect_error());
echo"<select id='select' name='cbname'><option>select</option>";
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	
	
echo"<option ";
if($name==$nm)
	echo "selected='selected' ";

echo ">$name</option>";	
}
echo"</select>";

?>
<input type="submit" name="sbshow" value="Show"/>
<table id="tableupdate" border="1" cellpadding="1" cellspacing="9">
<tr>
	<th>
    	Name
    </th>
	<td>
    	<input type="text" name="txname" value="<?php echo $nam; ?>"/>
    </td>
</tr>
<tr>
	<th>
    	Quality
    </th>
	<td>
    	<input type="text" name="txquality" value="<?php echo $qty; ?>"/>
    </td>
</tr>
<tr>
	<th>
    	degree
    </th>
	<td>
    	<input type="text" name="txdeg" value="<?php echo $deg; ?>"/>
    </td>
</tr>

<tr>
	<th>
    	Mobile Number
    </th>
	<td>
    	<input type="text" name="txmob" value="<?php echo $mobile; ?>"/>
    </td>
</tr>
<tr>
	<th>
    	E-mail
    </th>
	<td>
    	<input type="text" name="txemail" value="<?php echo $email; ?>"/>
    </td>
</tr>
<tr>
	<th>
    	Address
    </th>
	<td>
    	<textarea style="width:97%" name="txaddress"><?php echo $add; ?></textarea>
    </td>
</tr>
<tr>
	   <td>
    <input style="width:100%" type="submit" name="sbupdate" value="update"/>
    </td>
    <td>
    <input style="width:100%" type="submit" name="sbdelete" value="Delete"/>
    </td>
</td>
</tr>
</table>



</form>



</div>
</body>
</html>