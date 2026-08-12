<?php
include("../Processing/db_connection.php");
$un=$_POST['txtuser'];
$g=$_POST['optgender'];
$mobileno=$_POST['txtmobile'];
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$ut=$_POST['utype'];
$conf=$_POST['txtconfirm'];
if($un=="" and $ln=="" and $up=="" and $up<>$conf)
{
 header('Location: ../Admin/create.php?msg= "Fields Are Required"');
}
else
{
if($up==$conf)
  {
  $sql1 = "SELECT * FROM tbluser where loginname='$ln'";
  $result = $conn->query($sql1);
          if ($result->num_rows > 0)
          {
            header('Location: ../Admin/create.php?msg="Found Duplicate"');
          }
          else
          {
          $sql = "INSERT INTO tbluser(uname, ugender, mobileno, loginname, upass, utype,remark) values('$un', '$g','$mobileno', '$ln', '$up','$ut','Active')";
          if (mysqli_query($conn, $sql))
          {
          $message="TTMIS::Login Name:-".$ln."/Password:-".$up;
		 /*
         $args = http_build_query(array(
        'token' => 'MPfRv4Mk8MRDzGVyaLMA',
        'from'  => 'Demo',
        'to'    => $mobileno,
        'text'  => 'TTMIS::Login Name:-'.$ln.'/Password:-'.$up));
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
    //echo $response;

          }
          else
          {
          $message= "Save_User" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
          }
   }
else
    {
    echo "Password is not Match";
    }
}
mysqli_close($conn);
?>
