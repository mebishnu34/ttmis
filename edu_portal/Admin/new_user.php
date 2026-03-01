<?php
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="../php/save_user.php" method="post">
<table width="600" border="0" align="center" cellpadding="10">
<tr>
<td align="right">Full Name</td>
<td><input type="text" name="txtfname"></td>
</tr>
<tr>
<td align="right">Login Name</td>
<td><input type="text" name="txtlname"></td>
</tr>
<tr>
<td align="right">Password</td>
<td><input type="password" name="txtpass"></td>
</tr>
<tr>
<td align="right">Confirm Password</td>
<td><input type="password" name="txtconpass"></td>
</tr>
<tr>
<td align="right">Type</td>
<td><select name="cmbtype">
<option>Normal</option>
<Option>Administrator</Option>
</select></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Save"></td>
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
