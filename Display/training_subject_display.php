
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<table width="100%" class="table_design">
<tr>
<th>S.No</th>
<th>ID</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
<th>&nbsp;</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
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
         echo "<td align=center bgcolor=blue><a href=../Input/edit_training_subject.php?tid=$row[ID] target=_blank>Edit</a></td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
