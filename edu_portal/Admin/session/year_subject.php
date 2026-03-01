<?php
session_start();
$_SESSION['level']=$_POST['cmblevel'];
$_SESSION['faculty']=$_POST['cmbfaculty'];
$_SESSION['year']=$_POST['cmbyear'];
header("Location:../New_quecollection.php");
?>