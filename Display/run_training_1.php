<?php
session_start();
if(isset($_GET['linkid']))
   {
   $_SESSION['traid']=$_GET['linkid'];
   header('Location: run_training.php');
   }
?>
