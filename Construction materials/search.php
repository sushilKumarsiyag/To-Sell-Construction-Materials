<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<?php
if(isset($_POST['submit']))
{
		$var=$_POST['txsearch'];
			$nm="";
					if($var=='Bricks')
					{
						$nm="Bricks";
					}
					else if($var=='Gravels')
					{
						$nm="Gravels";
					}
					else if(($var=='Tiles')||($var=='tiles')||($var=='tile'))
					{
						$nm="Tiles";
					}
					else if(($var=='Sand')||($var=='sand'))
					{
						$nm="Sand";
					}
					else if(($var=='Cement')||($var=='cement'))
					{
						$nm="Cement";
					}
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_query($con,'use KaarigarDB') or die(mysqli_error());
$rs=mysqli_query($con,"select * from product_master_tb where Name='$nm'") or die(mysqli_connect_error());
echo "<script>window.location.assign('productdetail.php?name=$nm');</script>";		

}
?>


</body>
</html>