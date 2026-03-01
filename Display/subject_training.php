<?php
include("../Processing/db_connection.php");
$training=$_POST["cmbtraining"];
$level=$_POST["cmblevel"];
$subject=$_POST["cmbsubject"];
$trainingid=0;
$sqls = "SELECT ID FROM tbltraining where trainingname='$training' and level='$level' and subject='$subject'";
$results = $conn->query($sqls);
if($results->num_rows > 0)
	{
    if($rows = $results->fetch_assoc())
       {
    	$trainingid=$rows["ID"];
		}
	}
//echo $trainingid;
		
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
<th>Name of Code</th>
<th>Name of Teacher</th>
<th>Contact No.</th>
<th>Name of School</th>
<th>Local Government</th>
<th>District</th>
<th>Start Date</th>
<th>End Date</th>
<th>Remark</th>

<th></th>
</tr>
<?php
$sn=1;
$sql1 = "SELECT teacherid,schoolcode,sdate,edate FROM tblttraining where trainingid='$trainingid'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
	while($row = $result->fetch_assoc())
    {
	$tcode=$row["teacherid"];
	$scode=$row["schoolcode"];
		$sqlt = "SELECT tname,tcontact FROM tblteacher where teachercode='$tcode'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	if($rowt = $resultt->fetch_assoc())
    	   {
		   $contact=$rowt["tcontact"];
		   $tname=$rowt["tname"];
		   }
		}
		$sqlt = "SELECT schoolname,munvdc,district FROM tblschool where schoolcode='$scode'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   			{
	    	if($rowt = $resultt->fetch_assoc())
    		   {
			   $sname=$rowt["schoolname"];
			   $mun=$rowt["munvdc"];
			   $district=$rowt["district"];
		   		}
			}
    echo "<tr>";
	echo "<td align=center>". $sn . "</td>";
	echo "<td align=center>" . $tcode . "</td>";
	echo "<td align=center>" . $tname . "</td>";
	echo "<td align=center>" . $contact . "</td>";
    echo "<td>" . $sname . "</td>";
	echo "<td>" . $mun . "</td>";
	echo "<td>" . $district . "</td>";
	echo "<td>" . $row["sdate"] . "</td>";
    echo "<td>" . $row["edate"] . "</td>";
	$sn++;
	}
}
?>
</body>
</html>
