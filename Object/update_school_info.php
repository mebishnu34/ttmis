<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$ward=$_POST['txtward'];
$tc=$_POST['txtcontact'];
$mobile=$_POST['txtmobile'];
$website=$_POST['txtwebsite'];
$authorize=$_POST['txtauthorize'];
$up=$_POST['txtpass'];
$ln=$_POST['txtloginname'];
$scode=$_POST['txtscode'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $ln=="" and $up=="")
{
  header('Location: ../school_application.php?msg="Fields Are Required"');
}
else
{
       $sql = "UPDATE tblschool set schoolname='$tname', address='$a', wardno='$ward', contact='$tc', mobileno='$mobile', email='$email', website='$website', authorizeperson='$authorize',loginname='$ln', spass='$up' where schoolcode='$scode'";
      if (mysqli_query($conn, $sql))
         {
          header('Location: ../school_application.php?msg= "Update Successfully"');
          }
      else
          {
          $message= "update_school_info" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
          }
}
mysqli_close($conn);
?>
