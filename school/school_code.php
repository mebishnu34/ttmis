<?php
session_start();
$_SESSION['training']=$_POST['cmbtraining'];
$_SESSION['level']=$_POST['cmblevel'];
$_SESSION['subject']=$_POST['cmbsubject'];
$_SESSION['sdate']=$_POST['txtsdate'];
$_SESSION['edate']=$_POST['txtedate'];
$_SESSION['remark']=$_POST['txtremark'];
//if(isset($_POST['btnteacher']))
//{
//header('Location: ..\Admin\create.php');
//}

?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
  <?php
  if(isset($_POST['btndisplay']))
  {
  include("../Display/teacher_training.php");
  }


  if(isset($_POST['btnteacher']))
  {
  ?>
  
  <form action="school_teacher.php" method="Post">
  <center>
School Code : <input type="Text" size="20" name="txtcode">
  <input type="Submit" value="Display">
  </center>
  </form>
  <?php
  }
  ?>
</BODY>
</HTML>
