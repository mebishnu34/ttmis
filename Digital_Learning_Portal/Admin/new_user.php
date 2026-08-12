<?php
if($_SESSION['usertype']<>"Administrator")
	{
		header('Location: admin_application.php?msg="You have not previllage"');
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="processing/save_user.php" method="post">
<table width="600" border="0" align="center" cellpadding="10">
<tr>
               <td align="right">Name of User*</td>
               <td><input type="text" name="txtuser" size="50" require></td>
           </tr>
           <tr>
               <td align="right">Gender</td>
               <td><input type="Radio" name="optgender" Value="Male">Male<input type="Radio" name="optgender" Value="Female">Female <input type="Radio" name="optgender" Value="Other">Other</td>
           </tr>
           <tr>
               <td align="right">Mobile No.*</td>
               <td><input type="Text" name="txtmobile" size="20" require></td>
           </tr>
           <tr>
               <td align="right">Login Name*</td>
               <td><input type="text" name="txtloginname" require></td>
           </tr>
           <tr>
               <td align="right">Password*</td>
               <td><input type="Password" name="txtpass" require></td>
           </tr>
           <tr>
               <td align="right">Confirm Password*</td>
               <td><input type="Password" name="txtconfirm" require></td>
           </tr>
           <tr>
               <td align="right">Type</td>
               <td>
               <select name="cmbutype">
                       <option>Normal</option>
                       <option>Administrator</option>
                       
               </select>
               </td>
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
