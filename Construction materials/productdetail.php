<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	img
	{
		width:200px;
		height:200px;
		margin-left:20px;
	}
	th
	{
		font-size:20px;
		color:#FFF;

	}
	body
	{
		background-color:#369;
	}
	#desepara
	{
		 font-size:16px; 
		 color:#FFF;
		 padding:10px;
		 //border:dotted;
		 width:40%;
		 margin-top:-5px;
		 margin-left:220px; 
		 //margin-left:50%;
	}
</style>
</head>

<body>
<?php
	$name=$_GET['name'];
	
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());
	
	mysqli_query($con,'use KaarigarDB') or die(mysqli_error());
	$rs=mysqli_query($con,"select about,process from product_master_tb where Name='$name'")  or die(mysqli_connect_error());
	while($row=mysqli_fetch_array($rs))
	{
		$about=$row[0];
		$process=$row[1];		
	}
	?>
<table>
	<tr>
    	<th colspan="3">
        <h1>About <?php echo $name; ?></h1>
        <?php
			echo $about;
		?>
        </th>
    </tr>
    <tr>
    	<th colspan="3">
        	<h1><?php echo $name; ?> Manufacturing Process</h1>

			<?php
				echo $process;
			?>
        </th>
    </tr>
    <tr>
    	<th colspan="3">
			<h1>Products</h1>        
        </th>
      </tr>
      
      <tr>
      	<?php
	$name=$_GET['name'];
	$tb=str_replace(" ","_",$name)."_tb";
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());
	mysqli_query($con,'use KaarigarDB') or die(mysqli_error());
	$rs=mysqli_query($con,"select * from ".$tb)  or die(mysqli_connect_error());
	while($row=mysqli_fetch_array($rs))
	{
		$image=$row[0];
		$Name=$row[1];
		$Type=$row[2];
		$dimension=$row[3];
		$strength=$row[4];
		echo "<td>
        	<img style='float:left' src='admin/$image'/>
        <p id='desepara'>
				$Name<br/><br/>
				Type:	$Type<br/><br/>
				Dimensions:	$dimension<br/><br/>
				Compressive Strength:	$strength</p></td>";
            
	}
		
		
      ?>
      </tr>
      
      
      <!--
      <tr>  
        <td>
        	<img   style="float:left" src="../../../Users/Sushil Siyag/Downloads/220px-Brick_wall_close-up_view.jpg"/>
            <p>
            	NON FACE PLASTER BRICKS (NFP)<br/><br/>
				Description :	Plaster Brick<br/><br/>
				Type:	Non Face Plaster Brick (NFP)<br/><br/>
				Dimensions:	222 x 106 x 72 (mm)<br/><br/>
				Compressive Strength:	>14MPa
            </p>
        </td>
        <td>
      	<img style="float:left" src="../../../Users/Sushil Siyag/Downloads/frontend-large.jpg"/>
        <p>
        	BAY CLINKER (FBA)<br/>
			Description:	Bay Clinker<br/><br/>
			Type:	Face brick Aesthetic (FBA)<br/><br/>
			Dimensions:	222 x 106 x 72 (mm)<br/>
			Compressive: Strength	>35MPa
        </p>
        </td>
		<td>
        	<img style="float:left" src="../../../Users/Sushil Siyag/Downloads/images (2).jpeg"/>
            <p>
            	RED CLINKER (FBA)<br/><br/>
				Description:	Red Clinker<br/><br/>
				Type:	Face brick Aesthetic (FBA)<br/><br/>
				Dimensions:	<br/>
				Compressive Strength:	>35MPa
            </p>
        </td>
    </tr>
    -->
</table>
</body>
</html>
