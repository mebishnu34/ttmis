<?php
include("../database/db_connection.php");
$sql="Select id, fullname, address, contact,email from tblwriter";
$rownum=$conn->query($sql);
$i=0;
?>
<table width="90%" border="1">
<tr>
<td align="center">S.No</td>
<td align="center">Name of writer</td>
<td align="center">Group Address</td>
<td align="center">Contact</td>
<td align="center">E-mail</td>
<td align="center">Action</td>
</tr>
<?php
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
?>
<tr>
<td align="center">
<?php
	 	echo ($i+1);
?>
</td>
<td>
<?php
	 	echo $data["fullname"];
?>
</td>
<td>
<?php
	 	echo $data["address"];
?>
</td>
<td>
<?php
	 	echo $data["contact"];
?>
</td>
<td>
<?php
	 	echo $data["email"];
?>
</td>

<td bgcolor="#0000FF">
<a href=artical/artical.php?wid=<?php echo $data["id"];?>>Add Contents</a>&nbsp;&nbsp;&nbsp;
<a href=artical/writer_Action.php?linkid=<?php echo $data["id"];?>>Edit</a>&nbsp;&nbsp;&nbsp;
</td>
<?php
		$i++;
	echo "</tr>";
	}
}
?>
</table>
<a href="index.php">Back</a>