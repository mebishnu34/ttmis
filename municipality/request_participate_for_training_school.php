<HTML>
<head>
<?php
   include("Processing/db_connection.php");
   include("title.htm");
?>
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<BODY>
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
</tr>
<?php
$i=1;
$sql1 = "SELECT trainingid FROM tbltrainingrequest where govname='$_SESSION[uname]' and remark='Request'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($rowm = $result->fetch_assoc())
    {
		$id=$rowm["trainingid"];
		$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$id'";
		$resultm = $conn->query($sql);
		if($resultm->num_rows > 0)
            {
                if($row=mysqli_fetch_array($resultm))
                {
                    echo "<tr>";
                 	echo "<td align=center>". $i . "</td>";
                 	echo "<td>". $row["trainingname"]."</td>";
                 	echo "<td>". $row["level"] ."</td>";
                 	echo "<td>". $row["subject"]."</td>";
                 	echo "<td>". $row["startdate"]."</td>";
                 	echo "<td>". $row["enddate"]."</td>";
                 	echo "<td>". $row["venue"]."</td>";
                 	echo "<td bgcolor=blue><a href=municipality/display_request_for_training_school.php?id=$row[id] target=_blank>Check and Accept</a></td>";
					$i++;
                	echo "</tr>";
                }
     		}
	}
}
				?>
    </table>
</BODY>
</HTML>
