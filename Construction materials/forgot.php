<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#table0
{
	margin:100px;
}
#table1
{
	background-color:#999;
	margin:50px;
}
body
{
	background-color:#093;
	margin:0px;
	padding:0px;
}
th
{
	background-color:#000;
	font-size:24px;
	color:#FFF;
	font-style:italic;
}
	
input
{
	width:100%;
}
</style>



</head>
<body>
<?php 
	$user1=$_SESSION['user'];
	echo "welcome". $user1;
?>

<?php
$pass=$ans=$user="";
if(isset($_POST['sbmit']))
{
	$ques=$_POST['cbques'];
	$ans=$_POST['txans'];
	$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
	mysqli_query($con,'use CollegeDB') or die(mysqli_connect_error());
	$rs=mysqli_query($con,"select count(*) from user_tb where user='$user' and ques='$ques' and ans='$ans'") or die(mysqli_connect_error);
	$c=0;
	while($row=mysqli_fetch_array($rs))
	{
		$c=$row[0];
	}
	if($c==1)
	{
		echo '<form action="forgot.php" method="post">
<table border="2" cellspacing="10" id="table1">
	<tr>
    	<th>
        	New password
        </th>
        <td>
        	<input type="text" name="txpassword" />
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="sbchange" value="submit"/></td>
    </tr>
</table>';
	}
	else
	{
		echo"BY";
		
	}
	
}
if(isset($_POST['sbchange']))
{
$pass=$_POST['txpassword'];
$user=$_POST['txuser'];	
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_query($con,'use CollegeDB') or die(mysqli_connect_error());
mysqli_query($con,"update user_tb set password='$pass' where user='$user'") or die(mysqli_connect_error());	
		
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table border="2" cellpadding="2" cellspacing="15" id="table0">
	<tr>
    	<th>
        	User Name
        </th>
        <td>
        	<input type="text" name="txuser" value="<?php echo $user1; ?>"/>
        </td>
    </tr>
    <tr>
    	<th>
        	Question
        </th>
        <td>
        	<select style="width:100%" name="cbques">
            	<option >select</option>
                <option>yours nik name</option>
                <option>yours friend name</option>
                <option>yours DOB</option>
            </select>
        </td>
    </tr>
    <tr>
    	<th>
        	Ans
        </th>
        <td>
        	<input type="text" name="txans" value="<?php echo $ans ?>"/>
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="sbmit" value="check"/></td>
    </tr>
</table>
</form>
</body>
</html>