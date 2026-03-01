<?php
ob_start();
session_start();
if($_SESSION['Admin']=="")
	{
		header('Location: ../index.php');
	}
include("../database/db_connection.php");
$sql=mysql_query("Select levelname from tbllevel", $con);
$rownum=mysql_num_rows($sql);
$i=0;
$sql1=mysql_query("Select faculty from tblfaculty", $con);
$rownum1=mysql_num_rows($sql1);
$j=0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="displaysubject.php" method="post">
<table width="600" align="center">
<tr>
<td>Level/Class</td>
<td><select name="cmblevel">
	<?php
while($i<$rownum)
	{
	?>
<option><?php echo mysql_result($sql,$i,"levelname");?></option>
<?php
	$i++;
	}
?>
</select></td>
</tr>
<tr>
<td>Faculty</td>
<td><select name="cmbfaculty">
	<?php
while($j<$rownum1)
	{
	?>
<option><?php echo mysql_result($sql1,$j,"faculty");?></option>
<?php
	$j++;
	}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Display"></td>
</tr>
</table>
</form>

</body>
</html>
