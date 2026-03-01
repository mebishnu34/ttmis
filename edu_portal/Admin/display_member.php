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
<form action="displaymember_1.php" method="post">
<table width="800" align="center" cellpadding="15">
<tr>
<td>
Date From: <input type="text" name="txtdfrom">
</td>
<td> Date To : <input type="text" name="txtdto"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Display"></td>
</tr>
</table>
</form>

</body>
</html>
