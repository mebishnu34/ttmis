<?php
//include("object_include.php");
include("../Processing/db_connection.php");
$id=$_POST['txtid'];
$un=$_POST['txtuser'];
$g=$_POST['optgender'];
$mobileno=$_POST['txtmobile'];
$ln=$_POST['txtloginname'];
$up=$_POST['txtpass'];
$ut=$_POST['utype'];
$conf=$_POST['txtconfirm'];
//$trainingobject->savetraining($tn, $d, $r);
//echo "Records Saved";
if($un=="" and $ln=="" and $up=="" and $up<>$fonf)
{
 header('Location: ../Admin/report.php?msg="Fields Are Required/Password and Confirm Password Not Match"');
}
else
{
    $sql = "UPDATE tbluser set uname='$un', ugender='$g', mobileno='$mobileno', loginname='$ln', upass='$up', utype='$ut',remark='Active' where userid='$id'";
      if (mysqli_query($conn, $sql))
         {
		 	 echo "Updated Successfully";
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
