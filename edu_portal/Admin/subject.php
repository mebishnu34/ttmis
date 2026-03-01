<?php
ob_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
include("../database/db_connection.php");
$sql="Select levelname from tbllevel";
$result=$conn->query($sql);
$i=0;
$sql1="Select faculty from tblfaculty";
$result1=$conn->query($sql1);
$j=0;
?>
<form action="../php/save_subject.php" method="post">
<table width="600" align="center" cellpadding="5">
<tr>
<td>Level/Class</td>
<td><select name="cmblevel">
	<?php
if($result->num_rows>0)
	{
	while($data=$result->fetch_assoc())
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
if($result1->num_rows>0)
	{
	while($data1=$result1->fetch_assoc())
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
<td>Subject</td>
<td><input type="text" name="txtsubject" size="50"></td>
</tr>
<tr>
<td align="Right"><input type="submit" name="btnsave" value="Save"></td>
<td align="left"><input type="submit" name="btnedit" value="Edit"></td>
</tr>
</table>
</form>
