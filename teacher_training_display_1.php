<table width="100%" class="dtable">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
<th>Co-Ordinator</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
<?php
$tid=$_SESSION['tid'];
$sn=1;
include("Processing/db_connection.php");
$sql = "SELECT * FROM tblttraining where teacherid='$tid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
		$id=$row["trainingid"];
		$sql1 = "SELECT * FROM tbltraining where ID='$id'";
  		$result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
           if($row1 = $result1->fetch_assoc())
             {
               echo "<tr>";
         	   echo "<td align=center>". $sn . "</td>";
         	   echo "<td align=center>" . $row1["trainingname"] . "</td>";
         	   echo "<td align=center>" . $row1["level"] . "</td>";
         	   echo "<td align=center>" . $row1["subject"] . "</td>";
			   echo "<td align=center>" . $row["coordinator"] . "</td>";
         	   echo "<td align=center>" . $row["sdate"] . "</td>";
         	   echo "<td align=center>" . $row["edate"] . "</td>";
         	   echo "<td align=center><a href=certificate_display_1.php?tid=". $row["ID"]. " target=blank>Certificate </a> / <a href=teacher_training_update.php?tid=". $row["ID"]. " target=blank>Update</a></td>";
         	   echo "</tr>";
         	  $sn++;
			  }
		  }
     }
  }

?>
</table>

