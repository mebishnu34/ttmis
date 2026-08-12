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
$scode=$_POST['txtcode'];
$newscode=$_POST['txtnewcode'];
$rem=$_POST['cmbremark'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $ln=="" and $up=="")
{
  header('Location: ../municipality_application.php?msg="Fields Are Required"');
}
else
{
       $sql1 = "SELECT schoolcode FROM tblschool where schoolcode='$newscode'";
        $result = $conn->query($sql1);
        if (($result->num_rows > 0) and $newscode<>$scode)
            {
          header('Location: ../municipality_application.php?msg= "Found Duplicate"');
            }
 else
 {
      if($rem=="Running")
	  { 
      $sql = "UPDATE tblschool set schoolname='$tname',schoolcode='$newscode', address='$a', wardno='$ward', contact='$tc', mobileno='$mobile', email='$email', website='$website', authorizeperson='$authorize',loginname='$ln', spass='$up' where schoolcode='$scode'";
      if (mysqli_query($conn, $sql))
         {
           	mysqli_query($conn,"UPDATE tblteacher set scode='$newscode' where scode='$scode'");
			mysqli_query($conn,"UPDATE tblregrequest set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tblmuncipalityinfo set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tblschooldocument set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tblschoolinfo set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tblschoolrequest set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tbltrainingrequest set schoolcode='$newscode' where schoolcode='$scode'");
			mysqli_query($conn,"UPDATE tbltraining set schoolcode='$newscode' where schoolcode='$scode'");
          header('Location: ../municipality_application.php?msg= "Update Successfully"');
          }
       else
         {
          $message= "update_school_info" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  echo $message;
		  //include("sms_code.php");
		  //header('Location: ../municipality_application.php?msg= "Sorry, Try Later..."');
          }
		}
	else
		{
		$sql = "UPDATE tblschool set remark='$rem' where schoolcode='$scode'";
      if (mysqli_query($conn, $sql))
         {
           	header('Location: ../municipality_application.php?msg= "Update Successfully"');
          }
       else
         {
          $message= "update_school_info" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  echo $message;
		  //include("sms_code.php");
		  //header('Location: ../municipality_application.php?msg= "Sorry, Try Later..."');
          }
		}
		 
 }
}
mysqli_close($conn);
?>
