<?php
include("Processing/db_connection.php");
$name = ($_GET['search']);
$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '$Name%'";
$ExecQuery1 = MySQLi_query($conn, $Query);
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while ($Result = MySQLi_fetch_array($ExecQuery1)) {
    ?>
    <tr>
<td> <?php echo $Result['teachercode']; ?></td>
<td><?php echo $Result['tname']; ?></td>
<td><?php echo $Result['tcontact']; ?> </td>
<td><?php echo $Result['schoolname']; ?></td>
<td><?php echo $Result['munvdc']; ?></td>
<td><?php echo $Result['district']; ?></td>
</tr>
   <?php
}
echo "</table>";

mysqli_close($con);
?>