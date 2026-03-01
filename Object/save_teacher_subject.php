<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$faculty=$_POST['cmbfaculty'];
$level=$_POST['cmblevel'];
$subject=$_POST['txtsubject'];
//$trainingobject->savetraining($tn, $d, $r);
//echo "Records Saved";
$sql1 = "SELECT subname FROM tblsubject where level='$level' and faculty='$faculty' and subname='$subject'";
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
     $sql = "INSERT INTO tblsubject(subname, level, faculty, remark) values('$subject','$level', '$faculty', '')";
      if (mysqli_query($conn, $sql))
         {
          header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_Training" . $sql . "<br>" . mysqli_error($palikaconn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
mysqli_close($conn);

?>
