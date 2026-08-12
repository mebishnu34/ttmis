<?php
ob_start();
if($_SESSION['usertype']<>"Administrator")
	{
		header('Location: admin_application.php?msg="You have not previllage"');
	}
include("../php_processing/db_connection.php");
$sql2="Select id,categoryname from tbl_catagory";
$result1=$conn->query($sql2);
$i=0;
$sql1="Select levelid, levelname from tbllevel";
$result=$conn->query($sql1);
$j=0;
$sql="Select subjectid, subject from tblsubject";
$rownum=$conn->query($sql);
?>
<form action="processing/save_topic.php" method="post"  enctype="multipart/form-data" ID="normal_form">
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
			echo "<option value=". $data1[subjectid].">" . $data1["subject"] . "</option>";
		}
}
?>
</select></td>
</tr>
<tr>
<td>Content Topic</td>
<td><input type="Text" name="txttopic" require></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnsave" value="Save"></td>
</tr>
</table>
</form>
