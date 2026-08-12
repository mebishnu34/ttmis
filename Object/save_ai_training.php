<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
//include("object_include.php");
include("../Processing/db_connection.php");
$mobile=$_POST['txtmobileno'];
$_SESSION['mobileno']=$mobile;
$category=$_POST['selectedCategory'];
$sql1 = "SELECT mobileno FROM tblaitraining where mobileno='".$mobile."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      header('Location: ../index.php?msg= "Found Duplicate"');      
    }
  else
    {
      $sql = "INSERT INTO tblaitraining(
      traineename,
      traineepost,
      appointlevel,
      traineesubject,
      experenceyear,
      mobileno,
      email,
      schoolname,
      district,
      munvdc,
      wardno,
      regdate,
      financialyear,
      remark)
      values('".$_POST['txtname']."',
      '".$_POST['cmbpost']."',
      '".$_POST['cmblevel']."',
      '".$_POST['txtsubject']."',
      '".$_POST['txtexperence']."',
      '".$_POST['txtmobileno']."',
      '".$_POST['txtemail']."',
      '".$_POST['txtschool']."',
      '".$_POST['cmbdistrictbagamati_1']."',
      '".$_POST['cmbmunbagamati_1']."',
      '".$_POST['txtwardno']."',
       now(),
      '".$_POST['txtfyear']."',
      'Request')";
      if (mysqli_query($conn, $sql))
        {
           header('Location: ../index.php?accountid=ai_training');
                  
        }
      else
        {
          header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
        }
    }
mysqli_close($conn);
?>
