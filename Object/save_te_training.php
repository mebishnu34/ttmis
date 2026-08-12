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
$groupno=$_POST['txtgnumber'];
$coordinator=$_POST['txtcoordinator'];
$mobile=$_POST['txtmobile'];
$div=$_POST['txtdivision'];
//echo $subject;
//$teachertrainingobject->saveteachertraining($tid, $traid, $tn, $sd, $ed, $r);
//echo "Records Saved";
if($training=="" and $level=="" and $subject=="" and $sdate=="" and $edate=="" and $venue=="")
{
  header('Location: ../Admin/create.php?msg="Fields Are Required"');
}
else
{
$traid="";
  	$sql1 = "SELECT * FROM tbltraining where trainingname='$training' and level='$level' and subject='$subject'";
  	$result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
           if($row1 = $result1->fetch_assoc())
             {
                $traid=$row1['ID'];
             }
		  }	
	//echo $traid;
	
		  /*echo $training;
		  echo "<br>";
		  echo "Level".$level;
		  echo "<br>";
		  echo $subject;
		  		  echo "<br>";
		 echo $traid;
		 		  echo "<br>";
				 */
				 $scode="";
				 
	$sql1 = "SELECT * FROM tblteacher where teachercode='$_SESSION[tid]'";
   $result2 = $conn->query($sql1);

   if ($result2->num_rows > 0)
      {
      while($row2 = $result2->fetch_assoc())
         {
         $scode=$row2['scode'];
		 }
	}			 
				 
     $sql = "INSERT INTO tblttrainingrequest(teacherid, trainingid, schoolcode, gnumber, coordinator, mobileno, sdate, edate, remark, duration,division, organization) values('$_SESSION[tid]','$traid', '$scode', '$groupno','$coordinator','$mobile', '$sdate','$edate','Request','$days','$div','$venue')";
      if (mysqli_query($conn, $sql))
         {
           header('Location: ../application.php?msg= "Saved Successfully"');
          }
      else
          {
          $message= "Request training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  //include("sms_code.php");
		 //header('Location: ../application.php?msg= "Sorry, Try Later..."');
		 echo $message;
          }
 }
mysqli_close($conn);
?>
