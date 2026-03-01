<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$dob=$_POST['txtdob'];
$cast=$_POST['cmbcast'];
$mothertong=$_POST['txttong'];
$citizen=$_POST['txtcitizenshipno'];
$rollno=$_POST['txtsheetroll'];
$stream=$_POST['txtstream'];
$fathername=$_POST['txtfathername'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$adate=$_POST['txtad'];
$atype=$_POST['cmbtype'];
$level=$_POST['cmblevel'];
$scode=$_POST['txtcode'];
$tlevel=$_POST['cmbteachinglevel'];
$qualification=$_POST['cmbqualification'];
$faculty=$_POST['cmbfaculty'];
$msubject=$_POST['cmbmajorsubject'];
$tsubject=$_POST['cmbteachingsubject'];
$apsubject=$_POST['cmbapsubject'];
$un=$tname;
$g=$gender;
$ut="Teacher";
$rem=$_POST['cmbremark'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($rem=="Working")
{
	if($tid<>"" and $tname=="" and $tc=="" and $scode=="" and $up<>"" and $level<>"" and $adate<>"" and $apsubject<>"")		
	{
  		header('Location: ../application.php?msg="Fields Are Required"');
	}
	else
	{
		$sqls = "SELECT * FROM tblschool where schoolcode='$scode'";
		$results = $conn->query($sqls);
		if($results->num_rows>0)
			{
 		 	$sql = "UPDATE tblteacher set tname='$tname', gender='$gender',cast='$cast',mothertong='$mothertong',citizenship='$citizen',sheetroll='$rollno',stream='$stream',fathername='$fathername', dob='$dob', address='$a', email='$email', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level',subject='$apsubject', scode='$scode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject' where teacherid='$tid'";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../municipality/teacher_update.php?msg= "Update Successfully"');
              }
              else
              {
			  $message= "Save_Teacher_Request" . $sql . "<br>" . mysqli_error($conn);
		  	$mobileno="9851001482";
		  	include("sms_code.php");
               header('Location: ../municipality/teacher_update.php?msg= "Sorry, Try Later..."');
              }
  			}
 		else
			{
			header('Location: ../municipality/teacher_update.php?msg="Invalid School Code"');
			}
	}
}
else
{
	$sql = "UPDATE tblteacher set remark='$rem' where teacherid='$tid'";
    if (mysqli_query($conn, $sql))
       {
        header('Location: ../municipality/teacher_update.php?msg= "Update Successfully"');
       }
    else
       {
		$message= "Update Teacher" . $sql . "<br>" . mysqli_error($conn);
		$mobileno="9851001482";
		include("sms_code.php");
        header('Location: ../municipality/teacher_update.php?msg= "Sorry, Try Later..."');
       }
}
mysqli_close($conn);
?>
