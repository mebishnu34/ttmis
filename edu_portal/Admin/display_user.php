<?php
include("../database/db_connection.php");
$sql="Select fname, lname, password, type from tbluser";
$rownum=$conn_1->query($sql);
?>
<table width="800" align="center" border="1">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of User</b></td>
<td align="center"><b>Login Name</b></td>
<td align="center"><b>Password</b></td>
<td align="center"><b>Type</b></td>
</tr>
<?php
$i=0;
if($rownum->num_rows>0)
{
	while($data=$rownum->fetch_assoc())
		{
			echo "<tr>";
			echo "<td align=center>" . ($i+1) . "</td>";
			echo "<td>" . $data["fname"] . "</td>";
			echo "<td>" . $data["lname"] . "</td>";
			echo "<td>" . $data["password"] . "</td>";
			echo "<td>" . $data["type"] . "</td>";
			echo "</tr>";
			$i++;
		}
}
?>
</table>
