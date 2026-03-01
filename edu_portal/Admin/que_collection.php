<?php
ob_start();
if($_SESSION['Admin']=="")
	{
		header('Location: ../index.php');
	}
include("../database/db_connection.php");
$sql="Select levelname from tbllevel";
$rownum=$conn->query($sql);
$i=0;
$sql1="Select faculty from tblfaculty";
$rownum1=$conn->query($sql1);
$j=0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online_Learning</title>
</head>
<body>
<form action="session/year_subject.php" method="post">
<table width="600" align="center" cellpadding="10">
<tr>
<td>Level</td>
<td><select name="cmblevel">
	<?php
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
	?>
<option><?php echo $data["levelname"];?></option>
<?php
	}
}
?>
</select></td>
</tr>
<tr>
<td>Faculty</td>
<td><select name="cmbfaculty">
	<?php
if($rownum1->num_rows>0)
{
while($data1=$rownum1->fetch_assoc())
	{
	?>
<option><?php echo $data1["faculty"];?></option>
<?php
	}
}
?>
</select></td>
</tr>
<tr>
<td>Year</td>
<td>
<select name="cmbyear">
<option>2068</option>
<option>2069</option>
<option>2070</option>
<option>2071</option>
</select>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Entry"></td>
</tr>
</table>
</form>

</body>
</html>
