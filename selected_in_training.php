<table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0">
<tr>
<th>Name of Training</th>
<th>Venu</th>
<th>Co-Ordinator</th>
<th>Contact</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
<?php
include("Processing/db_connection.php");
$i=1;
//$q = intval($_GET['q']); //for numerice value
$sql = "SELECT id,trainingid, trainingname, coordinator, mobileno, startdate, enddate,venue from tblruntraining where remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
		$tid=$row["id"];
		$sql1="SELECT teacherid FROM tblteacher where teachercode='$_SESSION[tid]'";
		$result1 = mysqli_query($conn,$sql1);
		if($row1 = mysqli_fetch_array($result1))
			{
      		$teacherid=$row1["teacherid"];
			$tsql = "SELECT trainingid from tblttraining where trainingid='$tid' and teacherid='$teacherid'";
    	    $tresult = $conn->query($tsql);
			$msql = "SELECT trainingid from tblmuncipalityinfo where trainingid='$tid' and teacherid='$teacherid'";
    	    $mresult = $conn->query($msql);
			$sql2 = "SELECT trainingid from tbltrainingrequest where trainingid='$tid' and teacherid='$teacherid'";
    	    $result2 = $conn->query($sql2);
        	if ($tresult->num_rows > 0)
                 {
				?>
				<tr>
				<td align="center"><?php echo $row["trainingname"];?></td>
				<td><?php echo $row["venue"];?></td>
				<td><?php echo $row["coordinator"];?></td>
				<td><?php echo $row["mobileno"];?></td>
				<td><?php echo $row["startdate"];?></td>
				<td><?php echo $row["enddate"];?></td>
<?php
  				echo "</tr>";
  				echo "<tr><td colspan=7>Remark:Selected For Training In Training Center</td></tr>";
				}
			elseif ($mresult->num_rows > 0)
                 {
				?>
				<tr>
				<td align="center"><?php echo $row["trainingname"];?></td>
				<td><?php echo $row["venue"];?></td>
				<td><?php echo $row["coordinator"];?></td>
				<td><?php echo $row["mobileno"];?></td>
				<td><?php echo $row["startdate"];?></td>
				<td><?php echo $row["enddate"];?></td>
<?php
  				echo "</tr>";
  				echo "<tr><td colspan=7>Remark:Selected From Palika</td></tr>";
				}
			elseif ($result2->num_rows > 0)
                 {
				?>
				<tr>
				<td align="center"><?php echo $row["trainingname"];?></td>
				<td><?php echo $row["venue"];?></td>
				<td><?php echo $row["coordinator"];?></td>
				<td><?php echo $row["mobileno"];?></td>
				<td><?php echo $row["startdate"];?></td>
				<td><?php echo $row["enddate"];?></td>
<?php
  				echo "</tr>";
  				echo "<tr><td colspan=7>Remark:Selected From School</td></tr>";
				}
			}
		}
	}
mysqli_close($conn);
?>
</table>
