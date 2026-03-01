<?php
session_start();
$date=$_SESSION['$tdate'];
$scode=$_SESSION['code'];
$trainingid=$_SESSION['trainingid'];
include("../Processing/db_connection.php");
$sqlm = "SELECT munvdc FROM tblschool where schoolcode='$scode'";
$resultm = $conn->query($sqlm);
if($resultm->num_rows > 0)
   {
      if($rowm=mysqli_fetch_array($resultm))
          {
            $mun=$rowm["munvdc"];
           }
    }

$sqlt="SELECT trainingname, level, subject, startdate, enddate,venue FROM tblruntraining where id='$trainingid'";
            $resultt = mysqli_query($conn,$sqlt);
            while($rowt = mysqli_fetch_array($resultt))
                {
                $training=$rowt["trainingname"];
                $level=$rowt["level"];
                $subject=$rowt["subject"];
                }

$rem=$_POST['tid'];
 $k=0;
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
	//echo $teacherid[$k];
 	$k++;
	}
 $sqlm = "SELECT max(tnumber) FROM tbltrainingrequest";
        $resultm = $conn->query($sqlm);
        if($resultm->num_rows > 0)
            {
                if($rowm=mysqli_fetch_array($resultm))
                {
                    $mn=$rowm["max(tnumber)"]+1;
                }
            }

if($training=="" and $level=="" and $subject=="" and $sdate=="" and $edate=="")
{
 header('Location: ../school_application.php?msg="Fields Are Required"');
}
else
{
for($d=0; $d<$k;$d++)
  	{
   	if($teacherid[$d]<>"")
     {
	 if(isset($_POST["btnsave"]))
	 {
     	 $sql1 = "SELECT * FROM tbltrainingrequest where trainingname='$training' and level='$level' and teacherid='$teacherid[$d]' and subject='$subject'";
	     $result = $conn->query($sql1);
    	 if ($result->num_rows > 0)
       		{
        	header('Location: ../school_application.php?msg="Already Exist"');
        	}
      	else
      		{
      		$sql = "INSERT INTO tbltrainingrequest(teacherid,schoolcode,govname, tnumber, trainingname, subject, level, trainingid,remark, ondate,ldate) values('$teacherid[$d]','$_SESSION[code]','$mun','$mn', '$training', '$subject', '$level','$trainingid','Request',now(),'$date')";
      		if (mysqli_query($conn, $sql))
      			{
      			header('Location: ../school_application.php?msg= "Saved Successfully"');
      			}
     		else
     			{
     			$message= "Save_training_request" . $sql . "<br>" . mysqli_error($conn);
		  		$mobileno="9851001482";
		  		include("sms_code.php");
		  		header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
     			}
      		}
		}
	else
		{
		$sql = "delete from tbltrainingrequest where teacherid='$teacherid[$d]' and schoolcode='$_SESSION[code]' and govname='$mun' and trainingid='$trainingid'";
      		if (mysqli_query($conn, $sql))
      			{
      			header('Location: ../school_application.php?msg= "Canceled Successfully"');
      			}
     		else
     			{
     			$message= "Save_training_request" . $sql . "<br>" . mysqli_error($conn);
		  		$mobileno="9851001482";
		  		include("sms_code.php");
		  		header('Location: ../school_application.php?msg= "Sorry, Try Later..."');
     			}
		}
	
   }
 }
  mysqli_close($conn);
}
?>

