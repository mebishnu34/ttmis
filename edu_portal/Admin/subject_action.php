<?php
ob_start();
session_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
include("../database/db_connection.php");
$id=$_GET['subid'];
$subsql=mysql_query("select subject, level, faculty from tblsubject where subjectid='$id'",$con);
$data=mysql_fetch_array($subsql);
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
<form action="../php/update_subject.php" method="post">
<input type="hidden" name="txtid" value="<?php echo $id; ?>">
<table width="600" align="center">
<tr>
<td>Level/Class</td>
<td><select name="cmblevel">
	<option><?php echo $data["level"];?></option>
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
<option><?php echo $data["faculty"];?></option>
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
<td>Subject</td>
<td><input type="text" name="txtsubject" value="<?php echo $data["subject"];?>"></td>
</tr>
<tr>
<td align="center"><input type="submit" name="btnedit" value="Edit"></td>
</tr>
</table>
</form>
<?php
if($_GET['msg'])
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
