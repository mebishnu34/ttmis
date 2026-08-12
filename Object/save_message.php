<?php
session_start();
include("../Processing/db_connection.php");
$munid=$_POST['mun'];
$date=$_SESSION['$tdate'];
$num=$_POST['pnum'];
$mobileno=$_POST['mobile'];

$m=0;
foreach($mobileno as $mobilenos)
	{
    $mobile[$m]=$mobilenos;
	//echo $mobile[$m];
	//echo "<br>";
    $m=$m+1;
	}

$n=0;
foreach($num as $numbers)
	{
    $number[$n]=$numbers;
	//echo $number[$n];
	//echo "<br>";
    $n=$n+1;
	}
$t=0;
foreach($_SESSION['trainingid'] as $tid)
	{
    $trainingid[$t]=$tid;
	//echo $trainingid[$t];
	//echo "<br>";
    $t=$t+1;
	}
$gn=0;
$sqlm = "SELECT max(msgnumber) FROM tbltraininginfo";
$resultm = $conn->query($sqlm);
if($resultm->num_rows > 0)
	{
    if($rowm=mysqli_fetch_array($resultm))
    	{
        $mn=$rowm["max(msgnumber)"]+1;
        }
   	}
//exit;
$i=0;

foreach($munid as $id)
	{
    $munvdcid[$i]=$id;
	//echo $munvdcid[$i];
	//echo "<br>";
	//echo $number[$i];
	//echo "<br>";
	for($j=0;$j<$t;$j++)
		{
		$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue,coordinator, mobileno, starttime from tblruntraining where id='$trainingid[$j]' and remark='Running'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
   			{
    		if($row = $result->fetch_assoc())
    			{
    		   	$training= $row["trainingname"];
				//echo $training;
                $level=$row["level"];
				//echo $level;
                $subject=$row["subject"];
                $sdate=$row["startdate"];
                $edate=$row["enddate"];
                $venue=$row["venue"];
                $coordinator=$row["coordinator"];
                $cmobileno=$row["mobileno"];
                $time=$row["starttime"];
                }
     		}
						
       		$sql1 = "SELECT * FROM tbltraininginfo where runtrainingid='$trainingid[$j]' and munid='$munvdcid[$i]'";
        	$result = $conn->query($sql1);
        	if($result->num_rows > 0)
            	{
            	mysqli_query($conn,"UPDATE tbltraininginfo set coordinator='$coordinator', mobileno='$cmobileno',pnumber='$number[$i]', starttime='$time' where runtrainingid='$trainingid[$j]' and munid='$munvdcid[$i]'");
            	header('Location: ../Admin/create.php?msg= "Update Successfully"');
            	}
    		else
            	{
               	$sql="INSERT INTO tbltraininginfo(runtrainingid,msgnumber,pnumber, groupnumber, coordinator, mobileno, munid,remark, ondate,starttime,ldate) values('$trainingid[$j]','$mn','$number[$i]', '$gn', '$coordinator', '$cmobileno','$munvdcid[$i]','$remark', now(),'$time','$date')";
				if(mysqli_query($conn, $sql))
            		{
                	$sqlm="SELECT * FROM tbldistrict where ID='$munvdcid[$d]'";
                	$resultm = mysqli_query($conn,$sqlm);
                	while($rowm = mysqli_fetch_array($resultm))
                		{
                   		$mobilem=$rowm["mobileno"];
                		}
					$message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Co-Ordinator:-". $coordinator ."/Mobile No :-".$cmobileno;
					$mobileno=$mobilem;
					include("sms_code.php");
                   	header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          	       }
				else
					{
          			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          			}				
					
              	}
					
      }
	  $i++;
	  
 }
  //$message="You are selected Co-Ordinator";
  //$mobileno=$cmobileno;
  //include("sms_code.php");
 // echo $mobileno;
?>
