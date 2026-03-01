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
<form action="../../php/save_video_1.php" method="post" enctype="multipart/form-data">
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
<td>Upload Video</td>
<td><input type="file" name="vfile" /></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnsave" value="Save"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
{
	echo $_GET['msg'];
}
?>