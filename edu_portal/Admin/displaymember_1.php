<?php
session_start();
$_SESSION['dfrom']=$_POST['txtdfrom'];
$_SESSION['dto']=$_POST['txtdto'];
header('Location: displaymember.php');
?>