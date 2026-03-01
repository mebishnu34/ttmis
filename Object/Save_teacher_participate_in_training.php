<?php
session_start();
include("../Processing/db_connection.php");
$tcode=$_POST['txtcode'];
$gn=$_POST['txtgroup'];
$trainingid=$_SESSION['trainingid'];
$rnid=$_SESSION['trunid'];
$trunid=$rnid;
$sms=$_POST['optsms'];
$sql = "SELECT trainingid, trainingname, level, subject, startdate, enddate,venue,coordinator, mobileno, starttime from tblruntraining where id='$trunid' and remark='Running'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
      {
    		    $training= $row["trainingname"];
                $level=$row["level"];
                $subject=$row["subject"];
                $sdate=$row["startdate"];
                $edate=$row["enddate"];
                $venue=$row["venue"];
                $coordinator=$row["coordinator"];
                $mobileno=$row["mobileno"];
                $time=$row["starttime"];
				//$trainingid=$row["trainingid"];
                              
         }
     }
     
//exit;
//$attendanceobject->saveattendance($tra, $tn, $t, $r, $od);
//echo "Records Saved";
if($trainingid=="")
{
 header('Location: ../Admin/create.php?msg="Select Training"');
}
else
{
$sql1 = "SELECT scode,munvdc FROM tblteacher where teachercode='$tcode'";
$result1 = $conn->query($sql1);
if($result1->num_rows > 0)
   {	
    	while($row1 = $result1->fetch_assoc())
     		{
				$scode=$row1['scode'];
				$munvdc=$row1["munvdc"];
				$munid="";
				$sql1="SELECT ID FROM tbldistrict where munvdc='$munvdc'";
                $teacher = mysqli_query($conn,$sql1);
                if($row1 = mysqli_fetch_array($teacher))
                	{
                    	$munid=$row1["ID"];
                    }
				if($tcode<>"")
        		{
        	      	$sql1 = "SELECT * FROM tblttraining where runid='$trunid' and teacherid='$tcode'";
	        	     $result = $conn->query($sql1);
                	if ($result->num_rows > 0)
                	{
                	header('Location: ../Input/student_code.php?msg="Already Exist"');
                 	}
    	          	else
                	{
                		$sql = "INSERT INTO tblttraining(teacherid, trainingid,runid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$tcode','$trainingid','$rnid','$scode','$munid', '$gn', '$coordinator','$mobileno','$sdate','$edate','Running')";
                		if (mysqli_query($conn, $sql))
                		{
						if($sms=="YESSMS")
						{
		                $mobileno=$tmobileno[$d];
        		        $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
                		include("../Object/sms_code.php");
						}
                		header('Location: ../Input/student_code.php?msg= "Saved Successfully"');
                		}
                		else
                		{
                		$message= "Save_teacher_participate_in_training" . $sql . "<br>" . mysqli_error($conn);
		  				$mobileno="9851001482";
		  				include("sms_code.php");
		  				//header('Location: ../Input/student_code.php?msg= "Error"');
						echo $message;
                		}
                	}
              	}
          		else
          		{
           		header('Location: ../Input/student_code.php?msg= "Fields Are Required"'); 
          		}	
        	}
		
  }
		 $mobileno=$mobileno;
        $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
        include("../Object/sms_code.php");
		//header('Location: ../Input/student_code.php?msg= "Fields Are Required"'); 
  }
 mysqli_close($conn);
?>
