<?php
include("../Processing/db_connection.php");
$training=$_POST["cmbtraining"];
$level=$_POST["cmblevel"];
$subject=$_POST["cmbsubject"];
$trainingid=0;
$sqls = "SELECT * FROM tbltraining where trainingname='$training' and level='$level' and subject='$subject'";
	$results = $conn->query($sqls);
		if($results->num_rows > 0)
   		{
    	if($rows = $results->fetch_assoc())
    	   {
    		$trainingid=$rows["ID"];
		   }
		 }
		
?>
<html>
<head>
<title>TTMIS:Bagamati</title>
</head>
<body>
<center>Name of Training: <?php echo $training;?> Level: <?php echo $level;?> Subject: <?php echo $subject;?></center>
<table width="100%"  border="1">
<tr>
<th align="center">S.No</th>
<th align="center">Teacher Code</th>
<th>Name of Teacher</th>
<th>School Code</th>
<th>Name Of Training</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Remark</th>

<th></th>
</tr>
<?php
$sn=1;
$sql1 = "SELECT * FROM tblteacher";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
	$tcode=$row["teachercode"];
	$sqlt = "SELECT * FROM tblttraining where teacherid='$tcode' and trainingid='$trainingid' ORDER BY trainingid";
	$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	if($rowt = $resultt->fetch_assoc())
    	   {
    		echo "<tr>";
		    echo "<td align=center>". $sn . "</td>";
		    echo "<td align=center>" . $rowt["teacherid"] . "</td>";
    		echo "<td>" . $row["tname"] . "</td>";
			echo "<td>" . $rowt["schoolcode"] . "</td>";
			$trainingid=$rowt["trainingid"];
			$sqltr = "SELECT * FROM tbltraining where ID='$trainingid'";
			$resulttr = $conn->query($sqltr);
			if($resulttr->num_rows > 0)
   				{
    			if($rowtr = $resulttr->fetch_assoc())
    	   			{
					echo "<td>" . $rowtr["trainingname"] . "</td>";
					echo "<td>" . $rowtr["subject"] . "</td>";
					}
				}
			 echo "<td>" . $rowt["sdate"] . "</td>";
    		echo "<td>" . $rowt["edate"] . "</td>";
			echo "<td>" . $rowt["training"] . "</td>";
		    $sn++;
		   }
		}
    }
  }

?>
</body>
</html>
