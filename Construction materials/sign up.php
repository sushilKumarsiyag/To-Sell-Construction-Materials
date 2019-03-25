<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#table1
{
	margin-left:440px;
	margin-top:150px;
}
body
{
	background-color:#396;
	font-size:18px;
	padding:0px;
	margin:0px;
}
th
{
	background-color:#000;
	color:#FFF;
	font-style:italic;
}
select
{
	width:100%;
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


</style>

</head>

<body>
<div id="div0">
<marquee id="marquee">
Sign_up
</marquee>
</div>


<?php
$name=$password=$ques=$ans="";
if(isset($_POST['sbmit']))
{
	$user=$_POST['txname'];
	$password=$_POST['txpass'];
	$ans=$_POST['txans'];
	$ques=$_POST['txques'];
$con=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_query($con,'use CollegeDB') or die(mysqli_connect_error());

mysqli_query($con,"create table if not exists user_tb(user varchar(50),password int,Ques varchar(255),ans varchar(255),primary key(user))")  or die(mysqli_error($con));
mysqli_query($con,"insert into user_tb(user,password,Ques,ans) values('$user',$password,'$ques','$ans')") or die(mysqli_error($con));

mysqli_close($con);
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table border="2" cellpadding="3" cellspacing="15" id="table1">
	<tr>
    	<th>
			User Name        
        </th>
        <td>
        	<input type="text" name="txname"<?php echo $name; ?>/>
        </td>
    </tr>
    <tr>
    	<th>
			Password       
        </th>
        <td>
        	<input type="text" name="txpass"/>
        </td>
    </tr>
	<tr>
    	<th>
			Quenstion       
        </th>
        <td>
        	<select name="txques">
            	<option>select</option>
                <option>yours nik name</option>
                <option>yours friend name</option>
                <option>yours DOB</option>
            </select>
        </td>
    </tr>
	<tr>
    	<th>
			Ans       
        </th>
        <td>
        	<input type="text" name="txans"/>
        </td>
    </tr>
	<tr>
    	<td><input style="width:100%" type="submit" value="submit" name="sbmit"/></td>
    </tr>
</table>
</form>
</body>
</html>