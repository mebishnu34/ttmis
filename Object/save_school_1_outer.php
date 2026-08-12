<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$code=$_POST['txtcode'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$mobile=$_POST['txtmobile'];
$website=$_POST['txtwebsite'];
$authorize=$_POST['txtauthorize'];
$d=$_SESSION['dname'];
$vdc=$_SESSION['uname'];

//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $code=="")
{
  header('Location: ../municipality_application.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblschool where schoolcode='$code'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
      header('Location: ../index.php?msg="Found Duplicate"');
    }
 else
  {   $sql = "INSERT INTO tblschool(schoolname, schoolcode, address, munvdc, wardno, contact, mobileno, email, website, district, authorizeperson,loginname, spass, remark,importno) values('$tname','$code','$a','$vdc','$ward','$tc','$mobile','$email','$website','$d','$authorize','$code','$code','Running','0')";
       if (mysqli_query($conn, $sql))
         {
		 $message="TTMIS::Login Name:-" .$code."/Password:-".$code;
		 $mobileno=$mobile;
         include("sms_code.php");
	          header('Location: ../index.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "save_school: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../index.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
