<table width="100%" class="dtable">
<tr>
<th>S.No</th>
<th>ID</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
</tr>
<?php
$sn=1;
include("Processing/db_connection.php");
$sql = "SELECT * FROM tbltraining ORDER BY trainingname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
          echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
		 echo "<td align=center>" . $row["ID"] . "</td>";
         echo "<td align=center>" . $row["trainingname"] . "</td>";
         echo "<td align=center>" . $row["level"] . "</td>";
         echo "<td align=center>" . $row["subject"] . "</td>";
          echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
