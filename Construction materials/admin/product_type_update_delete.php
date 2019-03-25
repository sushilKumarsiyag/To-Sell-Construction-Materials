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
	document.getElementById('tximg').value="image/"+src;
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
</style>
</head>
<body>

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

echo"Product Name <select name='cbprdname'><option>select</option>";

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
echo"TypeName <select name='cbtypename'><option>select</option>";

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
<input type="submit" name="sbshow" value="show"/>

<table>
	<tr>
    	<th>
        	img src
        </th>
        <td><input onchange="changesrc()"  type="file" name="sbfile" id="idimg"/>
         <input style="width:40%" type="text" name="tximage" id="tximg"  value="<?php echo $image; ?>"/></td>
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
    	<input type="submit" value="update" name="sbupdate"/>
        <input type="submit" value="delete" name="sbdelete"/>
    </td>
</tr>
</table>
</form>
</body>
</html>
</body>
</html>