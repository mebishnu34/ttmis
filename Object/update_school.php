<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tname=$_POST['txtname'];
$code=$_POST['txtmobile'];
$a=$_POST['txtaddress'];
$email=$_POST['txtemail'];
$d=$_POST['cmbdistrict1'];
$vdc=$_POST['cmbmv1'];
$ward=$_POST['txtwn'];
$tc=$_POST['txtcontact'];
$mobile=$_POST['txtmobile'];
$website=$_POST['txtwebsite'];
$authorize=$_POST['txtauthorize'];
$id=$_POST['txtcode'];
$scode=$_POST['txtscode'];
//$teacherobject->saveteacher($tname, $gender,$dob,$a,$d,$vdc, $ward,$tc, $adate,$atype,$level,$sname,$sa, $sc);
//echo "Records Saved";
if($tname=="" and $code=="" and $mobile=="" and $id=="" and $scode=="")
{
  header('Location: ../Admin/registration.php?msg="Fields Are Required"');
}
else
{
     $sql = "UPDATE tblschool set schoolname='$tname',schoolcode='$scode', address='$a', munvdc='$vdc', wardno='$ward', contact='$tc', mobileno='$mobile', email='$email', website='$website', district='$d', authorizeperson='$authorize',loginname='$id', spass='$code' where ID='$id'"; 
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
          header('Location: ../Input/school_update.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "save_school: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Input/school_update.php?msg= "Sorry, Try Later..."');
          }
  }
mysqli_close($conn);
?>
