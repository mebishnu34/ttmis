<?php
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
$sname=$_POST['txtsname'];
$sa=$_POST['txtsaddress'];
$sc=$_POST['txtscontact'];
$un=$tname;
$g=$gender;
$ln=$tc;
$up=$_POST['txtpass'];
$ut="Other";
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $tc=="")
{
  header('Location: ../application.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblrequest where tname='$tname' and tcontact='$tc'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      header('Location: ../application.php?msg="Found Duplicate"');
    }
 else
  {
     $sql = "INSERT INTO tblrequest(tname, gender,dob, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolname, schooladdress, contact, category, remark) values('$tname', '$gender','$dob','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$sname','$sa', '$sc', 'Other','Request')";
     if (mysqli_query($conn, $sql))
         {
          header('Location: ../application.php?msg= "Saved Successfully"');
          }
      else
          {
			  $message= "Save_Civil_Request: " . $sql . "<br>" . mysqli_error($conn);
		  	  $mobileno="9851001482";
		      include("sms_code.php");
			  header('Location: ../application.php?msg= "Sorry,Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
