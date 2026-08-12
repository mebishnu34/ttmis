<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table>
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Training Number</th>
<th>Start Date</th>
<th>End Date</th>
<th>Remark</th>
</tr>
<?php
$sn=1;
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tblttraining where ongoing='ON' ORDER BY traiiningid, trainingnumber";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    $tid=$row['trainingid'];
    $sql1 = "SELECT * FROM tbltraining where trainingid='$tid'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows>0)
    {
     $row1=$result1->fetch_assoc();
         echo "<tr>";
         echo "<td>". $sn . "</td>";
         echo "<td>" . $row1["trainingname"] . "</td>";
         echo "<td>" . $row["trainingnumber"] . "</td>";
         echo "<td>" . $row["startdate"] . "</td>";
         echo "<td>" . $row["enddate"] . "</td>";
         echo "<td>Completed</td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
