<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$code=$_POST['txtcode'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$d=$_POST['cmbdistrict1'];
$vdc=$_POST['cmbmv1'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$mobile=$_POST['txtmobile'];
$website=$_POST['txtwebsite'];
$authorize=$_POST['txtauthorize'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $code=="")
{
  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblschool where schoolcode='$code'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      header('Location: ../Admin/registration.php?msg="Found Duplicate"');
    }
 else
  {   $sql = "INSERT INTO tblschool(schoolname, schoolcode, address, munvdc, wardno, contact, mobileno, email, website, district, authorizeperson,loginname, spass, remark,importno) values('$tname','$code','$a','$vdc','$ward','$tc','$mobile','$email','$website','$d','$authorize','$code','$code','Running','0')";
       if (mysqli_query($conn, $sql))
         {
		 $message="TTMIS::Login Name:-" .$code."/Password:-".$code;
		 $mobileno=$mobile;
         include("sms_code.php");
		/* $args = http_build_query(array(
               'token' => 'v2_Xjrhjs7Ws3vjpRa4AvGNDrPIqr1.GIY8',
              'from'  => 'InfoSMS',
                'to'    => $mobile,
                'text'  => 'TTMIS::'));
               $url = "http://api.sparrowsms.com/v2/sms/";
             # Make the call using API.
               $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Response
             $response = curl_exec($ch);
             $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
             curl_close($ch);   
			*/
          header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "save_school: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/registration.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
