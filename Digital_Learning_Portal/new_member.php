<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="stylesheet" type="text/css" href="css/table.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OTS  Portal</title>
</head><link rel="stylesheet" type="text/css" href="css/body.css">
<body bgcolor="#CCCCCC">
<table width="90%" align="center" border="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
<tr>
<td align="center" valign="top">
<table width="100%" bgcolor="#0000FF">
<tr>
<td align="left"><img src="image/banner.jpg" height="100"></td>
<td align="right"><font size="+5" color="#FFFFFF"><b>Name of School</b></font></td>
</tr>
</table>
<table width="100%" align="center">
<tr>
<td valign="top" width="200">
<font color="#FFFFFF"><b>
<?php
include("include/display_term.php");
?>
</b></font>
</td>
<td>
<form action="php/save_member.php" method="post" enctype="multipart/form-data">
<table width="800" align="center" cellpadding="10">
<tr>
<td width="150">Full Name*</td>
<td><input type="text" name="txtfname" size="40"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="optgender" value="Male">Male <input type="radio" name="optgender" value="Female">Female</td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="txtaddress" size="40"></td>
</tr>
<tr>
<td>Contact*</td>
<td><input type="text" name="txtcontact"></td>
</tr>
<tr>
<td>Photo</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
<td>Level*</td>
<td><select name="cmblevel">
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</optionn>
         <option>अन्य</option>
</select></td>
</tr>
<td>Login Name*</td>
<td><input type="text" name="txtlname"></td>
</tr>
<tr>
<td>Password*</td>
<td><input type="password" name="txtpass"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="txtconpass"></td>
</tr>
<td colspan="2" align="center"><input type="checkbox" value="Accept" name="condition">* I Accept Term and Condition.</td>
<tr>
<td colspan="2" align="center"><input type="submit" value="Register"> &nbsp; &nbsp;<a href="index.php"><input type="button" value="Cancel"></a></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</td>
</tr>
</table>
</td>
</table>
</body>
</html>
