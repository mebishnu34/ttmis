<BODY>
<form method="post" action="../export/export_teacher_district.php">
<table width="100%" class="subtable">
<tr>
<td>
<?php
include("../Processing/db_connection.php");
$sql="SELECT subname FROM tblsubject ORDER BY subname";
$result = mysqli_query($conn,$sql);
?>
<select name="cmbsubject" onchange="subject(this.value)" class="normaltext">
<?php
echo "<option>None</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['subname'] . "</option>";
     }
echo "</select>";
?>
</td>
<td></td>
</tr>
</table>
<div id="txtHint1">&nbsp;</div>
<div><input type="submit" value="Export In Excel" name="teacherdistrict"></div>
</form>
</BODY>
</HTML>
