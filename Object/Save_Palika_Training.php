<?php
session_start();
//include("object_include.php");
include("../Processing/db_palika_connection.php");
$tn=$_POST['cmbtraining'];
$sub=$_POST['txtsubject'];
$l=$_POST['cmblevel'];
//$trainingobject->savetraining($tn, $d, $r);
//echo "Records Saved";
if($tn=="" and $sub=="" and $l=="")
{
 header('Location: ../municipality_application.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT palikaid FROM tbltraining where palikaid='$_SESSION[tid]' and trainingname='$tn' and level='$l' and subject='$sub'";
$result = $palikaconn->query($sql1);

if ($result->num_rows > 0)
   {
    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    header('Location: ../municipality_application.php?msg="Found Duplicate"');
    }
 else
  {
     $sql = "INSERT INTO tbltraining(palikaid,trainingname, level, subject) values('$_SESSION[tid]','$tn', '$l', '$sub')";
      if (mysqli_query($palikaconn, $sql))
         {
          header('Location: ../municipality_application.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_Training" . $sql . "<br>" . mysqli_error($palikaconn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../municipality_application.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($palikaconn);

?>
