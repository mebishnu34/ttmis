<?php
session_start();
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
$gn=$_POST['cmbgnumber'];
$coordinator=$_POST['txtcoordinator'];
$mobileno=$_POST['txtmobile'];

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
if($trainingid=="")
{
 header('Location: ../Admin/create.php?msg="Select Training"');
}
else
{
     $rem=$_POST['rem'];
     $i=0;
	$k=0;
foreach($rem as $rems)
	{
	$teacherid[$k]=$rems;
 	$k++;
	}
   for($d=0; $d<$k;$d++)
	{
	if($teacherid[$d]<>"" and $coordinator<>"" and $mobileno<>"")
        {
                 $sql1="SELECT scode,munvdc FROM tblteacher where teacherid='$teacherid[$d]'";
                 $teacher = mysqli_query($conn,$sql1);
                 if($row1 = mysqli_fetch_array($teacher))
                    {
                    $scode=$row1["scode"];
					$munvdc=$row1["munvdc"];
					$munid="";
					//echo $munvdc;
					//exit;
					$sql2="SELECT ID FROM tbldistrict where munvdc='$munvdc'";
                 	$teacher1 = mysqli_query($conn,$sql2);
                 		if($row2 = mysqli_fetch_array($teacher1))
                    		{
                    		$munid=$row2["ID"];
                    		}

                    }
			$sql1 = "SELECT * FROM tblttraining where trainingid='$trainingid' and teacherid='$teacherid[$d]' And sdate='$sdate' and edate='$edate'";
             $result = $conn->query($sql1);
                if ($result->num_rows > 0)
                {
                header('Location: ../Admin/create.php?msg="Already Exist"');
                 }
              else
                {
                $sql = "INSERT INTO tblttraining(teacherid, trainingid, schoolcode,munid ,gnumber, coordinator, mobileno, sdate, edate, remark) values('$teacherid[$d]','$trainingid','$scode','$munid', '$gn', '$coordinator','$mobileno','$sdate','$edate','Running')";
                if (mysqli_query($conn, $sql))
                {
                $mobileno=$mobileno;
                $message="TTMIS::Training:-".$training."/Level:-".$level . "/Subject:-".$subject ."/Start Date:-".$sdate ."/End Date:-".$edate ."/Venue:-".$venue ."/Group No.:-" . $gn. "/Co-Ordinator:-". $coordinator ."/Mobile No :-".$mobileno;
                include("../Object/sms_code.php");
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
  }
 mysqli_close($conn);
?>
