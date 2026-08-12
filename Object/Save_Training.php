<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tn=$_POST['cmbtraining'];
$sub=$_POST['txtsubject'];
$l=$_POST['cmblevel'];
//$trainingobject->savetraining($tn, $d, $r);
//echo "Records Saved";
if($tn=="" and $sub=="" and $l=="")
{
 header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tbltraining where trainingname='$tn' and level='$l' and subject='$sub'";
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
     $sql = "INSERT INTO tbltraining(trainingname, level, subject) values('$tn', '$l', '$sub')";
      if (mysqli_query($conn, $sql))
         {
          header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_Training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);

?>
