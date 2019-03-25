<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="application/javascript">
function changesrc()
{
	//alert(document.getElementById('idimg').value);
	var imgsrc=document.getElementById('idimg').value;
var img=String(imgsrc);
for(i=0;i<img.length;i++)
	img=img.replace("\\","/");
//alert(img);
for(i=0;i<img.length;i++)
	if(img.indexOf("/",i) != -1)
		pos=img.indexOf("/",i);
//alert(pos);
src=img.substr(pos+1);
//alert(src);
	document.getElementById('tximg').value="imageslid/"+src;
}
</script>
<style>
body
{
	background-color:#AAF0B7;
}
#select1
{
	width:10%;
}
</style>

</head>

<body>

<?php
$sno=$image=$serial="";
if(isset($_POST['sbmit']))
{
	$tmp_name=$_FILES['sbfile']['tmp_name'];
	if(!file_exists("imageslid"))
		mkdir("imageslid");
	
		$target_path="imageslid/".$_FILES['sbfile']['name'];
		if(!file_exists($target_path))
		{
			if(move_uploaded_file($tmp_name,$target_path))
			{
				$sno=$_POST['txnum'];
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());	
	mysqli_query($con,'create database if not exists KaarigarDB') or die(mysqli_error($con));
	mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
	
	mysqli_query($con,"create table if not exists imageslider_tb(sno varchar(100),image varchar(100))") or die(mysqli_error($con));
	
		mysqli_query($con,"insert into imageslider_tb(sno,image) values('$sno','$target_path')") or die(mysqli_error($con));
			}
		}
}

if(isset($_POST['sbshow']))
{
	require("allDatabaseop.php");
	$serial=$_POST['cbsno'];
	$rs=mysqli_query($con,"select * from imageslider_tb where sno='$serial'") or die(mysqli_connect_error());	
while($row=mysqli_fetch_array($rs))
{
	$image=$row[1];	
	
}
	
}
if(isset($_POST['sbupdate']))
{
	$tmp_name=$_FILES['sbfile']['tmp_name'];
	if(!file_exists("imageslid"))
		mkdir("imageslid");
	
		$target_path="imageslid/".$_FILES['sbfile']['name'];
		if(!file_exists($target_path))
		{
			if(move_uploaded_file($tmp_name,$target_path))
			{
			}
		}
		$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$image=$_POST['tximage'];
$sno=$_POST['cbsno'];
mysqli_query($con,"update imageslider_tb set image='$image' where sno='$sno'") or die(mysqli_connect_error());
}

if(isset($_POST['sbdelete']))
{
	
	
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$serial=$_POST['cbsno'];
mysqli_query($con,"delete from imageslider_tb where sno='$serial'");


}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<?php	
require("allDatabaseop.php");

$rs=mysqli_query($con,"select sno from  imageslider_tb") or die(mysqli_connect_error());
echo"Serial Number<select id='select1' name='cbsno'><option>select</option>";
while($row=mysqli_fetch_array($rs))
{
	$serialNo=$row[0];
echo"<option ";
if($serialNo==$serial)
	echo "selected='selected' ";

echo ">$serialNo</option>";	
}
echo"</select>";

?>

<input type="submit" value="show" name="sbshow"/>

<table border="2" cellpadding="2" cellspacing="10">
<tr>
<th>
	Img(for update)
</th>
<td>
	<input type="file"  onchange="changesrc()" name="sbfile"  id="idimg"/>
    </td>
    </tr>
    <tr>
    <td>
   <input type="text" name="tximage" id="tximg" value="<?php echo $image; ?>"/>
</td>
</tr>

<tr> 
<td>
	<input style="width:100%" type="submit" value="update" name="sbupdate"/>
</td>

</tr>
</table>
</form>
</body>
</html>