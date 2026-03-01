<?php
session_start();
$_SESSION['subject']=$_POST['cmbsubject'];
header('location:displayquestion.php');
?>