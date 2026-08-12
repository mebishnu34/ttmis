<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$scode=$_POST['txtcode'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $code=="")
{
  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
}
else
{
   $sql = "UPDATE tblschool set schoolname='$tname' where ID='$scode'"; 
       if (mysqli_query($conn, $sql))
         {
		 //$message="TTMIS::Login Name:-" .$code."/Password:-".$code;
		 echo "Update Successfully";
          }
      else
          {
          $message= "save_school: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  echo "Sorry, Try Later...";
          }
  }
mysqli_close($conn);
?>
