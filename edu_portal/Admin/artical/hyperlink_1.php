<?php
ob_start();
include("../../database/db_connection.php");
$sql="Select levelname from tbllevel";
$result=$conn->query($sql);
$i=0;
$sql1="Select faculty from tblfaculty";
$result1=$conn->query($sql1);
$j=0;
$sql="Select subjectid, subject from tblsubject";
$rownum=$conn->query($sql);
?>
<form action="../../php/save_hyperlink_1.php" method="post">
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
<td><select name="cmbsubject">
<?php
if($rownum->num_rows>0)
{
	while($data=$rownum->fetch_assoc())
		{
			echo "<option>" . $data["subject"] . "</option>";
			
		}
}
?>
</select></td>
</tr>
<tr>
<td>Hyperlink</td>
<td><textarea name="txthyperlink"  cols="50" rows="2"></textarea></td>
</tr>
<tr>
<td align="Right"><input type="submit" name="btnsave" value="Save"></td>
<td align="left"><input type="submit" name="btnedit" value="Edit"></td>
</tr>
</table>
</form>
<center>
<?php
if(isset($_GET['msg']))
{
 echo $_GET['msg'];
}
?>
</center>