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
  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblteacher where tname='$tname' and tcontact='$tc'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      header('Location: ../Admin/registration.php?msg="Found Duplicate"');
    }
 else
  {
     mysqli_query($conn,"INSERT INTO tbluser(uname, ugender, loginname, upass, utype) values('$un', '$g', '$ln', '$up','$ut')");
     $sql = "INSERT INTO tblteacher(tname, gender,dob, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, schoolname, schooladdress, contact, category, remark) values('$tname', '$gender','$dob','$a','$email','$d','$vdc', '$ward','$tc', '$adate','$atype','$level','$sname','$sa', '$sc', 'Other', 'Approved')";
       if (mysqli_query($conn, $sql))
         {
          header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
          }
      else
          {
		  $message= "Save_Civil" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
          header('Location: ../Admin/entry.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
