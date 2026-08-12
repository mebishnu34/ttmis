<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$dob=$_POST['txtdob'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$d=$_POST['cmbdistrict'];
$vdc=$_POST['cmbmv'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$adate=$_POST['txtad'];
$atype=$_POST['cmbtype'];
$level=$_POST['cmblevel'];
$scode=$_SESSION['code'];
$tlevel=$_POST['cmbteachinglevel'];
$qualification=$_POST['cmbqualification'];
$faculty=$_POST['cmbfaculty'];
$msubject=$_POST['cmbmajorsubject'];
$tsubject=$_POST['cmbteachingsubject'];
$un=$tname;
$g=$gender;
$ln=$tc;
$ut="Teacher";
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $tc=="" and $scode=="")
{
  header('Location: ../school_application.php?msg="Fields Are Required"');
}
else
{
$sqls = "SELECT * FROM tblschool where ID='$scode'";
$results = $conn->query($sqls);
if($results->num_rows>0)
{
 $sql1 = "SELECT * FROM tblregrequest where tname='$tname' and tcontact='$tc'";
 $result = $conn->query($sql1);
         if ($result->num_rows > 0)
         {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
           $sql = "UPDATE tblregrequest set tname='$tname', gender='$gender',dob='$dob', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',teachercode='$tcode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Approved' where tname='$tname' and tcontact='$tc'";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../school_application.php?msg= "Update Successfully"');
              }
              else
              {
              $message= "Save_Teacher_from_school" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../school_application.php?msg= "Sorry,Try Later..."');
              }
           }
          else
            {
             $sql = "INSERT INTO tblregrequest(teacherid,tname, gender,dob, address,fathername, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolcode,teachercode,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark,upass) values('0','$tname', '$gender','$dob','$a','','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$tcode','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Request','')";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../school_application.php?msg= "Saved Successfully"');
              }
              else
              {
              $message= "Save_Teacher_from_school" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		 include("sms_code.php");
		 header('Location: ../school_application.php?msg= "Sorry,Try Later..."');
		 // echo $message;
              }
             }

}
else
{
header('Location: ../school_application.php?msg="Invalid School Code"');
}
}
mysqli_close($conn);
?>
