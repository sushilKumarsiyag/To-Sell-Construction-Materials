<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body
{
	background-image:url(pictures/Camera%20Roll/glass_matrix-1024x768.jpg); background-repeat:no-repeat; background-size:100%;
	font-family:Verdana, Geneva, sans-serif;
}
input
{
	font-size:24px;
	width:400px;
	font-style:italic
}

</style>
</head>

<body>
<form name="frm" method="post">
<table border="1" cellpadding="3" cellspacing="13">
	<tr>
    	<td>
        <input type="submit" onclick="frm.action='admin/product_insert.php'" value="Product_Insert And Update"/> 
        </td>
        <td>
        	<input type="submit" onclick="frm.action='admin/product_type_insert.php'" value="product_Type_Insert & Update"/>
        </td>
        <td>
        <input type="submit" onclick="frm.action='admin/about_us.php'" value="Insert & Update in About_Us"/>
        </td>
</tr>
<tr>
    	<td>
        	<input type="submit" onclick="frm.action='admin/About_product&About_services.php'" value="About Product&services "/>
        </td>
        <td>
        	<input type="submit" onclick="frm.action='admin/contactusdata.php'" value="about Contact Us"/>
        </td>
        <td>
        	<input type="submit" onclick="frm.action='admin/imagesliderinsert.php'" value="Update Slider"/>

        </td>
    </tr>
</table>
</form>
</body>
</html>