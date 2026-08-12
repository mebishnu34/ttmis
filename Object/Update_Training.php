<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$tn=$_POST['cmbtraining'];
$sub=$_POST['txtsubject'];
$l=$_POST['cmblevel'];
$id=$_POST['txtid'];
//$trainingobject->savetraining($tn, $d, $r);
//echo "Records Saved";
if($tn=="" and $sub=="" and $l=="")
{
 header('Location: ../Admin/report.php?msg="Fields Are Required"');
}
else
{
    $sql = "UPDATE tbltraining set trainingname='$tn', level='$l', subject='$sub' where ID='$id'";
      if (mysqli_query($conn, $sql))
         {
		 	 //header('Location: ../Admin/report.php?msg= "Updated Successfully"');
		 ?>
           <script>
		   myWindow.close();
		   </script>

          <?php
		  }
      else
          {
          $message= "Save_Training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
 mysqli_close($conn);
?>
