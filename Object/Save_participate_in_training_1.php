<?php
ob_start();
session_start();
//phpinfo(); 
//include("object_include.php");
//echo "Name".$_SESSION['training']."<br>";
//echo "level".$_SESSION['level']."<br>";
//echo "Subject" .$_SESSION['subject']."<br>";
//echo "Start Date".$_SESSION['sdate']."<br>";
//echo "End Date" .$_SESSION['edate']."<br>";
//echo "Remark" .$_SESSION['remark']."<br>";
//echo $_SESSION['venue'];
//echo $_SESSION['gnumber'];
//echo $_SESSION['coordinator'];
include("../Processing/db_connection.php");
$trainingid=$_SESSION['trainingid'];
$rnid=$_SESSION['trunid'];
$gn=$_POST['cmbgnumber'];
$coordinator=$_POST['txtcoordinator'];
$mobileno=$_POST['txtmobile'];
$sms=$_POST['optsms'];
//echo $sms;
//echo $_SESSION['trainingid'];
//echo $trainingid;
//exit;

$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$rnid' and remark='Running'";
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
                         
         }
     }
//exit;
//$attendanceobject->saveattendance($tra, $tn, $t, $r, $od);
//echo "Records Saved";
if($trainingid=="")
{
 header('Location: ../Input/school_code.php?msg="Select Training"');
}
else
{
	/* 
	$scodes1=$_POST['scode'];
	$s=0;
	 foreach($scodes1 as $scodes)
	 {
	 $scode[$s]=$scodes;
	 echo $s;
	 echo "<br>";
	 echo $scode[$s];
	 echo "<br>";
	 $s++;
	 }
	$mobno=$_POST['tcon'];
	 $j=0;
	 foreach($mobno as $mobnos)
	 {
	 $tmobileno[$j]=$mobnos;
	 $j++;
	 }
	 */
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
	     
	if($teacherid[$d]<>"" and $coordinator<>"" and $mobileno<>"")
        {
              $sql1 = "SELECT * FROM tblttraining where runid='$rnid' and teacherid='$teacherid[$d]'";
             $result = $conn->query($sql1);
                if ($result->num_rows > 0)
                	{
	                header('Location: ../Input/school_code.php?msg="Already Exist"');
    	             }
        	   else
            	    {
					$scode="";
					$tmobileno="";
					$sql1 = "SELECT tcontact,scode,munvdc FROM tblteacher where teachercode='$teacherid[$d]'";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0)
					   {
					    while($row = $result1->fetch_assoc()) 
							{
								$scode=$row["scode"];
								$tmobileno=$row["tcontact"];
								$munvdc=$row1["munvdc"];
								$munid="";
								$sql1="SELECT ID FROM tbldistrict where munvdc='$munvdc'";
                 				$teacher = mysqli_query($conn,$sql1);
                 				if($row1 = mysqli_fetch_array($teacher))
                    				{
                    				$munid=$row1["ID"];
                    				}
							}
						}
	
					/*echo $teacherid[$d];
					//echo "<br>";
					echo $scode;
					echo "<br>";
					echo $tmobileno;
					echo "<br>";
					*/
					//echo "hello";
                	$sql = "INSERT INTO tblttraining(teacherid, trainingid,runid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$teacherid[$d]','$trainingid','$rnid','$scode','$munid', '$gn', '$coordinator','$mobileno','$sdate','$edate','Running')";
	                if (mysqli_query($conn, $sql))
    		            {
						if($sms=="YESSMS")
						{
						$mobileno=$tmobileno;
						$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
						//include("../Object/sms_code.php");
						}
				 		header('Location: ../Input/school_code.php?msg= "Saved Successfully"');
				 		
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
              }
          else
          {
           header('Location: ../Input/school_code.php?msg= "Fields Are Required"'); 
          }
        }
		$mobileno=$mobileno;
        $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
        include("../Object/sms_code.php");
  }
 mysqli_close($conn);
?>
