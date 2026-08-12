<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$training=$_POST['cmbtraining'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$sdate=$_POST['txtsdate'];
$edate=$_POST['txtedate'];
$venue=$_POST['txtvenu'];
$days=$_POST['txtdays'];
$id=$_POST['txtid'];
//$teachertrainingobject->saveteachertraining($tid, $traid, $tn, $sd, $ed, $r);
//echo "Records Saved";
if($training=="" and $level=="" and $subject=="" and $sdate=="" and $edate=="" and $venue=="")
{
  header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
     $sql = "UPDATE tblruntraining set trainingname='$training', level='$level', subject='$subject', startdate='$sdate', enddate='$edate', trainingdays='$days',venue='$venue', remark='Running' where id='$id'";
      if (mysqli_query($conn, $sql))
         {
           //header('Location: ../Admin/create.php?msg= "Saved Successfully"');
		   		  ?>
           <script>
		   myWindow.close();
		   </script>
          <?php
          }
      else
          {
          $message= "save_run_training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
          }
  }
mysqli_close($conn);
?>
