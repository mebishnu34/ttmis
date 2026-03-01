<?php
   include("Processing/db_connection.php");
   include("title.htm");
   $scode=$_SESSION['code'];
?>
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<table width="100%" class="table_design" align="center">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
<th></th>
<th></th>
</tr>
<?php
$i=1;
$sqlm="SELECT trainingid from tblschoolinfo where schoolcode='$scode'";
$resultm = $conn->query($sqlm);
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
    $id=$rowm["trainingid"];
    $sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$id' and remark='Running' ORDER BY trainingname";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
            {
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                 echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue><a href=school/school_teacher_request.php?id=$row[id] target=_blank>Select</a></td>";
				 echo "<td bgcolor=blue><a href=school/training_school_letter_to_palika.php?linkid=$row[id] target=_blank>Letter</a></td>";
					$i++;
                echo "</tr>";
                }
     }
     }
     }
				?>
    </table>
