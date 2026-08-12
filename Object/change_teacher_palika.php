<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$d=$_POST['cmbdistrict1'];
$vdc=$_POST['cmbmv1'];
$schoolname=$_POST['cmbschool'];
$rem=$_POST['cmbremark'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tid<>"")
{
  	$sqls = "SELECT schoolcode FROM tblschool where schoolname='$schoolname' and district='$d' and munvdc='$vdc'";
	$results = $conn->query($sqls);
	if($results->num_rows>0)
		{
			if($row = mysqli_fetch_array($results))
			{
				$scode=$row["schoolcode"];
			 	$sql = "UPDATE tblteacher set scode='$scode', schoolname='$schoolname',district='$d', munvdc='$vdc',remark='$rem' where teacherid='$tid'";
             	if (mysqli_query($conn, $sql))
              		{
              		header('Location: ../municipality/teacher_palika_update.php?msg= "Update Successfully"');
              		}
              else
              		{
			  		$message= "Save_Teacher_Request" . $sql . "<br>" . mysqli_error($conn);
		  			$mobileno="9851001482";
		  			include("sms_code.php");
               		header('Location: ../municipality/teacher_palika_update.php?msg= "Sorry, Try Later..."');
              		}
			}
  		}
 	else
		{
		header('Location: ../municipality_application.php?msg="Invalid School Code"');
		}
}
mysqli_close($conn);
?>
