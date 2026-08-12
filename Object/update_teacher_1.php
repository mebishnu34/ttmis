<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$mobileno=$_POST['txtcontact'];
$code=$_POST['txtcode'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($mobileno=="" and $code=="")
{
  header('Location: ../Input/teacher_update_1.php?msg="Fields Are Required"');
}
else
{
   $sql = "UPDATE tblteacher set tcontact='$mobileno' where teachercode='$code'"; 
       if (mysqli_query($conn, $sql))
         {
		 //$message="TTMIS::Login Name:-" .$code."/Password:-".$code;
		 header('Location: ../Input/teacher_update_1.php?msg="Update Successfully"');
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
