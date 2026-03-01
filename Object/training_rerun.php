<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $_SESSION['trainingid']=$_GET['tid'];
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
</HEAD>
<BODY>
<?php

    //mysqli_query("Update tblttraining set remark='Completed' where trainingid='$_SESSION[trainingid]'",$conn);
    $sql = "Update tblruntraining set remark='Running' where id='$_SESSION[trainingid]'";
      if (mysqli_query($conn, $sql))
         {
           
         // header('Location: ../Admin/entry.php?msg= "Training Completed"');
          }
      else
          {
		  $message= "complete_training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  echo "Sorry, Try Later...";
          }
      $sql = "Update tblttraining set remark='Running' where trainingid='$_SESSION[trainingid]'";
      if (mysqli_query($conn, $sql))
         {
             
          echo "<script>window.close();</script>";
          }
      else
          {
          $message= "Error: " . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  		  header('Location: ../Admin/entry.php?msg= "Sorry,Try Later..."');
          }
echo "<script>window.close();</script>";
?>
</BODY>
</HTML>
