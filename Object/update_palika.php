<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$scode=$_POST['txtcode'];
$ward=$_POST['txtwn'];
$rem=$_POST['cmbremark'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($_SESSION['dname']<>"" and $_SESSION['uname']<>"")
{
  $sql = "UPDATE tblschool set district='$_SESSION[dname]',munvdc='$_SESSION[uname]', wardno='$ward',remark='$rem' where schoolcode='$scode'";
  if (mysqli_query($conn, $sql))
         {
           header('Location: ../municipality/update_school_palika_1.php?msg= "Update Successfully"');
         }
       else
         {
          $message= "update_Palika" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  echo $message;
		  //include("sms_code.php");
		  //header('Location: ../municipality_application.php?msg= "Sorry, Try Later..."');
          }
}
else
{
   	header('Location: ../municipality/update_school_palika_1.php?msg= "Fields Are Required"');
}
mysqli_close($conn);
?>
