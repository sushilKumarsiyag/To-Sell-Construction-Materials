<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
th
{
	background-color:#000;
	color:#FFF;
	font-style:italic;
}
body
{
	background-color:#39F;
	font-size:18px;
	padding:0px;
	margin:0px;
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
table
{
	margin-left:400px;
	margin-top:150px;
}
#div1
{
	margin:100px;
	background-color:#CCC;
	font-size:24px;
	width:400px;	
}
a
{
	color:#000;
	font-size:18px;
}

</style>

</head>

<body>
<div id="div0">
<marquee id="marquee">
It's for Login
</marquee>
</div>

<?php
$user=$pass="";
if(isset($_POST['sbmit']))
{
	$user=$_POST['txname'];
	$pass=$_POST['txpass'];
	
	$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
	mysqli_query($con,'use CollegeDB') or die(mysqli_connect_error());
	
	$rs=mysqli_query($con,"select count(*) from user_tb where user='$user' and password='$pass'") or die(mysqli_connect_error);
	$c=0;
	while($row=mysqli_fetch_array($rs))
	{
		$c=$row[0];
	}
	
	if($c==1)
	{
		//echo"<div id='div1'>hello u have sucessfully Login</div>";
		
			
			
		echo "<script>window.location.assign('Advance_booking_pr.php');		
        </script>";		
		
	}
	else
	{
		echo"Sorry";
		
	}
	
	if($_POST['forget'])
	{
		$_SESSION['user']=$user;	
	}
	
}
?>
<form name="frm" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
<table border="1" cellpadding="3" cellspacing="10">
<tr>
	<th>
    	User Name
    </th>
    <td>
    	<input type="text" name="txname"/>
    </td>
</tr>
<tr>
	<th>
    	Password
    </th>
    <td>
    	<input type="text" name="txpass"/>
    </td>
</tr>
<tr>
	<td>
    	<input style="width:100%" type="submit" name="sbmit"/>
    </td>
    <td>
    	<input name="forget" style="width:100%" type="submit" onclick="frm.action='forgot.php'" value="forgot password"/> 
    </td>
</tr>
</table>
</form>
</body>
</html>