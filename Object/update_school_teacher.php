<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$dob=$_POST['txtdob'];
$fname=$_POST['txtfathername'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$d=$_POST['cmbdistrict'];
$vdc=$_POST['cmbmv'];
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
$un=$tname;
$g=$gender;
$ln=$tc;
$up=$_POST['txtpass'];
$ut="Teacher";
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $tc=="" and $scode=="")
{
  header('Location: ../school_application.php?msg="Fields Are Required"');
}
else
{
$sqls = "SELECT * FROM tblschool where schoolcode='$scode'";
$results = $conn->query($sqls);
if($results->num_rows>0)
{
          $sql1 = "SELECT * FROM tblregrequest where teacherid='$tid'";
           $result = $conn->query($sql1);
         if ($result->num_rows > 0)
         {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
           $sql = "UPDATE tblregrequest set tname='$tname', gender='$gender',dob='$dob', fathername='$fname', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',teachercode='$tcode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Request' where teacherid='$tid'";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../school_application.php?msg= "Update Successfully"');
              }
              else
              {
              $message= "update_school_teacher" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
              }
           }
          else
            {
             $sql = "INSERT INTO tblregrequest(tname, gender,dob,fathername, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolcode,teachercode,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark) values('$tname', '$gender','$dob','$fname','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$tcode','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Request')";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../school_application.php?msg= "Saved Successfully"');
              }
              else
              {
              $message= "update_school_teacher" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
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
