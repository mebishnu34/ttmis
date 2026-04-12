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
$sql = "SELECT trainingid, trainingname, level, subject, startdate, enddate,venue,coordinator, mobileno, starttime from tblruntraining where id='$rnid' and remark='Running'";
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
			   $t = "SELECT mobileno,citizenshipno FROM tblapplication where appid='". $teacherid[$d] ."'";
  			   $r = $conn->query($t);
			   if ($r->num_rows > 0)
      				{
      				if($trow = $r->fetch_assoc())
         				{
            				$mobileno=$trow['mobileno'];
							$ctzno=$trow['citizenshipno'];
							$sql2 = "SELECT tcontact,citizenship,teachercode FROM tblteacher where tcontact='".$mobileno."' OR citizenship='".$ctzno."'";
   							$result2 = $conn->query($sql2);
						   if ($result2->num_rows > 0)
      							{
								mysqli_query($conn,"UPDATE tblteacher t1 JOIN tblapplication t2 ON
								t1.tname=t2.tname, 
								t1.gender=t2.gender,
								t1.cast='',
								t1.mothertong='',
								t1.citizenship=t2.citizenshipno,
								t1.sheetroll='',
								t1.stream='',
								t1.fathername=t2.fathername, 
								t1.dob='', 
								t1.address='', 
								t1.email=t2.email, 
								t1.wardno=t2.wardno,
								t1.tcontact=t2.mobileno, 
								t1.appointdate=t2.appointdate, 
								t1.appointtype='',
								t1.workinglevel='',
								t1.subject=t2.appointsubject', 
								t1.scode='',
								t1.category='Teacher',
								t1.teachinglevel=t2.appointsubject, 
								t1.qualification='', 
								t1.faculty='', 
								t1.majorsubject='', 
								t1.teachingsubject=t2.appointsubject,
								t1.loginname=t2.mobileno,
								t1.tpass=t2.mobileno where t1.tcontact=t2.mobileno");
								}
							else
							{
								
								$sqlinsert="Insert INTO tblteacher(teachercode,tname, gender,cast,mothertong,citizenship, sheetroll,subject,loginname, tpass,dob,fathername, address, email,district, munvdc, wardno,tcontact, appointdate, appointtype,workinglevel, scode,schoolname,schooladdress,province,category, teachinglevel, qualification, faculty, majorsubject, teachingsubject, remark, importno,username) 
								appid,
								tname, 
								gender,
								cast,
								mothertong,
								citizenshipno,
								'',
								'',
								fathername, 
								'', 
								'', 
								email, 
								wardno,
								mobileno, 
								appointdate, 
								'',
								'',
								appointsubject, 
								'',
								'Teacher',
								appointsubject, 
								'', 
								'', 
								'', 
								appointsubject,
								mobileno,
							mobileno FROM tblapplication where t1.tcontact=t2.mobileno";
							}
						if (mysqli_query($conn, $sqlinsert))
							{
							header('Location: ../Admin/create.php?msg= "Saved Successfully"');
							}	
						else
							{
							$message= "Save_participate_in_training_1" . $sql . "<br>" . mysqli_error($conn);
							$mobileno="9851001482";
							}	
						$tcodesql1 = "SELECT teachercode,scode,munvdc FROM tblteacher where tcontact='".$mobileno."'";
  			   			$tcoderesult1 = $conn->query($tcodesql1);
			   			if($tcoderesult1->num_rows > 0)
      						{
      						if($tcoderow = $tcoderesult1->fetch_assoc())
         					{
								$tcode=$tcoderow['teachercode'];
								$scode=$tcoderow['scode'];
								$munvdc=$tcoderow['munvdc'];
								$munid="";
								$msql1="SELECT ID FROM tbldistrict where munvdc='".$munvdc."'";
								$mresult = mysqli_query($conn,$msql1);
								if($mrow1 = mysqli_fetch_array($mresult))
									{
										$munid=$row1["ID"];
									}
							}
						}
						if($tcode<>"")
        					{
								$trasql1 = "SELECT runid FROM tblttraining where runid='".$rnid."' and teacherid='$tcode'";
								$traresult = $conn->query($trasql1);
								if ($traresult->num_rows==0)
									{
									mysqli_query($conn,"INSERT INTO tblttraining(teacherid, trainingid,runid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$tcode','$trainingid','$rnid','$scode','$munid', '$gn', '$coordinator','$mobileno','$sdate','$edate','Running')");
									//$mobileno=$tmobileno[$d];
									//$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
									//include("../Object/sms_code.php");
									}
								$sql = "Update tblapplication set remark='Selected', runtrainingid='".$rnid."', groupnumber='".$gn."' where appid='". $teacherid[$d]."'";
								if (mysqli_query($conn, $sql))
									{
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
							}
					}
		}
      	   else
        	  {
           		header('Location: ../Input/school_code.php?msg= "Fields Are Required"'); 
          		}
        	//$mobileno=$mobileno;
        //$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
        //include("../Object/sms_code.php");
	}
}
   mysqli_close($conn);
?>
