<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['txtneedid'];
$ecd=$_POST['checkoption'];
$other=$_POST['txtothers'];
$category=$_POST['txtcategory'];
$_SESSION['response']="";
$i=0;
foreach($ecd as $ecds)
  {
    $selectoption[$i]=$ecds;
    //echo $selectoption[$i];
    //echo "<br>";
    $i++;
  }
$sql3 = "SELECT needid FROM tbltopicselectiondetails where needid='".$tid."' and category='".$category."'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0)
  {
    $_SESSION['response']="Found Duplicate";
  header('Location: ../index.php?accountid=customize_training');
  }
else
{
for($d=0;$d<$i;$d++)
  {
    
   $sql1 = "SELECT topicid,optindexno FROM tbltopicselection where selectionid='".$selectoption[$d]."'";
   $result = $conn->query($sql1);
   if ($result->num_rows > 0)
     {
      if($row = mysqli_fetch_array($result))
        {
          $topicid=$row["topicid"];
          $indexno=$row["optindexno"];
         $insertsql = "INSERT INTO tbltopicselectiondetails(category, needid,topicid,selectionid,optindexno,extramsg,submitdate,ondate,remark) values('".$category."','".$tid."','".$topicid."','".$selectoption[$d]."','".$indexno."','','0000/00/00',now(),'Submit')";
        if (mysqli_query($conn, $insertsql))
          {
            $_SESSION['response']="Save Successfully";
            header('Location: ../index.php?accountid=customize_training');
          }
        else
          {
            $message= "Selection Details:" . $sql . "<br>" . mysqli_error($conn);
             echo $message;
            header('Location: ../error.php?msg= "Sorry, Try Later..."');
          }
        }
         
      }
}
 mysqli_query($conn,"INSERT INTO tbltopicselectiondetails(category, needid,topicid,selectionid,optindexno,extramsg,submitdate,ondate,remark) values('".$category."','".$tid."','0','0','0','".$other."','0000/00/00',now(),'Submit')");
}
mysqli_close($conn);
?>
