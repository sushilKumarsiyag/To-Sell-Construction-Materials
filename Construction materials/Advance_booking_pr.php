<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
body
{
	padding:0px;
	margin:0px;
	background-color:#063;
}
#tableadvance
{
	margin-left:20%;
	width:50%;
	margin-top:3%;
}
#divfooter
{
	border:none;
	margin-top:2%;
}
#tableadvance th
{
	
	background-color:#000;
	color:#CCC;
	font-style:italic;
	font-size:16px;
	font-weight:800;
}
#tableadvance input
{
	width:100%;
}

#div1
{
	width:100%;
	background-color:#06C;
	height:800px;
	color:#033;
}
#div2
{
	width:100%;
	height:850px;
	//margin-left:30px;
	//margin-top:-5px;
	background-color:#069;
}


</style>


<script>
	function cal()
	{
		var price;
		var i=document.getElementById('products').selectedIndex;
		switch(i)
		{
			case 1: price=100; break;
			case 2: price=200; break;
			case 3:price=350; break;
			case 4:price=250; break;
			case 5:price=500; break;
		}
		
			var amt=parseInt(document.getElementById('idamt').value);
			var total=(price*amt);
			document.getElementById('idprice').value=total;
			
	}
</script>



<body>
<div id="div1">
<?php
require("headSection.php");
?>
<?php
require("js/imageSlider1.php");
?>

<?php
$name=$mob=$product=$amt=$price="";
if(isset($_POST['sbmit']))
{
	$name=$_POST['txname'];
	$mobile=$_POST['txmob'];
	$price=$_POST['txprice'];
	$product=$_POST['txprd'];
	$amt=$_POST['txamt'];
	//echo $product;
require("admin/alldatabaseop.php");
mysqli_query($con,"create table if not exists booking_tb(name varchar(50),mobile varchar(15),product varchar(100),amount int,price int)") or die(mysqli_error($con));

mysqli_query($con,"insert into booking_tb(name,mobile,product,amount,price) values('$name','$mobile','$product',$amt,$price)") or die(mysqli_error($con));

mysqli_close($con);
}
?>
<form name="frm" method="post"/>
<table id="tableadvance" border="1" cellpadding="5" cellspacing="20">
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
    	    Mobile Number
    	</th>
    	<td>
        	<input type="number" name="txmob" value="<?php echo $mobile; ?>"/>
        </td>
	</tr>
    <tr>
    	<th>
        	Products
        </th>
        <td>
        	<select name="txprd" id="products" style="width:100%">
            <option>select</option>
            <option>Bricks</option>
            <option>Cements</option>
            <option>Gravels</option>
            <option>Sand</option>
            <option>Tiles</option>
            </select>
        </td>    	
    </tr>	
    <tr>
    	<th>
        	Amount(in Quintals)
        </th>
        <td>
            
       	<input type="text" name="txamt" id="idamt"  value="<?php echo $amt; ?>"/>
        </td>	
    </tr>
    <tr>
    	<th>
        	Price
        </th>
        <td>
       <input id="idprice" readonly="readonly" name="txprice" type="text" value="<?php echo $price; ?>"/>
        </td>	
    </tr>

    <tr>
    	<td>
        	<input style="width:100%" onclick="cal()" type="submit" name="sbmit" value="Submit"/>
        </td>
        <td>
        	<input style="width:49%" onclick="frm.action='admin/recipt.php'" type="submit" value="Recipt" name="sbrecipt"/>
            <input style="width:49%" onclick="frm.action='admin/Advance_booking_update_delete.php'" type="submit" value="Edit"/>
        </td>
    </tr>
</table>
</form>
<div id="divfooter">
<?php
require("footer.php");
?>
</div>
</div>
</body>
</html>