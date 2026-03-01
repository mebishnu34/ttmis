<?php
session_start();
$munid=$_POST['rem'];
$i=0;
foreach($munid as $id)
{
    $munvdcid[$i]=$id;
    $i++;
}
include("../Processing/db_connection.php");
for($j=0;$j<$i;$j++)
    {
       $sqlm="SELECT mobileno,mpass FROM tbldistrict where ID='$munvdcid[$j]'";
       $resultm = mysqli_query($conn,$sqlm);
                while($rowm = mysqli_fetch_array($resultm))
                {
                   $mobilem=$rowm["mobileno"];
                }
				$message="TTMIS::Training:: Login Name".$mobilem."/Password:-".$password;
			  $mobileno=$mobilem;
			  include("sms_code.php");
     }
header('Location: ../Admin/create.php?msg= "Password Send Successfully"');
mysqli_close($conn);
?>
