<?php
session_start();
include("database/db_connection.php");
?>
<html>
<head>
<title>OTS:Portal</title>
</head>

<body bgcolor="#CCCCCC">
<form action="php/login.php" method="post">
<table width="400" align="center" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#0000FF"><img src="image/banner.jpg" width="800"></td>
</tr>
<tr>
<td colspan="3" align="right">&nbsp;</a></td>
</tr>
<tr>
<td colspan="3" align="right"><a href="new_member.php">New Member?</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="Admin/login.php" target="_blank">Admin Login</a></td>
</tr>
<tr>
<td colspan="3" align="right">&nbsp;</a></td>
</tr>
<tr>
<td align="right">Login Name</td>
<td rowspan="4" bgcolor="#0000FF">&nbsp;</td>
<td><input type="text" name="txtlname"></td>
</tr>
<tr>
<td colspan="3" align="right">&nbsp;</a></td>
</tr>
<tr>
<td align="right">Password</td>
<td><input type="password" name="txtpass"></td>
</tr>
<tr>
<td colspan="3" align="right">&nbsp;</a></td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" value="Login"></td>
</tr>
</table>
</form>
<center>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
if(isset($_GET['log']))
	{
		$sql="update tblloginreport set remark='OFF' where loginname='$_SESSION[lname]'";
		if(!mysqli_query($conn,$sql))
		{
			header('Location: index.php?msg'. mysqli_error($conn));
		}
		include("include/delete_stuans.php");
		session_unset();
	}
?>
</center>
</body>
</html>