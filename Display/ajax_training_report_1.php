<?php
session_start();
include("../Processing/db_connection.php");
//echo "Hello...";
if (isset($_POST['looksubject'])) 
{
//Search box value assigning to $Name variable.
        $subject = $_POST['looksubject'];
		//echo $subject;
		//echo $_SESSION['trainingname'];
		//echo $_SESSION['level'];
   //echo $level;
   //Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
	if($subject=="All")
	{
		?>
		<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
		<table width="100%"  class="table_design" bgcolor="#FFFFFF">
		<tr>
		<th align="center" colspan="10">Name of Training:<?php echo $_SESSION['trainingname'];?> Level:<?php echo $_SESSION['level'];?></th>
		</tr>
		<tr>
		<th align="center">S.No</th>
		<th align="center">Teacher Code</th>
		<th>Name of Teacher</th>
		<th>Name of School</th>
		<th>Local Govn.</th>
		<th>Subject</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Remark</th>
		<th></th>
		</tr>
   		<?php
		$schoolname="";
		$tname="";
		$sn=1;
		$sqltr = "SELECT * FROM tbltraining where trainingname='".$_SESSION['trainingname']."' and level='".$_SESSION['level']."'";
		$resulttr = $conn->query($sqltr);
		if($resulttr->num_rows > 0)
			{
			while($rowtr = $resulttr->fetch_assoc())
				{
				$trainingid=$rowtr["ID"];
				//echo $trainingid;
				$sqlt = "SELECT teacherid, schoolcode, munid,sdate, edate, training FROM tblttraining where trainingid='".$trainingid."' ORDER BY ID";
				$resultt = $conn->query($sqlt);
				if($resultt->num_rows > 0)
	   				{
	    			while($rowt = $resultt->fetch_assoc())
	    	   			{
			  		 	$tcode=$rowt["teacherid"];
			   		 	$scode=$rowt["schoolcode"];
						$munid=$rowt["munid"];
			   		//echo $tcode;
			   		//echo $d;
					$sqlm = "SELECT munvdc FROM tbldistrict where ID='$munid'";
					$resultm = $conn->query($sqlm);
					if($resultm->num_rows > 0)
						{
							if($mdata = $resultm->fetch_assoc())
								{
							 	$munname=$mdata["munvdc"];
								//echo $schoolname;
								//$sql1 = "SELECT * FROM tblteacher where munvdc='".$d."' and teachercode='".$tcode."'";
								}
						}
			   				      		 	//$sql1 = "SELECT * FROM tblteacher where munvdc='".$d."' and teachercode='".$tcode."'";
			   			$sql1 = "SELECT * FROM tblteacher where teachercode='$tcode'";
			   			$result = $conn->query($sql1);
			   				if ($result->num_rows > 0)
   								{
			    				if($row = $result->fetch_assoc())
				    				{
									$tname=$row["tname"];
									//echo $tname;
						 			}
								}
						$sqls = "SELECT schoolname FROM tblschool where schoolcode='$scode'";
						$results = $conn->query($sqls);
						if($results->num_rows > 0)
							{
								if($sdata = $results->fetch_assoc())
									{
								 	$schoolname=$sdata["schoolname"];
									}
   							}
						echo "<tr>";
						echo "<td align=center>". $sn . "</td>";
						echo "<td align=center>" . $tcode . "</td>";
						echo "<td>" . $tname . "</td>";
						echo "<td>" . $schoolname . "</td>";
						echo "<td>" . $munname . "</td>";
						echo "<td>" . $rowtr["subject"] . "</td>";
						echo "<td>" . $rowt["sdate"] . "</td>";
						echo "<td>" . $rowt["edate"] . "</td>";
						echo "<td>" . $rowt["training"] . "</td>";
						echo "</tr>";
		    			$sn++;
		   			}
				}
    		}
		}
	}
else
	{
?>
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
	<table width="100%"  class="table_design" bgcolor="#FFFFFF">
	<tr>
	<th align="center" colspan="9">Name of Training:<?php echo $_SESSION['trainingname'];?> Level:<?php echo $_SESSION['level'];?> Subject:<?php echo $subject;?></th>
	</tr>
	<tr>
	<th align="center">S.No</th>
	<th align="center">Teacher Code</th>
	<th>Name of Teacher</th>
	<th>Name of School</th>
	<th>Local Govn.</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Remark</th>
	<th></th>
	</tr>
   <?php
	$schoolname="";
	$tname="";
	$sn=1;
	$sqltr = "SELECT * FROM tbltraining where trainingname='".$_SESSION['trainingname']."' and subject='".$subject."' and level='".$_SESSION['level']."'";
	$resulttr = $conn->query($sqltr);
	if($resulttr->num_rows > 0)
		{
		if($rowtr = $resulttr->fetch_assoc())
			{
			$trainingid=$rowtr["ID"];
			//echo $trainingid;
			$sqlt = "SELECT teacherid, schoolcode, munid,sdate, edate, training FROM tblttraining where trainingid='".$trainingid."' ORDER BY ID";
			$resultt = $conn->query($sqlt);
			if($resultt->num_rows > 0)
	   			{
	    		while($rowt = $resultt->fetch_assoc())
	    	   		{
			  		 $tcode=$rowt["teacherid"];
			   		 $scode=$rowt["schoolcode"];
					 $munid=$rowt["munid"];
			   		//echo $tcode;
			   		//echo $d;
					$sqlm = "SELECT munvdc FROM tbldistrict where ID='$munid'";
					$resultm = $conn->query($sqlm);
					if($resultm->num_rows > 0)
						{
							if($mdata = $resultm->fetch_assoc())
								{
							 	$munname=$mdata["munvdc"];
								//echo $schoolname;
								//$sql1 = "SELECT * FROM tblteacher where munvdc='".$d."' and teachercode='".$tcode."'";
								}
						}
					$sqls = "SELECT schoolname FROM tblschool where schoolcode='$scode'";
					$results = $conn->query($sqls);
					if($results->num_rows > 0)
						{
							if($sdata = $results->fetch_assoc())
								{
							 	$schoolname=$sdata["schoolname"];
								//echo $schoolname;
								//$sql1 = "SELECT * FROM tblteacher where munvdc='".$d."' and teachercode='".$tcode."'";
								}
						}
						 $sql1 = "SELECT * FROM tblteacher where teachercode='$tcode'";
			   			 $result = $conn->query($sql1);
			   			if ($result->num_rows > 0)
   							{
			    				if($row = $result->fetch_assoc())
				    				{
									$tname=$row["tname"];
										//echo $tname;
									}
							}
						
						echo "<tr>";
						echo "<td align=center>". $sn . "</td>";
						echo "<td align=center>" . $tcode . "</td>";
						echo "<td>" . $tname . "</td>";
						echo "<td>" . $schoolname . "</td>";
						echo "<td>" . $munname . "</td>";
						echo "<td>" . $rowt["sdate"] . "</td>";
						echo "<td>" . $rowt["edate"] . "</td>";
						echo "<td>" . $rowt["training"] . "</td>";
						echo "</tr>";
						$sn++;
					}
				}
    		}
		}
	}
}
?>
</table>
