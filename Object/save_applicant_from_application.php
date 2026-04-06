<?php
ob_start();
session_start();
include("../Processing/db_connection.php");
$trainingid=$_SESSION['trainingid'];
$rnid=$_SESSION['trunid'];
$gn=$_POST['cmbgnumber'];
$coordinator=$_POST['txtcoordinator'];
$mobileno=$_POST['txtmobile'];
$sms=$_POST['optsms'];
if($trainingid=="")
{
 header('Location: ../Admin/create.php?msg="Select Training"');
}
else
{
$i=0;
$k=0;
$rem=$_POST['rem'];
//echo $rem;
//echo "hell4o";    
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
    //echo $teacherid[$k];
    //echo "<br>";
	$k++;
	}
//echo $k;
//exit;
   for($d=0; $d<$k;$d++)
	{
	     
	if($teacherid[$d]<>"")
        {
       	$sql = "Update tblapplication set remark='Selected', runtrainingid='".$rnid."', groupnumber='".$gn."' where appid='". $teacherid[$d]."'";
	                if (mysqli_query($conn, $sql))
    		            {
						//if($sms=="YESSMS")
						//{
						//$mobileno=$tmobileno;
						//$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
						//include("../Object/sms_code.php");
						//}
				 		header('Location: ../Admin/create.php?msg= "Saved Successfully"');
				 		
                		}	
	                else
    		            {
            		    $message= "Save_participate_in_training_1" . $sql . "<br>" . mysqli_error($conn);
					  	$mobileno="9851001482";
					  	include("sms_code.php");
		  				echo $message;
				     header('Location: ../Admin/create.php?msg= "Error"');
                		}
                }
      	   else
        	  {
           		header('Location: ../Input/school_code.php?msg= "Fields Are Required"'); 
          		}
        }
		//$mobileno=$mobileno;
        //$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
        //include("../Object/sms_code.php");
}
   mysqli_close($conn);
?>
