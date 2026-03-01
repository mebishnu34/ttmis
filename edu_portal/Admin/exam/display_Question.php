<?php
session_start();
$_SESSION['level']=$_POST['cmblevel'];
include("../../../Processing/db_connection.php");
$sql="Select subject from tbltraining where level='$_POST[cmblevel]'";
$rownum=$conn->query($sql);
$i=0;
?>
<form action="dipque.php" method="post">
<table width="800" border="0" align="center" cellpadding="10">
<tr>
<td align="right">Subject</td>
<td>
<select name="cmbsubject">
<?php
if($rownum->num_rows>0)
{
	while($data=$rownum->fetch_assoc())
		{
			echo "<option>" . $data["subject"] . "</option>";
			
		}
}
?>
</select>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Display Question"></td>
</tr>
</table>
</form>
