 <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<table width="100%" class="table_design" align="center">
<tr>
<th>S.No</th>
<th>Teacher ID</th>
<th>Name of Teacher</th>
<th>Contact</th>
<th>Login Name</th>
<th>Password</th>
<th>&nbsp;</th>
</tr>
<?php
$sn=1;
include("Processing/db_connection.php");
 $sql1 = "SELECT * FROM tblteacher where scode='$_SESSION[code]' and (remark='Working' or remark='Approved') ORDER BY tname";
 $result = $conn->query($sql1);
 if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    echo "<tr>";
    echo "<td align=center>". $sn . "</td>";
    echo "<td align=center >". $row["teachercode"] . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td align=center>" . $row["tcontact"] . "</td>";
    echo "<td align=center>" . $row["loginname"] . "</td>";
	    echo "<td align=center>" . $row["tpass"] . "</td>";
    echo "<td bgcolor=blue align=center><a href=school_application.php?tdlinkid=$row[teacherid]>Details</a> &nbsp &nbsp <a href=school_application.php?telinkid=$row[teacherid]>Edit</a></td>";
    echo "</tr>";
    $sn++;
    }
   }

?>
<tr><td align="center" colspan="7">
<form name="export" action="../export/display_teacher.php" method="post">
				<input type="submit" value="Save In Excel">
		</form>
</td></tr>
</table>

