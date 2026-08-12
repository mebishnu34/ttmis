<?php
session_start();
include("../Processing/db_connection.php");
$tcode=$_POST['txtcode'];
$date=$_SESSION['$tdate'];
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

$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$trainingid' and remark='Running'";
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
$sqlm = "SELECT max(msgnumber) FROM tblmuncipalityinfo";
        $resultm = $conn->query($sqlm);
        if($resultm->num_rows > 0)
            {
                if($rowm=mysqli_fetch_array($resultm))
                {
                    $mn=$rowm["max(msgnumber)"]+1;
                }
            }
        
if($trainingid=="")
{
 header('Location: ../Admin/create.php?msg="Select Training"');
}
else
{
   $sql1="SELECT scode FROM tblteacher where teacherid='$tcode'";
   $teacher = mysqli_query($conn,$sql1);
   if($row1 = mysqli_fetch_array($teacher))
       {
        $scode=$row1["scode"];
       }
   $sql1 = "SELECT * FROM tblmuncipalityinfo where trainingid='$trainingid' and teacherid='$tcode'";
   $result = $conn->query($sql1);
   if ($result->num_rows > 0)
      {
       header('Location: ../municipality_application.php?msg="Already Exist"');
      }
   else
      {
      			$sql = "INSERT INTO tblmuncipalityinfo(schoolcode,munvdc,trainingid,teacherid,msgnumber, pnumber,ondate,ldate, remark) values('$scode','$_SESSION[uname]','$trainingid','$tcode','$mn', '1', now(),'$date','Request')";
     		 if (mysqli_query($conn, $sql))
          		{
                 	header('Location: ../municipality/add_participate_in_training_lgov.php?msg= "Saved Successfully"');
                }
              else
                {
                	$message= "Save_participate_from_munvdc" . $sql . "<br>" . mysqli_error($conn);
				  	$mobileno="9851001482";
				  	include("sms_code.php");
				  	header('Location: ../muncipality/add_participate_in_training_lgov.php?msg= "Sorry, Try Later..."');
                }
      }

}
 mysqli_close($conn);
?>
