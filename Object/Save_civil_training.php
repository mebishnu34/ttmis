<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['cmbcivil'];
$traid=$_POST['cmbtraining'];
$tn=$_POST['txtnumber'];
$r=$_POST['txtremark'];
//$teachertrainingobject->saveteachertraining($tid, $traid, $tn, $sd, $ed, $r);
//echo "Records Saved";
if($tn=="" and $sd=="" and $ed=="")
{
  header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblttraining where teacherid='$tid' and trainingid='$traid' and trainingnumber='$tn'";
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
     $sql = "INSERT INTO tblttraining(teacherid, trainingid, trainingnumber, remark, category,ongoing) values('$tid', '$traid', '$tn', '$r','Civil','ON')";
      if (mysqli_query($conn, $sql))
         {
           header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_civil_training: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
