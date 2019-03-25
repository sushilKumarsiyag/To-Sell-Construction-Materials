<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=1;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image=$row[1];
					
					}
	
?>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=2;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image1=$row[1];
					
					}
	
?>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=3;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image2=$row[1];
					
					}
	
?>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=4;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image3=$row[1];
					
					}
	
?>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=5;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image4=$row[1];
					
					}
	
?>

var images=new Array(5);
images[0]="<?php echo"admin/$image";?>";
images[1]="<?php echo"admin/$image1";?>";
images[2]="<?php echo"admin/$image2";?>";
images[3]="<?php echo"admin/$image3";?>";
images[4]="<?php echo"admin/$image4";?>";
var i=0;
var k=1;

function init()
{
	window.setInterval("change()",3000);
	
}
function change()
{
	document.getElementById('imgslide').style.transition="all 5s";
	document.getElementById('imgslide').src=images[i];
	
	i++;
	if(i==images.length)
		i=0;
}
</script>
</head>

<body>

</body>
</html>