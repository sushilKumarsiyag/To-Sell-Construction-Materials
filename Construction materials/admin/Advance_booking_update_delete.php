<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script>
	function cal()
	{
		var price;
		var i=document.getElementById('products').selectedIndex;
		switch(i)
		{
			case 1: price=100; break;
			case 2 : price=200; break;
			case 3:price=350; break;
			case 4:price=250; break;
			case 5:price=500; break;
		}
		
			var amt=parseInt(document.getElementById('idamt').value);
			var total=(price*amt);
			document.getElementById('idprice').value=total;
			
	}
</script>

<style>
th
{
	
	background-color:#000;
	color:#CCC;
	font-style:italic;
	font-size:18px;
	font-weight:800;
}
table input
{
	width:100%;
}
table
{
	margin-left:300px;
	margin-top:2px;
	background-color:#999;
}
body
{
	background-color:#060;
}

#select
{
	margin-left:430px;
	margin-top:180px;
}

div
{
	margin-left:300px;
	margin-top:-19px;
	color:#CCC;
	font-size:18px;
}
</style>


<body>
<?php
$name=$mob=$mobilenum=$product=$amt=$price="";
if(isset($_POST['sbupdate']))
$mobile=$_POST['txmob'];

if(isset($_POST['sbshow']))
{
$mob=$_POST['cbmobile'];
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from booking_tb where mobile='$mob'") or die(mysqli_connect_error);
while($row=mysqli_fetch_array($rs))
{
$name=$row[0];
$mobilenum=$row[1];
$product=$row[2];
$amt=$row[3];
$price=$row[4];

}

}
if(isset($_POST['sbupdate']))
{
	$name=$_POST['txname'];
	//$price=$_POST['txprice'];
	$product=$_POST['txprd'];
	$amt=$_POST['txamt'];
	$mob=$_POST['cbmobile'];
	$mobile=$_POST['txmob'];
	$price=$_POST['txprice'];
	$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
mysqli_query($con,"update booking_tb set name='$name',mobile='$mobile',product='$product',amount=$amt,price='$price' where mobile='$mob'") or die(mysqli_connect_error);
	
	
	
}

if(isset($_POST['sbdelete']))
{
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
	$mob=$_POST['cbmobile'];

mysqli_query($con,"delete from booking_tb where mobile='$mob'");	
	
	
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select mobile from booking_tb") or die(mysqli_connect_error);

echo"<select id='select' name='cbmobile'><option>select</option>";
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
<input type="submit" value="show" name="sbshow"/>
<div>
Mobile Number
</div>
<table border="1" cellpadding="3" cellspacing="20">
<tr>
	<th>
 		Name   
    </th>
    <td>
    	<input type="text" name="txname" value="<?php echo $name; ?>"/>
    </td>
</tr>
<tr>
	<th>
 		Mobile   
    </th>
    <td>
    	<input type="text" name="txmob" value="<?php echo $mobilenum; ?>"/>
    </td>
    
</tr>
<tr>
	<th>
        	Products
        </th>
        <td>
        	<select name="txprd" id="products">
            <option>select</option>
            <option>Bricks</option>
            <option>Cements</option>
            <option>Gravels</option>
            <option>Sand</option>
            <option>Tiles</option>
            </select>
            <input style="width:66%" type="text" name="txproduct" value="<?php echo $product ?>"/>
        </td>    	
</tr>
<tr>
	<th>
 		Amount(in quintals)  
    </th>
    <td>
    	<input  id="idamt" type="text" name="txamt"  value="<?php echo $amt; ?>"/>
    </td>
</tr>

<tr>
	<th>
 	   price
    </th>
    <td>
   <input type="text" id="idprice" name="txprice" value="<?php echo $price; ?>"/>
    </td>
</tr>
<tr>
	<td>
    	<input style="width:100%" onclick="cal()" type="submit" name="sbupdate" value="update"/>
    </td>
    <td>
    	<input style="width:100%" type="submit" name="sbdelete" value="delete"/>
    </td>
</tr>
</table>
</form>
</body>
</html>