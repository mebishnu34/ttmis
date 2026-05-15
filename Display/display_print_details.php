<?php
   include("../Processing/db_connection.php");
  ?>
<form action="#" method="Post">
Date: <input type="date" name="txtstartdate" value="<?php echo date('Y-m-d'); ?>">
To : <input type="date" name="txtenddate" value="<?php echo date('Y-m-d'); ?>">
<input type="Submit" value="Display" name="btndisplay">
</form>
<?php 
if(isset($_POST['btndisplay']))
	{
		$sdate=$_POST['txtstartdate'];
		$edate=$_POST['txtenddate'];
		echo $sdate . " TO :". $edate;
?>
<table width="100%" class="dtable">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Name of Training</td>
		<td align="center">Name of Teacher</td>
	<td align="center">Name of School</td>
	<td align="center">District</td>
	<td align="center">Print Date</td>
	</tr>
<?php
$i=1;
$teachername="";
	$sql="SELECT trainingname,trainingid,teacherid,scode,schooldistrict,printby,printdate,trainingyear,certificateno FROM tblprintdetails where printdate>='". $sdate ."' and printdate <= '".$edate."' ORDER BY printdate DESC";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
		{
		$sql1 = "SELECT tname, munvdc, province, district FROM tblteacher where teachercode='".$row['teacherid']."'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0)
   		{
    	if($row1 = $result1->fetch_assoc())
   			 {
        //$munvdc= $row1["munvdc"];
        $teachername= $row1["tname"];
        //$district=$row1["district"];
        //$province=$row1["province"];
        //$wardno=$row1["wardno"];
        //$citizenshipno=$row1["citizenship"];
         
    }
    }
$sql2 = "SELECT schoolname,district FROM tblschool where schoolcode='".$row["scode"]."'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0)
   {
    while($row2 = $result2->fetch_assoc())
    {
        $schoolname= $row2["schoolname"];
        //$schooldistrict= $row2["district"];

    }
    }

	    echo "<tr>";
    	echo "<td align=center>".$i."</td>";
	    echo "<td align=center>".$row["trainingname"]."</td>";
    	echo "<td align=center>".$teachername."</td>";
	    echo "<td align=center>".$schoolname."</td>";
		echo "<td align=center>".$row["schooldistrict"]."</td>";
		echo "<td align=center>".$row["printdate"]."</td>";
		 $i++;
    	echo "</tr>";
		}
	?>
</table>

<table width="50%" class="dtable">
	<tr>
	<td align="center">S.No</td>
	<td align="center">Name of Training</td>
	<td align="center">Number of Print</td>
</tr>
<?php
$i=1;
$sql = "SELECT trainingname, COUNT(*) AS total FROM tblprintdetails where printdate>='". $sdate ."' and printdate <= '".$edate."' GROUP BY trainingname";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) 
	{
    echo "<tr>";
    echo "<td align='center'>" . $i . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['trainingname']) . "</td>";
    echo "<td align='center'>" . $row['total'] . "</td>";
    echo "</tr>";

    $i++;
	}
}
	?>
</table>
