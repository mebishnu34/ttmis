<?php
session_start();
//include("object_include.php");
include("../Processing/db_connection.php");
$tid=$_POST['txtneedid'];
$ecd=$_POST['ecd'];
$other=$_POST['txtothers'];
$status="";
$i=0;
foreach($ecd as $ecds)
  {
    $selectoption[$i]=$ecds;
    //echo $selectoption[$i];
    //echo "<br>";
    $i++;
  }
  
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
          $sql2 = "SELECT category FROM tbltopic where topicid='".$topicid."'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0)
          {
            if($row2 = mysqli_fetch_array($result2))
              {
                $category=$row2["category"];
                $sql3 = "SELECT needid FROM tbltopicselectiondetails where needid='".$tid."' and category='".$category."'";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0)
                 {
                  header('Location: ../index.php?msg= "Found Duplicate"');
                 }
                else
                {
                $insertsql = "INSERT INTO tbltopicselectiondetails(category, needid,topicid,selectionid,optindexno,extramsg,submitdate,ondate,remark) values('".$category."','".$tid."','".$topicid."','".$selectoption[$d]."','".$indexno."','','0000/00/00',now(),'Submit')";
                if (mysqli_query($conn, $insertsql))
                  {
                    header('Location: ../index.php?msg= "Saved Successfully"');
                    $status="Save";
                  }
                else
                  {
                    $message= "Save_Mark:" . $sql . "<br>" . mysqli_error($conn);
		                // echo $message;
		                header('Location: ../error.php?msg= "Sorry, Try Later..."');
                  }
                }
              }
          }
        }
     }
   }
if($status=="Save")
  {
 mysqli_query($conn,"INSERT INTO tbltopicselectiondetails(category, needid,topicid,selectionid,optindexno,extramsg,submitdate,ondate,remark) values('".$category."','".$tid."','0','0','0','".$other."','0000/00/00',now(),'Submit')");
  }
 
mysqli_close($conn);
?>
