<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['linkid']))
   {
   $id=$_GET['linkid'];
   $sqlm="SELECT loginname,tpass,tcontact FROM tblteacher where teachercode='$id'";
   $resultm = mysqli_query($conn,$sqlm);
     while($rowm = mysqli_fetch_array($resultm))
                {
                   $mobileno=$rowm["tcontact"];
				   $tlogin=$rowm["loginname"];
				   $tpass=$rowm["tpass"];
				   
                }
				$message="TTMIS::Training:: Login Name:-".$tlogin."/Password:-".$tpass;
			    include("sms_code.php");
     }
header('Location: ../Display/run_training.php?msg= "Password Send Successfully"');
mysqli_close($conn);
?>
