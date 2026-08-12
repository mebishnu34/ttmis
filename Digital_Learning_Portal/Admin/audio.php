<?php
ob_start();
if($_SESSION['usertype']<>"Administrator")
	{
		header('Location: admin_application.php?msg="You have not previllage"');
	}
include("../php_processing/db_connection.php");
$i=0;
$sql1="Select levelid, levelname from tbllevel";
$result=$conn->query($sql1);
$sql2="Select id,categoryname from tbl_catagory";
$result1=$conn->query($sql2);
$sql="Select subjectid, subject from tblsubject";
$rownum=$conn->query($sql);
$sql="Select id, content_topic from tbltopic";
$rownum1=$conn->query($sql);
?>
<form action="processing/save_audio.php" method="POST"  ID="normal_form" enctype="multipart/form-data">
<table width="600" align="center" cellpadding="5">
<tr>
<td>Category</td>
<td><select name="cmbcategory">
	<?php
if($result1->num_rows>0)
	{
	while($data3=$result1->fetch_assoc())
	{
	?>
	<option value="<?php echo $data3["id"];?>"><?php echo $data3["categoryname"];?></option>
	
<?php
	}
	}
?>
</select>
</td>
</tr>

<tr>
<td>Level</td>
<td><select name="cmblevel">
	<?php
if($result->num_rows>0)
	{
	while($data=$result->fetch_assoc())
	{
	?>
	<option value="<?php echo $data["levelid"];?>"><?php echo $data["levelname"];?></option>
	
<?php
	}
	}
?>
</select>
</td>
</tr>
<tr>
<td>Subject</td>
<td><select name="cmbsubject">
<?php
if($rownum->num_rows>0)
{
	while($data1=$rownum->fetch_assoc())
		{
			echo "<option value=".$data1["subjetid"].">" . $data1["subject"] . "</option>";
			
		}
}
?>
</select></td>
</tr>
<tr>
<td>Topic</td>
<td><select name="cmbtopic">
<?php
if($rownum1->num_rows>0)
{
	while($data2=$rownum1->fetch_assoc())
		{
			echo "<option value=".$data2["id"].">" . $data2["content_topic"] . "</option>";
			
		}
}
?>
</select></td>
</tr>

<tr>
<td>Upload Audio</td>
<td><input type="file" name="afile" id="afile" required></td>
</tr>
<tr>
<td>Description</td>
<td><textarea name="txtdescription" cols="55" rows="3"></textarea></td>
</tr>
<tr>
<td>Audio Source</td>
<td><input type="Text" name="txtsource" id="txtsource" required></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnsave" value="Save"></td>
</tr>
</table>
</form>
