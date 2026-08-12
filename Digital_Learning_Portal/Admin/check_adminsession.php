<?php
session_start();
$_SESSION['level']=$_POST['cmblevel'];
header('location:question.php');
?>