<?php
session_start();
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
$mobileno=$_POST['txtmobileno'];
$_SESSION['mobileno']=$mobileno;
$category=$_POST['selectedCategory'];
$sql1 = "SELECT mobileno FROM tbltrainingneed where mobileno='".$mobileno."'";
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
      '".$_POST['cmbmode1']."',
      '".$_POST['cmbmode2']."',
      '".$_POST['optduration']."',
      '".$_POST['txtexpected']."',
      '".$_POST['txtsuggestion']."',
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
