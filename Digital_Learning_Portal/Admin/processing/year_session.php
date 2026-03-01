<?php
session_start();
if(isset($_GET['yearid']))
{
$_SESSION['year']=$_GET['yearid'];
header('Location: ../question_collection.php');
}
?>