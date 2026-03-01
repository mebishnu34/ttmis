<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$gender=$_POST['gender'];
$schoolname=$_POST['cmbschool'];
$scode="";
$d=$_POST['cmbdistrict'];
$vdc=$_POST['cmbmv'];
$sqls = "SELECT schoolcode FROM tblschool where schoolname='$schoolname' and munvdc='$vdc' and district='$d'
$vdc=$_POST['cmbmv1'];";
$results = $conn->query($sqls);
if($results->num_rows>0)
 {
 if($row = mysqli_fetch_array($results))
	{
		$scode=$row["schoolcode"];
	}
}
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
  header('Location: ../municipality_application.php?msg="Fields Are Required"');
}
else
{
$sqls = "SELECT schoolcode FROM tblschool where schoolcode='$scode'";
$results = $conn->query($sqls);
if($results->num_rows>0)
{
 $sql1 = "SELECT tcontact FROM tblteacher where tcontact='$tc'";
 $result = $conn->query($sql1);
         if ($result->num_rows > 0)
         {
             $sql = "UPDATE tblteacher set tname='$tname', gender='$gender', cast='$cast',mothertong='$tong',citizenship='$citizen',sheetroll='$rollno',subject='$apsubject',loginname='$tid', tpass='$tid',dob='$dob',fathername='$fname', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',teachercode='$tid',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Working' where tcontact='$tc'";
             if (mysqli_query($conn, $sql))
              {
			  $message="TTMIS::Login Name:-".$ln." and Password:-".$tid;
		 	  $mobileno=$tc;
         	  include("sms_code.php");
               header('Location: ../municipality_application.php?msg= "Update Successfully"');
              }
              else
              {
              echo $message= "Save_Teacher" . $sql . "<br>" . mysqli_error($conn);
			 
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../municipality_application.php?msg= "Sorry,Try Later..."');
              }
          }
          else
            {
             $sql = "INSERT INTO tblteacher(teachercode,tname, gender,cast,mothertong,citizenship, sheetroll,subject,loginname, tpass,dob,fathername, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, scode,schoolname,schooladdress,province,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark, importno,username,teachertype,stream,rank,position,contact) values('$tid','$tname', '$gender','$cast','$tong','$citizen','$rollno','$apsubject','$tid','$tid','$dob','$fname','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$schoolname','','','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Working','0','','','','','','')";
             if (mysqli_query($conn, $sql))
              {
			  $message="TTMIS::Login Name:-".$ln." and Password:-".$tid;
		 	  $mobileno=$tc;
         	  include("sms_code.php");
             header('Location: ../municipality_application.php?msg= "Saved Successfully"');
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
header('Location: ../municipality_application.php?msg="Invalid School Code"');
}
}
mysqli_close($conn);
?>
