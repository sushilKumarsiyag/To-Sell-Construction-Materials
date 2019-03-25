<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$point="";
$firstpoint="";
if(isset($_POST['sbinsert']))
{
$point=$_POST['txarea'];
require("alldatabaseop.php");
mysqli_query($con,"create table if not exists about_services(Points varchar(250))") or die(mysqli_connect_error());
mysqli_query($con,"insert into about_services(Points) values('$point')") or die(mysqli_connect_error());

}
if(isset($_POST['sbshow']))
{
	
require("alldatabaseop.php");
$firstpoint=$_POST['cbpoint'];

$rs=mysqli_query($con,"select Points from About_services where Points='$firstpoint'") or die(mysqli_connect_error);

while($row=mysqli_fetch_array($rs))
{

$point=$row[0];	
	
}

}

if(isset($_POST['sbupdate']))
{
	
require("alldatabaseop.php");
$firstpoint=$_POST['cbpoint'];
$points=$_POST['txarea'];
mysqli_query($con,"update About_services set Points='$points' where Points='$firstpoint'") or die(mysqli_connect_error());
	
}

if(isset($_POST['sbdelete']))
{
	
	
require("alldatabaseop.php");
$firstpoint=$_POST['cbpoint'];
	
mysqli_query($con,"delete from About_product where Points='$firstpoint'") or die(mysqli_connect_error());	
	
	
	
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<?php
require("alldatabaseop.php");
$rs=mysqli_query($con,"select Points from About_services") or die(mysqli_connect_error);
echo"points <select name='cbpoint'><option>select</option>";
while($row=mysqli_fetch_array($rs))
{

$first=$row[0];	

/*echo"<option ";
if($first==$firstpoint)
	echo "selected='selected' ";
echo " >$first</option>";
*/
	
echo"<option ";
if($first==$firstpoint)
	echo "selected='selected' ";

echo ">$first</option>";	
}
echo"</select>";
?>
<input type="submit" name="sbshow" value="show"/>
<table>
<tr>
	<th>
    	Points
	</th>
    <td>
    <textarea name="txarea"><?php echo $point; ?> </textarea>
    
    </td>
 </tr>
<tr>
	<td>
    	<input type="submit" name="sbinsert" value="submit"/></td>
    
       <td> <input type="submit" name="sbupdate" value="update"/> 
        <input type="submit" name="sbdelete" value="Delete"/>
         </td>
</tr>
 </table>
 </form>   
</body>
</html>