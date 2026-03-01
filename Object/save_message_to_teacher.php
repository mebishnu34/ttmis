<?php
session_start();
include("../Processing/db_connection.php");
$coordinator=$_POST['txtcoordinator'];
$cmobileno=$_POST['txtmobile'];
$remark=$_POST['txtremark'];
$tcode=$_POST['rem'];
$time=$_POST['txttime'];
$date=$_SESSION['$tdate'];
$sms=$_POST['optsms'];
//echo $sms;
//exit;
$t=0;
foreach($_SESSION['trainingid'] as $tid)
{
    $trainingid[$t]=$tid;
	
    //echo $trainingid[$t];
	//exit;
    $sql = "SELECT trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$trainingid[$t]' and remark='Running'";
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
				$trainingid= $row["trainingid"];
                              
         }
     }
	//echo $training;
	//echo $level;
	//echo $sdate;
	//echo $edate;
//exit;
//$attendanceobject->saveattendance($tra, $tn, $t, $r, $od);
//echo "Records Saved";
$rem=$_POST['rem'];
$group=$_POST['group'];
$i=0;
$g=0;
foreach($group as $groups)
	{
	$gn[$g]=$groups;
 	$g++;
	}

$k=0;
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
 	$k++;
	}
for($d=0; $d<$k;$d++)
	{
	
	if($teacherid[$d]<>"" and $coordinator<>"" and $cmobileno<>"")
        {
                 $sql1="SELECT scode,tcontact FROM tblteacher where teachercode='$teacherid[$d]'";
                 $teacher = mysqli_query($conn,$sql1);
                 if($row1 = mysqli_fetch_array($teacher))
                    {
                    $scode=$row1["scode"];
					$mobile=$row1["tcontact"];
					}
					//echo $teacherid[$d];
					//echo $scode;
					//exit;
	             $sql1 = "SELECT * FROM tblttraining where trainingid='$trainingid' and teacherid='$teacherid[$d]' And sdate='$sdate' and edate='$edate'";
    	         $result = $conn->query($sql1);
                if ($result->num_rows > 0)
                	{
	                header('Location: ../Admin/create.php?msg="Already Exist"');
    	             }
        	  else
                {
				//echo $sdate;
				//echo $edate;
				//echo "hello";
				//echo $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn[$d]. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$cmobileno;
				//echo $mobile;
				//exit;
					
					
              	  $sql = "INSERT INTO tblttraining(teacherid,training, trainingid, schoolcode ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$teacherid[$d]','$training','$trainingid','$scode', '$gn[$d]', '$coordinator','$cmobileno','$sdate','$edate','Running')";
                	if (mysqli_query($conn, $sql))
                	{
					if($sms=="YESSMS")
						{
		                $mobileno=$mobile;
    		            $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn[$d]. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$cmobileno;
        		        include("sms_code.php");
					}
            	    header('Location: ../Admin/create.php?msg= "Saved Successfully"');
                	}
                	else
                	{
                	$message= "Save_participate_in_training" . $sql . "<br>" . mysqli_error($conn);
					$mobileno="9851001482";
				    include("sms_code.php");
		  			header('Location: ../Admin/create.php?msg= "Sorry,Try Later..."');
                	}
                }
              }
          else
          {
           header('Location: ../Admin/create.php?msg= "Fields Are Required"'); 
          }
        }
$t=$t+1;
}
 mysqli_close($conn);
?>
