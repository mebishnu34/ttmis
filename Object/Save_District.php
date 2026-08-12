<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$dn=$_POST['cmbdistrict1'];
$mv=$_POST['txtmunvdc'];
$wn=$_POST['txtward'];
$up=$_POST['txtpass'];
$mobile=$_POST['txtmobile'];
$person=$_POST['txtperson'];
//$districtobject->savedistrict($dn, $mv, $wn);
//echo "Records Saved";
if($mv=="" and $up=="" and $mobile=="")
{
 echo "Fields are Required";
}
else
{
 $sql1 = "SELECT * FROM tbldistrict where munvdc='$mv'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
     header('Location: ../Admin/create.php?msg="Found Duplicate"');
    }
 else
  {
     $sql = "INSERT INTO tbldistrict(districtname, munvdc, noofward,aperson, mobileno,mpass,importno,email) values('$dn', '$mv', '$wn','$person','$mobile','$up','0','')";
      if (mysqli_query($conn, $sql))
         {
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
         header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_District: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  echo $message;
		  //header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
