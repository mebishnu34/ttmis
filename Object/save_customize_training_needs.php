<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
//include("object_include.php");
include("../Processing/db_connection.php");
if(isset($_POST['btnnext']))
  {
$mobileno=$_POST['txtpremobileno'];
$_SESSION['mobileno']=$mobileno;
$category=$_POST['selectedCategory'];
if($category=="ecd")
            {
              header('Location: ../index.php?accountid=application_form_1');
            }
          elseif($category=="teacher")
            {
              header('Location: ../index.php?accountid=application_form_1B');
            }
          elseif($category=="principal")
          {
              header('Location: ../index.php?accountid=application_form_1C');
          }
  }
else
  {
$mobile=$_POST['txtmobileno'];
$_SESSION['mobileno']=$mobile;
$category=$_POST['selectedCategory'];
$sql1 = "SELECT mobileno FROM tbltrainingneed where mobileno='".$mobile."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
      header('Location: error.php?msg= "Found Duplicate"');      
    }
  else
    {
      $sql = "INSERT INTO tbltrainingneed(
      needname,
      needpost,
      appointlevel,
      needsubject,
      experenceyear,
      mobileno,
      email,
      schoolname,
      district,
      munvdc,
      wardno,
      trainingmode1,
      trainingmode2,
      trainingduration,
      expectedoutcome,
      suggestion,
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
      '',
      '',
      '',
      '',
      '',
      now(),
      '".$_POST['txtfyear']."',
      'Request')";
      if (mysqli_query($conn, $sql))
        {
          if($category=="ecd")
            {
              header('Location: ../index.php?accountid=application_form_1');
            }
          elseif($category=="teacher")
            {
              header('Location: ../index.php?accountid=application_form_1B');
            }
          elseif($category=="principal")
          {
              header('Location: ../index.php?accountid=application_form_1C');
          }
        }
      else
        {
          header('Location: ../error.php?msg='. die("Database Connection Error" .mysqli_error()));
        }
    }
  }  
mysqli_close($conn);
?>
