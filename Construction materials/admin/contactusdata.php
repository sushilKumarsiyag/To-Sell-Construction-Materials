<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table
{
	margin-left:150px;
	margin-top:0px;
	background-color:#660;
}
#select1
{
	margin-top:110px;
	margin-left:150px;
}

body
{
	background-color:#9F3;
}
</style>


</head>

<body>
<?php
$Gmail=$name=$mobile=$msg=$email="";
if(isset($_POST['sbmit']))
{
$Gmail=$_POST['cbemail'];
require("alldatabaseop.php");
$rs=mysqli_query($con,"select * from Contact_US where email='$Gmail'") or die(mysqli_connect_error());	
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$email=$row[1];
	$mobile=$row[2];
	$msg=$row[3];
}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"/>
<?php
require("alldatabaseop.php");
$rs=mysqli_query($con,"select email from  Contact_Us")  or die(mysqli_connect_error());
echo"<select id='select1' name='cbemail'><option>select</option>";

while($row=mysqli_fetch_array($rs))
{
	$email=$row[0];
	
echo"<option ";
if($email==$Gmail)
	echo "selected='selected' ";
echo " >$email</option>";
}
echo"</select>";
?>
<input style="margin-left:0px" type="submit" value="show" name="sbmit" /><table id="table0" border="1" cellpadding="3" cellspacing="5">
	<tr>
        <td colspan="2">
        <input placeholder="Name" type="text" value="<?php echo $name; ?>" name="sbname" />	
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        <input placeholder="Gmail" type="text" value="<?php echo $Gmail; ?>" name="sbmail"/>
        </td>
        
    </tr>
    <tr>
    	<td colspan="2">
        <input placeholder="Mobile Number" value="<?php echo $mobile; ?>" type="text" name="sbmobile"/>
        </td>
        
    </tr>

    <tr>
        <td>
       <textarea placeholder="Your Message" name="sbmsg" style="width:99%"><?php echo $msg;?></textarea>
        </td>
    </tr>
</table>
</form>
</body>
</html>