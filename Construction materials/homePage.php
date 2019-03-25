<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Karigar samman</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<!--<link href="css/slider.css" rel="stylesheet" type="text/css"/>-->
<link href="css/project div.css" rel="stylesheet" type="text/css" />
<!--<link href="css/social.css" rel="stylesheet" type="text/css"/>
 
<!--<script type="application/javascript" src="js/ImageSlider.js">
</script>-->
</head>


<body onload="init()">


<div id="outer">


<?php
require("headSection.php");
?>
<form action="search.php" method="post">
<table id="search" border="1">
<tr>
	<td>
    <input style="width:150px" type="text" name="txsearch"/>
    </td>
   <td>
       <input type="submit" name="submit" value="search"/> 
    </td>
</tr>
</table>
</form>
<?php
require("js/imageSlider1.php");
?>
<div id="prodiv">
<p id="ourpro">
	Our Product Details
</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table border="1" id="table0">
	<tr>
    	<th colspan="4">
        	Our products
        </th>
     </tr>
        <tr>

            
          	<!--<input type="submit" class="proimg"  style="background-image:
               url(pictures/Camera%20Roll/brick-types.jpg); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbbricks" />
            </td>-->
            <td>
          	<img class="imgpro" src="pictures/Camera Roll/brick-types.jpg" alt="Image"/><br />
           <input type="submit" class="proimg" value="Click" name="sbbricks" /></td>
                <td>
                <img class="imgpro" src="pictures/Camera Roll/images.jpeg" alt="Image"/><br />
           <input type="submit" class="proimg" value="Click" name="sbsand" />
            </td>
            <td>
  				<img class="imgpro" src="pictures/Camera%20Roll/ceramic-digital-wall-tiles-1729270.jpg" alt="Image"/><br />
            <input type="submit" class="proimg" value="Click" name="sbtile" />          	
            </td>
           </tr>
           <tr>          
          	<!--<input type="submit" class="proimg"  style="background-image:
               url(pictures/Camera%20Roll/brick-types.jpg); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbbricks" />
            </td>-->
            <td>
            	<img class="imgpro" src="pictures/Camera%20Roll/tiles.jpg" alt="Image"/><br />
         <input type="submit" class="proimg" value="Click" name="sbtile" /></td>
              <td>
                <img class="imgpro" src="pictures/Camera%20Roll/bangur-cement.png" alt="Image"/><br />
            <input type="submit" class="proimg" value="Click" name="sbcement" />
            </td>
            <td>
  				<img class="imgpro" src="pictures/Camera Roll/grit.jpg" alt="Image"/><br />
           <input type="submit" class="proimg" value="Click" name="sbgravel" />          	
            </td>
           </tr>
           </table>
            <!--<td>
            	<input type="submit" class="proimg" style="background-image:url(pictures/Camera%20Roll/ceramic-digital-wall-tiles-1729270.jpg); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbtile"/>
            </td>
        </tr>
   <tr>
        	<td>
            	<input type="submit" class="proimg" style="background-image:url(pictures/Camera%20Roll/tiles.jpg); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbtile"/>
            </td>
            <td>
            	<input type="submit"class="proimg" style="background-image:url(pictures/Camera%20Roll/images.jpeg); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbsand"/>
            </td>
            <td>
            <input type="submit" class="proimg" style="background-image:url(pictures/Camera%20Roll/bangur-cement.png); background-repeat:no-repeat; background-size:100% 100%" value="" name="sbcement"/>
            </td>
        </tr>-->
    
<table id="table2">
	<tr>
    	<td rowspan="3">
        <?php
		
				$nm="";
				if(isset($_POST['sbbricks']))
					$nm="Bricks";
				else
					if(isset($_POST['sbgravel']))
						$nm="Gravels";
				else
					if(isset($_POST['sbtile']))
						$nm="Tiles";
				else
					if(isset($_POST['sbtile']))
						$nm="Tiles";
				else
					if(isset($_POST['sbsand']))
						$nm="Sand";
				else
					if(isset($_POST['sbcement']))
						$nm="Cement";

					
			$con=mysqli_connect("localhost","root","") or die(mysqli_error());
			mysqli_query($con,'use KaarigarDB') or die(mysqli_error());
			$rs=mysqli_query($con,"select image from product_master_tb where Name='$nm'")  or die(mysqli_connect_error());
//echo $nm;
					while($row=mysqli_fetch_array($rs))
					{
	  		    	$image=$row[0];
						//echo $image;
					echo"<img id='img2' src='admin/$image'/>";
					}
        ?>
        </td>
        <td>
       	<p id="dese">
     		<?php
				
		$con=mysqli_connect("localhost","root","") or die(mysqli_error());
	
					mysqli_query($con,'use KaarigarDB') or die(mysqli_error());
					$rs=mysqli_query($con,"select * from product_master_tb where Name='$nm'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{				
						$name=$row[1];
						$desc=$row[2];
						$dimension=$row[3];
						$price=$row[4];
				echo "<ol>";
				echo "<li>Name : $name</li>";
				echo "<li>Description: $desc</li>";
				echo "<li>Dimension: $dimension</li>";
				echo "<li>Price:$price</li>";
				echo"<li><a id='view' href='productdetail.php?name=$nm'>view more</a></li>";
				echo "</ol>";		
					
					}
				?>
                    	
            </p>
        </td>
    </tr>
    </table>

</form>

<div id="aboutDese">
<p id="aboutwork">
Description of About
</p>
</div>
<table id="abouttable">
	<tr>
    	<td id="tdabout1">
        	<h2 id="h">About Us</h2>
        	<ol class="aboutdese" style="list-style:disc">
            	<li>
                <?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select * from about_us") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$qty=$row[1];
	$deg=$row[2];
	$add=$row[5];
	echo"$name";
	
}
                ?>
                </li>
                <li><?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select * from about_us") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$qty=$row[1];
	$deg=$row[2];
	$add=$row[5];
	echo"$qty";
	
}
                ?></li>
				<li><?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select * from about_us") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$qty=$row[1];
	$deg=$row[2];
	$add=$row[5];
	echo"$deg";
	
}
                ?></li>
                <li><?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select * from about_us") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$name=$row[0];
	$qty=$row[1];
	$deg=$row[2];
	$add=$row[5];
	echo"$add";
	
}
                ?></li>
  </ol>
  
        </td>
        <td id="tdabout2">
        	<h2 id="h">About Products</h2>
        	<ol class="aboutdese" style="list-style:disc">
            	
                 <?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select Points from about_product") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$first=$row[0];
  	echo"<li>$first</li>";              
}

?>
                
            </ol>
        </td>
		<td id="tdabout3">
        	<h2 id="h">About Services</h2>
        	<ol class="aboutdese" style="list-style:disc">
            	
        		 <?php
                $con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());

mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());

$rs=mysqli_query($con,"select Points from about_services") or die(mysqli_connect_error());
while($row=mysqli_fetch_array($rs))
{
	$first=$row[0];
  echo"<li>$first</li>";              
}

?>        
                
          </ol>
        </td>

    </tr>
</table>
</div>
<?php
require("footer.php");
 
?>

</div>

</body>
</html>
