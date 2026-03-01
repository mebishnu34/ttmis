<?php
//session_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not Previllage"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="../php/save_level.php" method="post">
<table width="600" align="center">
<tr>
<td>Level/Class</td>
<td><input type="text" name="txtlevel"></td>
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
