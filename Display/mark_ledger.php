<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%" class="dtable">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tblruntraining ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
          echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $row["trainingname"] . "</td>";
         echo "<td align=center>" . $row["level"] . "</td>";
         echo "<td align=center>" . $row["subject"] . "</td>";
         echo "<td align=center>" . $row["startdate"] . "</td>";
         echo "<td align=center>" . $row["enddate"] . "</td>";
         echo "<td align=center>" . $row["venue"] . "</td>";
         echo "<td align=center><a href=../Display/mark_ledger_details.php?tid=$row[id] target=_blank>Mark Ledger</a></td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
