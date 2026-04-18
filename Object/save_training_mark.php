<?php
session_start();
//include("object_include.php");s
include("../Processing/db_connection.php");
$trainingid=$_POST['trainingid'];
$tid=$_POST['teacherid'];
$obtmark=$_POST['obtmark'];
$i=0;
foreach($trainingid as $trainingids)
  {
    $traid[$i]=$trainingids;
//    echo $traid[$i];
    $i++;
  }
$j=0;
  foreach($tid as $tids)
  {
    $teacher[$j]=$tids;
    //echo $teacher[$j];
    $j++;
  }
$k=0;
  foreach($obtmark as $obtmarks)
  {
    $mark[$k]=$obtmarks;
    //echo $mark[$k];
    $k++;
  }
  exit;
for($d=0;$d<$k;$d++)
  {
    
   $sql1 = "SELECT teacherid FROM tblmarkdetails where teacherid='".$teacher[$d]."' and trainingid='".$traid[$d]."'";
   $result = $conn->query($sql1);
   if ($result->num_rows > 0)
     {
       $sql = "Update tblmarkdetails set subjective='$mark[$d]' where teacherid='".$teacher[$d]."' and trainingid='".$traid[$d]."'";
       if (mysqli_query($conn, $sql))
          {
            header('Location: ../Admin/entry.php?msg= "Update Successfully"');
          }
       else
          {
            $message= "Save_Mark:" . $sql . "<br>" . mysqli_error($conn);
            $mobileno="9851001482";
            include("sms_code.php");
            echo $message;
          //header('Location: ../Input/teacher_training_running.php?msg= "Sorry, Try Later..."');
          }
      }
      else
        {
          $sql = "INSERT INTO tblmarkdetails(entrydate,trainingid, teacherid,subjective,present,dicipline,activeness,objective,reporting, remark,importno) values(now(),'".$traid[$d]."','$teacher[$d]','$mark[$d]','0','0','0','0','0','Applicant','0')";
          if (mysqli_query($conn, $sql))
            {
              header('Location: ../Admin/entry.php?msg= "Saved Successfully"');
            }
          else
            {
              $message= "Save_Mark:" . $sql . "<br>" . mysqli_error($conn);
		          $mobileno="9851001482";
		          include("sms_code.php");
              echo $message;
		       // header('Location: ../Input/teacher_training_running.php?msg= "Sorry, Try Later..."');
            }
           
        }
    
   }
mysqli_close($conn);
?>
