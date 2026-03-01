<?php
   include("../Processing/db_connection.php");
  ?>
<table width="100%" class="dtable">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Name of User</td>
		<td align="center">Mobile No.</td>
	<td align="center">Login Name</td>
	<td align="center">Password</td>
	<td align="center">User Type</td>
	<td align="center"></td>
	</tr>
<?php
$i=1;
	$sql="SELECT * FROM tbluser ORDER BY uname";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["uname"]."</td>";
    	echo "<td align=center>".$row["mobileno"]."</td>";
	    echo "<td align=center>".$row["loginname"]."</td>";
		echo "<td align=center>".$row["upass"]."</td>";
		echo "<td align=center>".$row["utype"]."</td>";
		echo "<td align=center bgcolor=blue><a href=../Input/edit_user.php?uid=$row[userid] target=_blank>Edit</a></td>";
         $i++;
    	echo "</tr>";
		}
	?>
</table>

