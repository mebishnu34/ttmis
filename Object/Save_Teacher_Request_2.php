<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$dob=$_POST['txtdob'];
$cast=$_POST['cmbcast'];
$mothertong=$_POST['txttong'];
$citizen=$_POST['txtcitizenshipno'];
$rollno=$_POST['txtsheetroll'];
$stream=$_POST['txtstream'];
$fathername=$_POST['txtfathername'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
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
$apsubject=$_POST['cmbapsubject'];
$un=$tname;
$g=$gender;
$ut="Teacher";
$rem=$_POST['cmbremark'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tid<>"" and $tname=="" and $tc=="" and $scode=="" and $up<>"" and $level<>"" and $adate<>"" and $apsubject<>"")
{
  header('Location: ../school_application.php?msg="Fields Are Required"');
}
else
{
	$sqls = "SELECT * FROM tblschool where schoolcode='$scode'";
	$results = $conn->query($sqls);
	if($results->num_rows>0)
		{
 /* to update in tblregreauest
 $sql1 = "SELECT * FROM tblregrequest where teacherid='$tid'";
 $result = $conn->query($sql1);
 if ($result->num_rows > 0)
      {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	 
           $sql = "UPDATE tblregrequest set tname='$tname', gender='$gender',upass='$up',dob='$dob', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Request' where teachercode='$tcode'";
		  	 */
			 // To Direct update in tblteacher
			 $sql = "UPDATE tblteacher set tname='$tname', gender='$gender',cast='$cast',mothertong='$mothertong',citizenship='$citizen',sheetroll='$rollno',stream='$stream',fathername='$fathername', dob='$dob', address='$a', email='$email', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level',subject='$apsubject', scode='$scode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject',remark='$rem' where teacherid='$tid'";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../school_application.php?msg= "Update Successfully"');
              }
              else
              {
			  $message= "Save_Teacher_Request" . $sql . "<br>" . mysqli_error($conn);
		  	$mobileno="9851001482";
		  	include("sms_code.php");
               header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
              }
  		}
 		/*
		else
            {
               $sql = "INSERT INTO tblregrequest(teachercode,tname, gender,dob, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolcode,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark,upass) values('$tcode','$tname', '$gender','$dob','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Request','$up')";
             if (mysqli_query($conn, $sql))
              {
              header('Location: ../application.php?msg= "Saved Successfully"');
              }
              else
              {
              $message= "Save_Teacher_Request" . $sql . "<br>" . mysqli_error($conn);
		  	$mobileno="9851001482";
		  	include("sms_code.php");
               header('Location: ../application.php?msg= "Sorry, Try Later..."');
              }
            }
		}*/
		else
		{
		header('Location: ../school_application.php?msg="Invalid School Code"');
		}
}
mysqli_close($conn);
?>
