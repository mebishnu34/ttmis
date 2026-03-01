<html>
<HEAD>
 <TITLE>School Details</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="100%">
<tr>
<td align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left"><img src="..\Image\banner.jpg" width="100%" height="150"></td>
</tr>
</table>

<?php
include("../Processing/db_connection.php");
$code = $_GET['scode'];
$sql1 = "SELECT * FROM tblschool where ID='$code'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      if($row = $result1->fetch_assoc())
         {
        $school= $row['schoolname'];
          }
   }
?>
<form method="Post" action="../Object/update_school_1.php">
<table width="100%" class="subtable" border="0" class="10" cellpadding="10">
<tr>
<td colspan="3" align="center">School Update</td>
</tr>
<tr><td align="right">Name of School</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="50" value="<?php echo $school;?>" /></td>
</tr>
<tr><td align="right">School Code</td>
<td>&nbsp;</td>
<td><input name="txtcode" type="Text" size="20" value="<?php echo $code;?>"  readonly="True"/></td>
</tr>
<tr>
<td colspan="3" align="Center"><input name="btnupdate" type="Submit" value="Update" /></td>
</tr>

</table>
</form>
</div>
</body>

</html>
