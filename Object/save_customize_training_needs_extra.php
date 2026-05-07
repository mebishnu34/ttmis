<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
$mode1=$_POST['txtmode1'];
if($mode1=="पहिलो प्राथमिकता")
  {
    $mode2="दोस्रो प्राथमिकता";
  }
  else
    {
    $mode2="पहिलो प्राथमिकता";
    }
include("../Processing/db_connection.php");
if(isset($_POST['btnnext']))
  {
    $sql = "Update tbltrainingneed set 
      trainingmode1='".$mode1."',
      trainingmode2='".$mode2."',
      trainingduration='".$_POST["optduration"]."',
      expectedoutcome='".$_POST["txtexpected"]."',
      suggestion='".$_POST["txtsuggestion"]."' where mobileno='".$_SESSION['mobileno']."'";
       if(mysqli_query($conn, $sql))
        {
          $_SESSION['response']="Save Successfully";
          header('Location: ../index.php?accountid=customize_training');
        }
      else
        {
          header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
          
        }
mysqli_close($conn);
}
?>
