<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
body
{
	font-size:18px;
	padding:0px;
	margin:0px;
	background-color:#9C6;
}
#table1
{
	//border:dotted;
	margin-top:5px;
	margin-left:90px;
}
#select
{
	margin-left:90px;
	margin-top:200px;
	
}
th
{
	background-color:#030;
	color:#FFF;
	width:33%;
	font-weight:900;
	font-style:italic;
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

#divpro
{
	float:left;
	width:50%;
	height:600px;
	background-color:#C93;
}

#divser
{
	margin-left:5px;
	background-color:#666;
	//width:40%;
	border:thick;
	height:600px;

}
#selectser
{
	margin-left:110px;
	margin-top:190px;
	
}
#tableser
{
	margin-top:5px;
	//border:dotted;
	position:relative;
	margin-left:770px;

}
</style>
<body>

<div id="div0">
<marquee id="marquee">
About_Product & About_services
</marquee>
</div>
<div id="div">
About_Product
</div>
<div id="div1">
About_services
</div>


<div id="divpro">
<?php
$point="";
$firstpoint="";


if(isset($_POST['sbinsert']))
{
$point=$_POST['txarea'];
require("alldatabaseop.php");
mysqli_query($con,"create table if not exists about_product(Points varchar(250))") or die(mysqli_connect_error());
mysqli_query($con,"insert into about_product(Points) values('$point')") or die(mysqli_connect_error());
}

if(isset($_POST['sbshow']))
{
	
require("alldatabaseop.php");
$firstpoint=$_POST['cbpoint'];

$rs=mysqli_query($con,"select Points from About_product where Points='$firstpoint'") or die(mysqli_connect_error);

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
mysqli_query($con,"update About_product set Points='$points' where Points='$firstpoint'") or die(mysqli_connect_error());
	
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
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select Points from About_product") or die(mysqli_connect_error);
echo"<select id='select' name='cbpoint'><option>select</option>";
while($row=mysqli_fetch_array($rs))
{

$first=$row[0];	
	
echo"<option ";
if($first==$firstpoint)
	echo "selected='selected' ";

echo ">$first</option>";	
}
echo"</select>";
?>
<input type="submit" name="sbshow" value="show"/>
<table id="table1">
<tr>
	<th>
    	Points
	</th>
    <td>
    <textarea name="txarea"><?php echo $point; ?></textarea>
    
    </td>
 </tr>
<tr>
	<td>
    	<input style="width:100%" type="submit" name="sbinsert" value="submit"/>
    </td>
    <td>
    	<input style="width:49%" type="submit" name="sbupdate" value="update"/>
        <input style="width:48%" type="submit" name="sbdelete" value="Delete"/>
    </td>
</tr>
 </table>
 </form>
 </div>
 
 <div id="divser">
 
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
echo"<select id='selectser' name='cbpoint'><option>select</option>";
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
<table id="tableser">
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
    	<input style="width:100%" type="submit" name="sbinsert" value="submit"/></td>
    
       <td> <input style="width:48%" type="submit" name="sbupdate" value="update"/> 
        <input style="width:48%" type="submit" name="sbdelete" value="Delete"/>
         </td>
</tr>
 </table>
 </form>   

 
 </div>
    
</body>
</html>