<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$d=$_POST['cmbdistrict1'];
$vdc=$_POST['cmbmv1'];
$schoolname=$_POST['cmbschool'];
$sql1 = "SELECT * FROM tblschool where schoolname='$schoolname' and munvdc='$vdc' and district='$d'";";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
		{
		$scode=$row["schoolcode"];
	}
	}
	//echo $scode;
//exit;
$cast=$_POST['cmbcast'];
$tong=$_POST['txttong'];
$citizen=$_POST['txtcitizenshipno'];
$rollno=$_POST['txtsheetroll'];
$dob=$_POST['txtdob'];
$fname=$_POST['txtfathername'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$adate=$_POST['txtad'];
$atype=$_POST['cmbtype'];
$level=$_POST['cmblevel'];

$tlevel=$_POST['cmbteachinglevel'];
$qualification=$_POST['cmbqualification'];
$faculty=$_POST['cmbfaculty'];
$msubject=$_POST['cmbmajorsubject'];
$tsubject=$_POST['cmbteachingsubject'];
$apsubject=$_POST['cmbapsubject'];
$tid=$_POST['txtcode'];
$un=$tname;
$g=$gender;
$ut="Teacher";
  //exit;

//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $tc=="" and $scode=="" and $tid=="")
{
  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
}
else
{
$sqls = "SELECT * FROM tblschool where schoolcode='$scode'";
$results = $conn->query($sqls);
if($results->num_rows>0)
{
 $sql1 = "SELECT * FROM tblteacher where teachercode='$tid' and tcontact='$tc'";
 $result = $conn->query($sql1);
         if ($result->num_rows > 0)
         {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

          $sql = "UPDATE tblteacher set tname='$tname', gender='$gender', cast='$cast',mothertong='$tong',subject='$apsubject',loginname='$tid', tpass='$tid',dob='$dob',fathername='$fname', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Working' where teachercode='$tid' or tcontact='$tc'";
             if (mysqli_query($conn, $sql))
              {
			  $message="TTMIS::Login Name:-".$ln." and Password:-".$tid;
		 	  $mobileno=$tc;
         	  include("sms_code.php");
               header('Location: ../Admin/registration.php?msg= "Update Successfully"');
              }
              else
              {
              $message= "Save_Teacher" . $sql . "<br>" . mysqli_error($conn);
			 
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/registration.php?msg= "Sorry,Try Later..."');
              }
          }
          else
            {
             $sql = "INSERT INTO tblteacher(teachercode,tname, gender,cast,mothertong,citizenship, sheetroll,subject,loginname, tpass,dob,fathername, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, scode,schoolname,schooladdress,province,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark, importno,username) values('$tid','$tname', '$gender','$cast','$tong','$citizen','$rollno','$apsubject','$tid','$tid','$dob','$fname','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$schoolname','','','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Working','0','')";
             if (mysqli_query($conn, $sql))
              {
			  $message="TTMIS::Login Name:-".$ln." and Password:-".$tid;
		 	  $mobileno=$tc;
         	  include("sms_code.php");
             header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
              }
              else
              {
              $message= "Save_Teacher" . $sql . "<br>" . mysqli_error($conn);
			  $mobileno="9851001482";
		     include("sms_code.php");
		     //header('Location: ../Admin/registration.php?msg= "Sorry,Try Later..."');
		   echo $message;
              }
             }

}
else
{
header('Location: ../Admin/registration.php?msg="Invalid School Code"');
}
}
mysqli_close($conn);
?>
