<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$rem=$_POST['cmbremark'];
$schoolname=$_POST['cmbschool'];
$scode="";
$sqls = "SELECT schoolcode FROM tblschool where schoolname='$schoolname'";
$results = $conn->query($sqls);
if($results->num_rows>0)
 {
 if($row = mysqli_fetch_array($results))
	{
		$scode=$row["schoolcode"];
	}
}
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tid<>"")
{
  	$sqls = "SELECT munvdc, district FROM tblschool where schoolcode='$scode'";
	$results = $conn->query($sqls);
	if($results->num_rows>0)
		{
			if($row = mysqli_fetch_array($results))
			{
				$vdc=$row["munvdc"];
				$d=$row["district"];
			 	$sql = "UPDATE tblteacher set scode='$scode', schoolname='$schoolname',district='$d', munvdc='$vdc',remark='$rem' where teacherid='$tid'";
             	if (mysqli_query($conn, $sql))
              		{
              		header('Location: ../school/teacher_school_update.php?msg= "Update Successfully"');
              		}
              else
              		{
			  		$message= "Save_Teacher_Request" . $sql . "<br>" . mysqli_error($conn);
		  			$mobileno="9851001482";
		  			include("sms_code.php");
               		header('Location: ../school/teacher_school_update.php?msg= "Sorry, Try Later..."');
              		}
			}
  		}
 	else
		{
		header('Location: ../school_application.php?msg="Invalid School Code"');
		}
}
mysqli_close($conn);
?>
