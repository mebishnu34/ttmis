<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$org=$_POST['orgname'];
$a=$_POST['orgaddress'];
$c=$_POST['orgcontact'];
$head=$_POST['txthead'];
$level=$_POST['txtlevel'];
$post=$_POST['txtpost'];
//$organizationobject->saveorganization($org, $a, $c);
//echo "Records Saved";
if($org=="")
{
  header('Location: ../Admin/registration.php?msg= "Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblorganization";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
    $sql = "UPDATE tblorganization set orgname='$org', address='$a',officehead='$head', contact='$c', level='$level',post='$post'";
      if (mysqli_query($conn, $sql))
         {
           header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
          }
      else
          {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
 else
  {
     $sql = "INSERT INTO tblorganization(orgname,address,officehead, contact,level, post) values('$org', '$a','$head', '$c','$level','$post')";
      if (mysqli_query($conn, $sql))
         {
           header('Location: ../Admin/registration.php?msg= "Saved Successfully"');
          }
      else
          {
		  $message= "Save_Organization: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/registration.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
