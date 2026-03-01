<?php
include("../php_processing/db_connection.php");
$sql="Select username, email, province, district,l_govern,wardno, address,usertype, loginname, password,mobileno from tbl_user";
$rownum=$conn->query($sql);
?>
<table width="800" align="center" border="1" cellspacing="0">
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Name of User</b></td>
<td align="center"><b>Address</b></td>
<td align="center"><b>Mobile No</b></td>
<td align="center"><b>E-Mail</b></td>
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
			echo "<td>" . $data["username"] . "</td>";
			echo "<td>" . $data["address"] . "</td>";
			echo "<td>" . $data["mobileno"] . "</td>";
			echo "<td>" . $data["email"] . "</td>";
			echo "<td>" . $data["loginname"] . "</td>";
			echo "<td>" . $data["password"] . "</td>";
			echo "<td>" . $data["usertype"] . "</td>";
			echo "</tr>";
			$i++;
		}
}
?>
</table>
