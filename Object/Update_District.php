<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$id=$_POST['txtid'];
//$dn=$_POST['cmbdistrict1'];
$mv=$_POST['txtmunvdc'];
$premv=$_POST['txtpremunvdc'];
$wn=$_POST['txtward'];
$up=$_POST['txtmobile'];
$mobile=$_POST['txtmobile'];
$person=$_POST['txtperson'];
$email=$_POST['txtemail'];
//$districtobject->savedistrict($dn, $mv, $wn);
//echo "Records Saved";
if($mv=="" and $up=="" and $mobile=="" and $premv=="")
{
 echo "Fields are Required";
}
else
{
     //$sql = "Update tbldistrict set districtname='$dn', munvdc='$mv', noofward='$wn',aperson='$person', mobileno='$mobile',mpass='$up' where ID='$id'";
	  $sql = "Update tbldistrict set munvdc='$mv', noofward='$wn',aperson='$person', mobileno='$mobile',mpass='$up',email='$email' where ID='$id'";
	  if (mysqli_query($conn, $sql))
         {
		  	mysqli_query($conn,"UPDATE tblteacher set munvdc='$mv' where munvdc='$premv'");
			mysqli_query($conn,"UPDATE tblschool set munvdc='$mv' where munvdc='$premv'");
			mysqli_query($conn,"UPDATE tblcontact set municipality='$mv' where municipality='$premv'");
			mysqli_query($conn,"UPDATE tblmuncipalityinfo set munvdc='$mv' where munvdc='$premv'");
			mysqli_query($conn,"UPDATE tblschoolinfo set munvdc='$mv' where munvdc='$premv'");
		 	$message="TTMIS::Login Name:-".$mv."/Password:-".$up;
			$mobileno=$mobile;
			include("sms_code.php");
			/*
         $args = http_build_query(array(
               'token' => 'MPfRv4Mk8MRDzGVyaLMA',
                'from'  => 'Demo',
                'to'    => $mobile,
                'text'  => 'TTMIS::Login Name:-'.$mv.'/Password:-'.$up));
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
         //header('Location: ../Admin/create.php?msg= "Update Successfully"');
		 echo "Update Successfully";
          }
      else
          {
          $message= "Save_District: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  //header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
		echo "Sorry, Try Later...";
          }
		
 }
mysqli_close($conn);
?>
