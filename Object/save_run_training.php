<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$training=$_POST['cmbtraining'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$sdate=$_POST['txtsdate'];
$edate=$_POST['txtedate'];
$venue=$_POST['txtvenu'];
$days=$_POST['txtdays'];
$coordinator=$_POST['txtcoordinator'];
$cmobileno=$_POST['txtmobile'];
//$remark=$_POST['txtremark'];
$time=$_POST['txttime'];

//echo $subject;
//$teachertrainingobject->saveteachertraining($tid, $traid, $tn, $sd, $ed, $r);
//echo "Records Saved";
if($training=="" and $level=="" and $subject=="" and $sdate=="" and $edate=="" and $venue=="")
{
  header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
 $sql1 = "SELECT * FROM tblruntraining where trainingname='$training' and level='$level' and subject='$subject' and startdate='$sdate' and enddate='$edate' and venue='$venue'";
$result = $conn->query($sql1);

if ($result->num_rows > 0)
   {
      header('Location: ../Admin/create.php?msg="Found Duplicate"');
    }
 else
  {
    
  	$sql1 = "SELECT * FROM tbltraining where trainingname='$training' and level='$level' and subject='$subject'";
  	$result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
           if($row1 = $result1->fetch_assoc())
             {
                $traid=$row1['ID'];
             }
		  }	
		  /*echo $training;
		  echo "<br>";
		  echo "Level".$level;
		  echo "<br>";
		  echo $subject;
		  		  echo "<br>";
		 echo $traid;
		 		  echo "<br>";
				 */
     $sql = "INSERT INTO tblruntraining(trainingname,trainingid, level, subject, startdate, enddate, trainingdays,venue,coordinator, mobileno,starttime, remark, user) values('$training','$traid', '$level', '$subject', '$sdate','$edate','$days','$venue','$coordinator','$cmobileno','$time','Running','$_SESSION[lname]')";
      if (mysqli_query($conn, $sql))
         {
           header('Location: ../Admin/create.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "save_run_training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		 header('Location: ../Admin/create.php?msg= "Sorry, Try Later..."');
		 //echo $message;
          }
  }
}
mysqli_close($conn);
?>
