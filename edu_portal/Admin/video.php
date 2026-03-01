<?php
ob_start();
if($_SESSION['utype']<>"Administrator")
	{
		header('Location: index.php?msg="You have not previllage"');
	}
include("../../Processing/db_connection.php");
include("../database/db_connection.php");
$i=0;
$sql1="Select faculty from tblfaculty";
$result1=$conn_1->query($sql1);
$j=0;
$sql="Select subject from tbltraining";
$rownum=$conn->query($sql);
?>
<form action="../php/save_video.php" method="post"  enctype="multipart/form-data">
<table width="600" align="center" cellpadding="5">
<tr>
<td>Level</td>
<td><select name="cmblevel">
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</optionn>
         <option>अन्य</option>
</select>
</td>
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
<td><input type="file" name="vfile" id="vfile"></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btnsave" value="Save"></td>
</tr>
</table>
</form>
