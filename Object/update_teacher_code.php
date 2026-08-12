<?php
ob_start();
session_start();
include("../Processing/db_connection.php");
$recodecode=$_POST['txtrecordcode'];
$tpdcode=$_POST['txttpdcode'];
$i=0;
$k=0;
foreach($recodecode as $recordecodes)
	{
	$tcode[$k]=$recordecodes;
    $k++;
	}
foreach($tpdcode as $tpdcodes)
	{
	$tpcode[$i]=$tpdcodes;
    $i++;
	}

for($d=0; $d<$k;$d++)
	{
	     
	   	$sql = "update tbltpd set tcode='$tcode[$d]' where tcode='$tpcode[$d]'";
	    if (mysqli_query($conn, $sql))
            {
				header('Location: ../Admin/tpd_teacher_code_update.php?msg= "Update Successfully"');
			}	
	    else
    	    {
        	    $message= "Save_participate_in_training_1" . $sql . "<br>" . mysqli_error($conn);
		      	$mobileno="9851001482";
			 	include("sms_code.php");
		  				//echo $message;
			    header('Location: ../Admin/create.php?msg= "Error"');
            }
            
    }
 mysqli_close($conn);
?>
