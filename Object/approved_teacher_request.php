<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['teacherid'];
$rid=$_POST['reqid'];
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
$scode=$_POST['txtcode'];
$tlevel=$_POST['cmbteachinglevel'];
$qualification=$_POST['cmbqualification'];
$faculty=$_POST['cmbfaculty'];
$msubject=$_POST['cmbmajorsubject'];
$tsubject=$_POST['cmbteachingsubject'];
$up=$_POST['txtpass'];
$un=$tc;
$g=$gender;
$ut="Teacher";
//echo $ln;
//exit;
$sqlid = "SELECT max(teacherid) FROM tblteacher where teacherid<>'$tid'";
$resultid = $conn->query($sqlid);
         if ($resultid->num_rows > 0)
         {
    // output data of each row
   while($row = $resultid->fetch_assoc())
               {
               $tid=$row['max(teacherid)']+1;
               $tcode=$scode.$tid;
               $ln=$tid;
              // echo $tcode;
               }
   }
  // exit;

//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $tc=="" and $scode=="")
	{
	  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
	}
else
	{
		$sqls = "SELECT * FROM tblschool where ID='$scode'";
		$results = $conn->query($sqls);
		if($results->num_rows>0)
		{
			 $sql1 = "SELECT * FROM tblteacher where teacherid='$tid'";
			 $result = $conn->query($sql1);
	        if ($result->num_rows > 0)
    	     {
			    // output data of each row
                if($up=="")
                {
                $pass=$scode.$tid;
                }
                else
                {
                $pass=$up;
                }
                              //id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    mysqli_query($conn,"UPDATE tblregrequest set remark='Approved' where id='$rid'");
                     $sql = "UPDATE tblteacher set tname='$tname', gender='$gender',loginname='$ln',tpass='$pass',dob='$dob', address='$a', email='$email',district='$d', munvdc='$vdc', wardno='$ward',tcontact='$tc', appointdate='$adate', appointtype='$atype',workinglevel='$level', schoolcode='$scode',teachercode='$tcode',category='Teacher',teachinglevel='$tlevel', qualification='$qualification', faculty='$faculty', majorsubject='$msubject', teachingsubject='$tsubject', remark='Approved' where teacherid='$tid'";
                     if (mysqli_query($conn, $sql))
                     {
					 	$message="TTMIS::You are approved. Your Login Name:-".$ln." and Password:-".$pass;
		 				$mobileno=$tc;
         				include("sms_code.php");
                        header('Location: ../Admin/registration.php?msg= "Update Successfully"');
                       }
            	  else
              		{
		              $message= "approved_teacher_request" . $sql . "<br>" . mysqli_error($conn);
		  			  $mobileno="9851001482";
					  include("sms_code.php");
			  		  header('Location: ../Admin/registration.php?msg= "Sorry, Try Later..."');
              		}

          	}
	else
       {
        if($up=="")
          {
            $pass=$scode.$tid;
          }
        else
          {
            $pass=$up;
          }
             $sql = "INSERT INTO tblteacher(tname, gender,loginname, tpass,dob, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolcode,teachercode,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark) values('$tname', '$gender','$tid','$pass','$dob','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$scode','$tcode','Teacher','$tlevel', '$qualification', '$faculty', '$msubject', '$tsubject','Approved')";
             if (mysqli_query($conn, $sql))
              {
                $message="TTMIS::Login Name:-".$ln." and Password:-".$pass;
		 		$mobileno=$tc;
         		include("sms_code.php");
				      // echo $tc;
             mysqli_query($conn,"UPDATE tblregrequest set remark='Approved', teacherid='$tid' where id='$rid'");
             header('Location: ../Admin/registration.php?msg= "Saved Successfully"');

              }
              else
              {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
