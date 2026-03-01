<?php
session_start();
include("../Processing/db_connection.php");
include("../Processing/db_palika_connection.php");
$tcode=$_POST['txtcode'];
$gn=$_POST['txtgroup'];
$trainingid=$_SESSION['trainingid'];
$trunid=$_SESSION['trunid'];
$sms=$_POST['optsms'];
$sql = "SELECT trainingid, trainingname, level, subject, startdate, enddate,venue,coordinator, mobileno, starttime from tblruntraining where palikaid='$_SESSION[tid]' and trainingid='$trunid' and remark='Running'";
$result = $palikaconn->query($sql);
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
 header('Location: ../municipality/add_teacher.php?msg="Select Training"');
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
				if($tcode<>"")
        		{
        	      	$sql1 = "SELECT * FROM tblttraining where runid='$trunid' and teacherid='$tcode'";
	        	     $result = $palikaconn->query($sql1);
                	if ($result->num_rows > 0)
                	{
                	header('Location: ../municipality/add_teacher.php?msg="Already Exist"');
                 	}
    	          	else
                	{
                		$sql = "INSERT INTO tblttraining(teacherid, trainingid,runid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$tcode','$trainingid','$trunid','$scode','$_SESSION[tid]', '$gn', '$coordinator','$mobileno','$sdate','$edate','Running')";
                		if (mysqli_query($palikaconn, $sql))
                		{
						if($sms=="YESSMS")
						{
		                $mobileno=$tmobileno[$d];
        		        $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
                		include("../Object/sms_code.php");
						}
                		header('Location: ../municipality/add_teacher.php?msg= "Saved Successfully"');
                		}
                		else
                		{
                		$message= "Add Participate In Training" . $sql . "<br>" . mysqli_error($conn);
		  				$mobileno="9851001482";
		  				include("sms_code.php");
		  				header('Location: ../municipality/add_teacher.php?msg= "Error"');
                		}
                	}
              	}
          		else
          		{
           		header('Location: ../municipality/add_teacher.php?msg= "Fields Are Required"'); 
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
