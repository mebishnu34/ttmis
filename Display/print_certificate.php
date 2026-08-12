<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_POST['btncertificate']))
{
//echo $_SESSION['teacherid'];
$teacherid=$_SESSION['teacherid'];
$trainingid=$_SESSION['trainingid'];
$training=$_POST['cmbtraining'];
$model=$_POST['optmodel'];
if($training=="TPD" and $model=="M1")
    {
        include("tpd_certificate_1.php");
    }
elseif($training=="TPD" and $model=="M2")
    {
        include("tpd_certificate_2.php");
    }
elseif($training=="Service" and $model=="M1")
    {
        include("sewa_prabesh_certificate_1.php");
    }
elseif($training=="Service" and $model=="M2")
    {
        include("sewa_prabesh_certificate_2.php");
    }
elseif($training=="General" and $model=="M1")
    {
        include("one_month_certificate_1.php");
    }
elseif($training=="General" and $model=="M2")
    {
        include("one_month_certificate_2.php");
    }
}

