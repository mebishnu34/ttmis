<?php
if($_SESSION['usertype']<>"Administrator")
	{
		echo $_SESSION['utype'];
		//header('Location: ../admin_login.php?msg="You have not Previllage"');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="processing/save_category.php" method="post" ID="normal_form">
<table width="100%" align="center" ID="content_table">
<tr>
<td>Category</td>
<td><input type="text" name="txtcategory" size="50"></td>
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
