<?php
include("../php_processing/db_connection.php");
$sql="Select fname, gender, address,contact,level,email, lname, lpass from tblmember";
$rownum=$conn->query($sql);
?>
<table width="800" align="center" border="1" cellspacing="0">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of User</b></td>
<td align="center"><b>Level</b></td>
<td align="center"><b>Address</b></td>
<td align="center"><b>Mobile No</b></td>
<td align="center"><b>Login Name</b></td>
<td align="center"><b>Password</b></td>

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
			echo "<td>" . $data["level"] . "</td>";
			echo "<td>" . $data["address"] . "</td>";
			echo "<td>" . $data["contact"] . "</td>";
			echo "<td>" . $data["lname"] . "</td>";
			echo "<td>" . $data["lpass"] . "</td>";
			
			echo "</tr>";
			$i++;
		}
}
?>
</table>
