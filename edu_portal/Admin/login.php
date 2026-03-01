<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>OTS:Portal</title>
</head>	
<body bgcolor="#999999">
<form action="../php/do_login.php" method="post">
<table width="600" align="center" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><img src="../image/banner.jpg"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td rowspan="4" bgcolor="#000066">&nbsp;</td>
</td>
</tr>
<tr>
<td align="right">Login Name</td>
<td><input type="text" name="txtlname"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align="right">Password</td>
<td><input type="password" name="txtpass"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" value="Login"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
