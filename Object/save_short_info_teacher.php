<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$gender="";
$schoolname=$_POST['cmbschool'];
$d=$_POST['cmbdistrict1'];
$vdc=$_POST['cmbmv1'];
//echo $schoolname;
$sql1 = "SELECT * FROM tblschool where schoolname='$schoolname' and munvdc='$vdc' and district='$d'";
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
$cast="";
$tong="";
$citizen="";
$rollno="";
$dob="";
$fname="";
$a="";
$email="";
$ward="";
$tc=$_POST['txtcontact'];
$adate="";
$atype="";
$level="";

$tlevel="";
$qualification="";
$faculty="";
$msubject="";
$tsubject="";
$apsubject="";
$tid=$_POST['txtcode'];
$un=$tid;
$g="";
$ut="Teacher";
//  exit;

//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($scode<>0 or $scode<>"")
{
$sqls = "SELECT * FROM tblschool where schoolcode='$scode'";
$results = $conn->query($sqls);
if($results->num_rows>0)
{
    $sql = "INSERT INTO tblteacher(teachercode,tname, gender,cast,mothertong,citizenship, sheetroll,subject,loginname, tpass,dob,fathername, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, scode,schoolname,schooladdress,province,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark, importno,username) values('$tid','$tname', '$gender','$cast','$tong','$citizen','$rollno','$apsubject','$tid','$tid','$dob','$fname','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$schoolname','','','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Working','0','')";
    if (mysqli_query($conn, $sql))
        {
    	  //$message="TTMIS::Login Name:-".$ln." and Password:-".$tid;
	 	  //$mobileno=$tc;
       	  //include("sms_code.php");
          header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
        }
    else
        {
         $message= "Save_Teacher" . $sql . "<br>" . mysqli_error($conn);
			 // $mobileno="9851001482";
		     //include("sms_code.php");
		    // header('Location: ../Admin/registration.php?msg= "Sorry,Try Later..."');
       echo "Hello";
		   echo $message;
        }
}
else
{
header('Location: ../Admin/registration.php?msg="Invalid School Code"');
}
}
else
{
  header('Location: ../Admin/registration.php?msg="Invalid School Code"');
}
mysqli_close($conn);
?>
