<?php
session_start();
$scode=$_SESSION['code'];
$tdate=$_SESSION['$tdate'];
//include("object_include.php");
include("../Processing/db_connection.php");
$subject=$_POST['txtsubject'];
$message=$_POST['txtmessage'];
$level=$_POST['cmblevel'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($subject=="" and $message=="")
{
  header('Location: ../achool_application.php?msg="Fields Are Required"');
}
else
	{
     $sql= "INSERT INTO tblschoolrequest(schoolcode, subject, message, rdate,level) values('$scode','$subject','$message','$tdate','$level')";
        if (mysqli_query($conn, $sql))
         {
          header('Location: ../school_application.php?msg= "Saved Successfully"');
          }
      else
          {
		  $message= "Request By Teacher" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		 include("sms_code.php");
         header('Location: ../achool_application.php?msg= "Sorry, Try Later..."');
		 // echo $message;
          }
  }
mysqli_close($conn);
?>
