<?php
session_start();
$date=$_SESSION['$tdate'];
$scode=$_POST['scodes'];
$nums=$_POST['pnum'];
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

$n=0;
foreach($nums as $numbers)
{
    $pnumber[$n]=$numbers;
    //echo $pnumber[$n];
    $n++;
}
/*
$t=0;
foreach($_SESSION['trainingid'] as $tid)
{
    $trainingid[$t]=$tid;
    //echo $trainingid[$t];
    $t=$t+1;
}*/
include("../Processing/db_connection.php");
$sqlm = "SELECT max(msgnumber) FROM tblschoolinfo";
        $resultm = $conn->query($sqlm);
        if($resultm->num_rows > 0)
            {
                if($rowm=mysqli_fetch_array($resultm))
                {
                    $mn=$rowm["max(msgnumber)"]+1;
                }
            }
        
if($_SESSION['trainingid']=="")
{
  header('Location: ../municipality_application.php?msg="Fields Are Required"');
}
else
{
$i=0;
foreach($scode as $codes)
{
	//echo $schoolcode[$j];
	//echo "<br>";
	//echo $pnumber[$j];
	//echo "<br>";
	for($j=0;$j<$t;$j++)
		{
	 $sql1 = "SELECT * FROM tblschoolinfo where trainingid='$trainingid[$j]' and schoolcode='$codes'";
     $result = $conn->query($sql1);
     if ($result->num_rows > 0)
       {
       	mysqli_query($conn,"UPDATE tblschoolinfo set pnumber='$pnumber[$i]' where trainingid='$trainingid[$j]' and schoolcode='$codes'");
       	header('Location: ../municipality_application.php?msg= "Update Successfully"');
       }
     else
       {
                //echo $j;
			//echo $pnumber[$j];
			//echo "hello1";
			
			// mysqli_query($conn,"INSERT INTO tblschoolinfo(trainingid,msgnumber,pnumber,munvdc,schoolcode, ondate, ldate) values('$traid','$mn','$pnumber[$j]','$_SESSION[uname]', '$schoolcode[$j]', now(),'$date')");
		$sql="INSERT INTO tblschoolinfo(trainingid,msgnumber,pnumber,munvdc,schoolcode, ondate, ldate) values('$trainingid[$j]','$mn','$pnumber[$i]','$_SESSION[uname]', '$codes', now(),'$date')";
        if (mysqli_query($conn, $sql))
            {
              $message="Please Receive Letter of Training";
		      $mobileno=$mobileno[$j];
		      include("sms_code.php");
              header('Location: ../municipality_application.php?msg= "Saved Successfully"');
            }
        else
           {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           } 
       	/*$message="Please Receive Letter of Training";
		$mobileno=$mobileno[$j];
		include("sms_code.php");
		  header('Location: ../municipality_application.php?msg= "Saved Successfully"');*/
      }
	 }
	 $i++;
   }
}
mysqli_close($conn);
?>
