<?php
session_start();
$id=$_SESSION['tid'];
$tdate=$_SESSION['$tdate'];
//include("object_include.php");
include("../Processing/db_connection.php");
$subject=$_POST['txtsubject'];
$message=$_POST['txtmessage'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($subject=="" and $message=="")
{
  header('Location: ../application.php?msg="Fields Are Required"');
}
else
	{
     $sql= "INSERT INTO tbllocalgovrequest(localgovid, subject, message, rdate) values('$id','$subject','$message','$tdate')";
        if (mysqli_query($conn, $sql))
         {
          header('Location: ../municipality_application.php?msg= "Saved Successfully"');
          }
      else
          {
		  $message= "Request By Teacher" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		 include("sms_code.php");
         header('Location: ../municipality_application.php?msg= "Sorry, Try Later..."');
		 // echo $message;
          }
  }
mysqli_close($conn);
?>
