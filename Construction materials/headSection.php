<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css"/>
<link href="css/project div.css" rel="stylesheet" type="text/css" />

<script type="application/javascript" src="js/ImageSlider.js">
</script>
</head>

<body  onload="init()">
<div id="navdiv">
	<ul id="nav">
    			<li>
                <?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$sno=6;	
mysqli_query($con,'use KaarigarDB') or die(mysqli_connect_error());
$rs=mysqli_query($con,"select * from imageslider_tb where sno='$sno'")  or die(mysqli_connect_error());
					while($row=mysqli_fetch_array($rs))
					{
						$image4=$row[1];
					
					}
	
?>
               <img id="logo" src="<?php echo"admin/$image4";?>"/>
				</li>
            	<li id="li"><a href="homepage.php">Home</a></li>
                <li id="dropdown"><a href="#">Things</a>
                	<ul id="menu">
                    	<li><a href="productdetail.php?name=Bricks">Bricks</a></li>
                        <li><a href="productdetail.php?name=Sand">Sands</a></li>
                        <li><a href="productdetail.php?name=Gravels">Gravels</a></li>
                        <li><a href="productdetail.php?name=Cement">Cement</a></li>
                	</ul>
               </li>
              <li><a href="Login_form.php">Advance booking</a></li>
              <li><a href="Login.php">Login</a></li>
              <li><a href="contact Us.php">Contact Us</a></li>     
    </ul>

</div>

<!--<div id="slidediv">
	
	<div id="slideout">
                	<div id="slideinner">
                  <img id="img1" src="pictures/Camera Roll/images (1).jpeg"/>
                        <img id="img1" src="pictures/Camera Roll/bajri-500x500.jpg"/>
                        <img class="img1" src="pictures/Camera Roll/bangur-cement.png"/>
                        <img class="img1" src="pictures/Camera Roll/grit.jpg"/>
                        <img class="img1" src="pictures/Camera Roll/bajri-sand-500x500.jpg"/>
                    </div>
                </div>

</div>-->

</body>
</html>