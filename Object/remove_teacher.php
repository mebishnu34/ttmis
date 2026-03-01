<?php
//include("object_include.php");
include("../Processing/db_connection.php");
if(isset($_GET['linkid']))
   {
   $traid=$_GET['linkid'];
   $sql = "delete from tblttraining where ID='$traid'";
      if (mysqli_query($conn, $sql))
         {
           //header('Location: ../Admin/create.php?msg= "Saved Successfully"');
		   		  ?>
           <script>
		   myWindow.close();
		   </script>
          <?php
		  echo "Remove Successfully";
          }
      else
          {
          $message= "Remove_training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  echo "Sorry, Try Again";
          }
  }
mysqli_close($conn);
?>
