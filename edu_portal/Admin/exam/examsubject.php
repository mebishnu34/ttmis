<?php
session_start();
if($_SESSION['fname']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
</head>

<body>
<form action="../php/save_examsubject.php" method="post">
<table width="600" align="center">
<tr>
	<td><div align="right">Subject</div></td>
	<td>&nbsp;</td>
	<td><input type="text" name="txtsubject" size="50"></td>
	</tr>
<tr>
<td colspan="3" align="center"><input type="submit" value="Save"></td>
</tr>
</table>
</form>
</body>
</html>
