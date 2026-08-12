<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$e=$_POST['txtexam'];
$et=$_POST['examtype'];
$mo=$_POST['txtmarkof'];
//$examobject->saveexam($e, $et, $mo);
//echo "Records Saved";
if($e=="")
{
 header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblexam where examname='$e'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
      header('Location: ../Admin/create.php?msg="Found Duplicate"');
    }
 else
  {
     $sql = "INSERT INTO tblexam(examname,examtype,markof) values('$e', '$et', '$mo')";
      if (mysqli_query($conn, $sql))
         {
          header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Save_Exam: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
}
mysqli_close($conn);
?>
