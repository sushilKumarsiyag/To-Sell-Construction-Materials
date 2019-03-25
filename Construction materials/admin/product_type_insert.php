<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

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
	document.getElementById('tximg').value="image/"+src;
}
</script>



<style>
th
{
	
	background-color:#663;
	color:#CCC;
	font-style:italic;
	font-size:18px;
	font-weight:800;
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
#tableinsert
{
	margin-left:200px;
	margin-top:-10px;
}

#selectinsert
{
	margin-left:340px;
	margin-top:210px;
	width:20%;
	
}
p
{
	margin-left:220px;
	margin-top:-12px;
	color:#903;
	position:relative;
}

#div1
{
	width:50%;
	height:30px;
	margin-left:672px;
	font-size:28px;
	color:#033;
	text-align:center;			

	background-color:#FFF;
	//border:dotted;
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
#tableupdate
{
	margin-top:2px;
	position:relative;
	width:35%;
	margin-left:660px;
	
}

#tableupdate input
{
	width:100%;
}

body
{
	background-color:#063;
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	padding:0px;
	margin:0px;
}
#divupdate
{
	margin-left:5px;
	background-color:#666;
	//width:40%;
	border:thick;
	height:600px;

}
#divinsert
{
	float:left;
	width:50%;
	height:600px;
	background-color:#C93;
}

#selectshow
{
	margin-left:8px;
	width:18%;
	margin-top:170px;
}
#selectupdate
{
	margin-left:30px;
	width:18.1%;
	margin-top:2px;
}


</style>
<body>

<div id="div0">
<marquee id="marquee">
For Product_type
</marquee>
</div>

<div id="div">

	Insert

</div>
<div id="div1">

	Update and delete

</div>

<div id="divinsert">
<?php
$name=$typename=$desc=$dimension=$strength=$prdname="";

if(isset($_POST['sbinsert']))
{
	$tmp_name=$_FILES['sbfile']['tmp_name'];
	if(!file_exists("image"))
		mkdir("image");
		
		$target_path="image/".$_FILES['sbfile']['name'];

		if(!file_exists($target_path))
		{
			if(move_uploaded_file($tmp_name,$target_path))
			{


$prdname=$_POST['cbprdname'];	
$typename=$_POST['txtype'];
$strength=$_POST['txstrength'];
$dimension=$_POST['txdimension'];	

require("alldatabaseop.php");
$tb=str_replace(" ","_",$prdname)."_tb";
mysqli_query($con,"insert into ".$tb."(image,Name,Type,dimension,strength) values('$target_path','$prdname','$typename','$dimension','$strength')") or die(mysqli_error($con));

}
}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select Name from  product_master_tb")  or die(mysqli_connect_error());

echo"<select id='selectinsert' name='cbprdname'><option>select</option>";

while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	
echo"<option ";
if($name==$prdname)
	echo "selected='selected' ";
echo " >$name</option>";
}
echo"</select>";
?>
<p>Product Name</p>

<table id="tableinsert" cellpadding="5" cellspacing="10">

	<tr>
    	<th>Product Image</th>
        <td><input type="file" name="sbfile"/></td>
    </tr>
    
	<tr>
    	<th>
        	Type Name
        </th>
        <td>
        	<input type="text" name="txtype" value="<?php echo $typename; ?>"/>
        </td>
    </tr>
     <tr>
    	<th>
        	Dimension
        </th>
        <td>
        	<input type="text" name="txdimension" value="<?php echo $dimension; ?>"/>
        </td>
    </tr>
    <tr>
    	<th>
        	Strength
        </th>
        <td>
        	<input type="text" name="txstrength" value="<?php echo $strength; ?>"/>
        </td>
    </tr>
<tr>
	<td>
    	<input style="width:100%" type="submit" value="submit" name="sbinsert"/>
      </td>
</tr>
</table>
</form>
</div>
<div id="divupdate">

<?php  

$image=$dimension=$strength=$prdname=$TypeName="";

if(isset($_POST['cbprdname']))
$prdname=$_POST['cbprdname'];

if(isset($_POST['sbshow']))
$TypeName=$_POST['cbtypename'];

if(isset($_POST['sbshow']))
{
	
require("alldatabaseop.php");
$prdname=$_POST['cbprdname'];
$tb=str_replace(" ","_",$prdname)."_tb";

$TypeName=$_POST['cbtypename'];

$rs=mysqli_query($con,"select * from ".$tb." where Type='$TypeName'") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$image=$row[0];
$dimension=$row[3];	
$strength=$row[4];
	
}
}

if(isset($_POST['sbupdate']))
{
	if(!empty($_FILES['sbfile']))
	{
		$tmp_name=$_FILES['sbfile']['tmp_name'];
		if(!file_exists("image"))
			mkdir("image");
		
		$target_path="image/".$_FILES['sbfile']['name'];

		if(!file_exists($target_path))
		{
			move_uploaded_file($tmp_name,$target_path);
		}
	}
	
require("alldatabaseop.php");
$cbTypeName=$_POST['cbtypename'];
$TypeName=$_POST['txtype'];
$image=$_POST['tximage'];

$prdname=$_POST['cbprdname'];	
$strength=$_POST['txstrength'];
$dimension=$_POST['txdimension'];
	
$tb=str_replace(" ","_",$prdname)."_tb";

mysqli_query($con,"update ".$tb." set image='$image',
Type='$TypeName',dimension='$dimension',strength='$strength' where Type='$cbTypeName'") or die(mysqli_error($con));

//echo "completed..";
}

if(isset($_POST['sbdelete']))
{

require("alldatabaseop.php");
$cbTypeName=$_POST['cbtypename'];
$prdname=$_POST['cbprdname'];	
$tb=str_replace(" ","_",$prdname)."_tb";

mysqli_query($con,"delete from ".$tb." where Type='$cbTypeName'");




}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"/>
<?php
require("alldatabaseop.php");
$rs=mysqli_query($con,"select Name from  product_master_tb")  or die(mysqli_connect_error());

echo"Product Name<select id='selectshow' name='cbprdname'><option>select</option>";

while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	
echo"<option ";
if($name==$prdname)
	echo "selected='selected' ";
echo " >$name</option>";
}
echo"</select>";
?>

<input type="submit" value="show Types" name="sbshowType" /><br />

<?php
echo"TypeName <select id='selectupdate' name='cbtypename'><option>select</option>";

if(isset($_POST['cbprdname']))
{
require("alldatabaseop.php");
$prdname=$_POST['cbprdname'];
$tb=str_replace(" ","_",$prdname)."_tb";
$rs=mysqli_query($con,"select type from ".$tb) or die(mysqli_connect_error());

while($row=mysqli_fetch_array($rs))
{
$type=$row[0];
echo"<option ";
if($type==$TypeName)
	echo "selected='selected' ";

echo " >$type</option>";
}

echo"</select>";

}

?>
<input style="margin-left:7.5px; width:6.4%" type="submit" name="sbshow" value="show"/>

<table id="tableupdate" cellspacing="10px" cellpadding="3px" border="1">
	<tr>
    	<th>
        	Select Image
        </th>
        <td><input onchange="changesrc()"  type="file" name="sbfile" id="idimg"/>

</td>
</tr>
<tr>
		<th>
        	Img Src
        </th>
        <td>
         <input type="text" name="tximage" id="tximg"  value="<?php echo $image; ?>"/></td>
        </tr>
    <tr>
    	<th>
        	Type Name
        </th>
        <td>
        	<input type="text" name="txtype" value="<?php echo $TypeName; ?>"/>
        </td>
    </tr>
     <tr>
    	<th>
        	Dimension
        </th>
        <td>
        	<input type="text" name="txdimension" value="<?php echo $dimension; ?>"/>
        </td>
    </tr>
    <tr>
    	<th>
        	Strength
        </th>
        <td>
        	<input type="text" name="txstrength" value="<?php echo $strength; ?>"/>
        </td>
    </tr>
<tr>
	<td>
    	<input style="width:100%" type="submit" value="update" name="sbupdate"/>
        </td>
        <td>
        <input style="width:100%" type="submit" value="delete" name="sbdelete"/>
    </td>
</tr>
</table>
</form>



</div>
</body>
</html>