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
table
{
	margin-left:350px;
	margin-top:10px;
	width:47%;
}
#select
{
	
	margin-left:360px;
	width:10%;
	margin-top:100px;
}
th
{
	background-color:#333;
	color:#FFF;
	font-style:italic;
	font-weight:900;
	font-size:20px;
	width:40%;
}
td
{
	width:35%
}
textarea
{
	width:56%;
}
body
{
	background-color:#096;
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
body
{
	margin:0px;
	padding:0px;
}

</style>



<body>

<div id="div0">
<marquee id="marquee">
Product Insert,UPdate & Delete
</marquee>
</div>

<?php
$productName=$dese=$dimension=$price=$about=$process=$type=$desc=$image="";
if(isset($_POST['sbinsert']))
{
	$tmp_name=$_FILES['sbfile']['tmp_name'];
	if(!file_exists("images"))
		mkdir("images");
	
		$target_path="images/".$_FILES['sbfile']['name'];

		if(!file_exists($target_path))
		{
			if(move_uploaded_file($tmp_name,$target_path))
			{

	
	$productName=$_POST['txproductname'];
	$desc=$_POST['txdesc'];
	$dimension=$_POST['txdimension'];	
	$price=$_POST['txprice'];
	$about=$_POST['txabout'];
	$process=$_POST['txProcess'];
	$type=$_POST['txtype'];

require("alldatabaseop.php");
mysqli_query($con,"insert into product_master_tb(image,Name,descp,dimension,price,about,process,Types) values('$target_path','$productName','$desc','$dimension',$price,'$about','$process',$type)") or die(mysqli_error($con));

$tb=str_replace(" ","_",$productName)."_tb";
mysqli_query($con,"create table if not exists ".$tb."(image varchar(255),Name varchar(255),Type varchar(255),dimension varchar(255),strength varchar(255),primary key(Type))") or die(mysqli_error($con));
}
		}
	}



if(isset($_POST['sbshow']))
{
$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$prdname=$_POST['cbname'];
$rs=mysqli_query($con,"select * from product_master_tb where Name='$prdname'") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$image=$row[0];
	$productName=$row[1];
	$desc=$row[2];
	$dimension=$row[3];
	$price=$row[4];
	$about=$row[5];
	$process=$row[6];
	$type=$row[7];
	


}


}
if(isset($_POST['sbupdate']))
{
	
		if(!empty($_FILES['sbfile']))
	{
		$tmp_name=$_FILES['sbfile']['tmp_name'];
		if(!file_exists("images"))
			mkdir("images");
		
		$target_path="images/".$_FILES['sbfile']['name'];

		if(!file_exists($target_path))
		{
			move_uploaded_file($tmp_name,$target_path);
		}
	}

	
	
$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$image=$_POST['tximage'];
$prdname=$_POST['cbname'];
$productName=$_POST['txproductname'];
$desc=$_POST['txdesc'];
$dimension=$_POST['txdimension'];	
$price=$_POST['txprice'];
$about=$_POST['txabout'];
$process=$_POST['txProcess'];
$type=$_POST['txtype'];

mysqli_query($con,"update product_master_tb set     image='$image',Name='$productName',  descp='$desc',dimension='$dimension',price=$price,about='$about', process='$process',Types=$type where Name='$prdname'");

}
if(isset($_POST['sbdelete']))
{
$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$prdname=$_POST['cbname'];
mysqli_query($con,"delete from product_master_tb where Name='$prdname'");



}
//mysqli_close($con);


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());	

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select Name from product_master_tb") or die(mysqli_connect_error());
echo"<select id='select' name='cbname'><option>select</option>";

while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];

echo"<option ";
if($name==$productName)
	echo "selected='selected' ";

echo " >$name</option>";
}
echo"</select>";

?>
<input type="submit" value="show" name="sbshow" />

<table cellspacing="5" cellpadding="5">
	<tr>
    	<th>Product Image(for insert)</th>
        <td><input type="file" name="sbfile" /></td>
    </tr>
    <tr>
    	<th>
        	img src(for update)
        </th>
        <td><input onchange="changesrc()"  type="file" name="sbfile" id="idimg"/>
         <input style="width:55%" type="text" name="tximage" id="tximg"  value="<?php echo $image; ?>"/>
         </td>    
         </tr>
	<tr>
    
    	<th>
        	Product Name
        </th>
        <td>
      <input type="text" name="txproductname" value="<?php echo $productName; ?>"/>
        </td>
    </tr>
    <tr>
    	<th>
        	description
        </th>
        <td>
        	<input type="text" name="txdesc" value="<?php echo $desc; ?>"/>
        </td>
    </tr>
        <tr>
    	<th>
        	dimension
        </th>
        <td>
        	<input type="text" name="txdimension" value="<?php echo $dimension; ?>"/>
        </td>
    </tr>
	    <tr>
    	<th>
        	Price
        </th>
        <td>
        	<input type="text" name="txprice" value="<?php echo $price; ?>"/>
        </td>
    </tr>
	    <tr>
    	<th>
        	About
        </th>
        <td>
        	<textarea name="txabout"><?php echo $about; ?></textarea>
        </td>
    </tr>
	    <tr>
    	<th>
        	Process
        </th>
        <td>
        	<textarea name="txProcess"><?php echo $process; ?></textarea>
        </td>
    </tr>
	    <tr>
    	<th>
        	Number of type
        </th>
        <td>
        	<input type="text" name="txtype" value="<?php echo $type; ?>"/>
        </td>
    </tr>
	<tr>
    <td>
    	<input style="width:100%" type="submit" name="sbinsert"/>
    </td>
    <td>
    	<input style="width:30%" type="submit" name="sbupdate" value="update"/>
        <input style="width:30%" type="submit" name="sbdelete" value="delete"/>
    </td>
    </tr>
</table>
</form>
</body>
</html>