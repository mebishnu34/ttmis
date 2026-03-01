<?php
include("../php_processing/db_connection.php");
$sql="Select uname, loginname,mobileno,upass, utype from tbladmin";
$rownum=$conn->query($sql);
?>
<table width="800" align="center" border="1" cellspacing="0">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of User</b></td>
<td align="center"><b>Mobile No</b></td>
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
			echo "<td>" . $data["uname"] . "</td>";
            echo "<td>" . $data["mobileno"] . "</td>";
			echo "<td>" . $data["loginname"] . "</td>";
            echo "<td>" . $data["upass"] . "</td>";
			echo "<td>" . $data["utype"] . "</td>";
			echo "</tr>";
			$i++;
		}
}
?>
</table>
