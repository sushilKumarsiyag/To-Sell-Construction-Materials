<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

#div1
{
		padding:0px;
	margin:0px;
	width:100%;
	height:660px;
	background-color:#09F;
}
#div2
{
		padding:0px;
	margin:0px;
	//margin-top:30px;
}
#tablesign
{
	width:25%;
	margin-top:2%;
	margin-left:25%;
	height:100px;
}
.input
{
	font-family:Verdana, Geneva, sans-serif;
	font-size:24px;
	color:#66C;
	padding:20px;
	margin:0px;
	width:100%;
	font-style:italic;
	//font-weight:800;
}
#div3
{
	padding:0px;
	margin:0px;
	margin-top:5%;
}
</style>
</head>
<body>
<div id="div1">
<?php
require("headSection.php");
?>
<?php
require("js/imageSlider1.php");

?>
<form name="frm" method="post">
<table id="tablesign" border="1" cellpadding="1" cellspacing="4">
	<tr>
	<td>
    	<input class="input" onclick="frm.action='Login_form.php'" type="submit" value="LogIn"/>
    </td>
    <td>
    	<input class="input" onclick="frm.action='sign up.php'" type="submit" value="Sign_Up"/>
    </td>
    </tr>
</table>
</form>
<div id="div3">
<?php
require("footer.php");
?>
</div>

</div>
</body>
</html>