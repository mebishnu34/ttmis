<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<?php
   include("../Processing/db_connection.php");
?>
<table width="100%" class="table_design">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th></th>
</tr>
<tr>
<td colspan="8" align="center" bgcolor="#CCCCCC"><b>शिक्षक पेशागत विकास</td>
</tr>
<?php
$i=1;
$activeuser="";
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user,coordinator from tblruntraining where trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				$cid=$row["id"];
            $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."-".$row["coordinator"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>Teacher</a>";
				 		echo "&nbsp;&nbsp;"; 
                  if($activeuser==$_SESSION['lname'])
                  {
                  echo "<a href=../Input/edit_new_training.php?linkid=$row[id] target=_blank>Edit</a>";
                  }
                  echo "&nbsp;&nbsp; <a href=../Display/training_message_letter.php?linkid=$row[id] target=_blank>Letter</a>
                  &nbsp;&nbsp; <a href=../Display/training_message_letter_1.php?linkid=$row[id] target=_blank>Details</a>
				      </td>";
                $i++;
                echo "</tr>";
                }
     }
				?>
<tr>
<td colspan="8" align="center" bgcolor="#CCCCCC"><b>पुनर्ताजगी</td>
</tr>
<?php
$i=1;
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user,coordinator from tblruntraining where trainingname='पुनर्ताजगी' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["id"];
              $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."-".$row["coordinator"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                echo "<td bgcolor=blue align=center><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>Teacher</a>";
                echo "&nbsp;&nbsp;"; 
               if($activeuser==$_SESSION['lname'])
               {
               echo "<a href=../Input/edit_new_training.php?linkid=$row[id] target=_blank>Edit</a>";
               }
               echo "&nbsp;&nbsp; <a href=../Display/training_message_letter.php?linkid=$row[id] target=_blank>Letter</a>
               &nbsp;&nbsp; <a href=../Display/training_message_letter_1.php?linkid=$row[id] target=_blank>Details</a>
               </td>";
                $i++;
                echo "</tr>";
                }
     }
				?>

<tr>
<td colspan="8" align="center" bgcolor="#CCCCCC"><b>नेतृत्व तथा व्यवस्थापन</b></td>
</tr>
<?php
$i=1;
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user, coordinator from tblruntraining where trainingname='नेतृत्व तथा व्यवस्थापन' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["id"];
              $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."-".$row["coordinator"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                echo "<td bgcolor=blue align=center><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>Teacher</a>";
                echo "&nbsp;&nbsp;"; 
               if($activeuser==$_SESSION['lname'])
               {
               echo "<a href=../Input/edit_new_training.php?linkid=$row[id] target=_blank>Edit</a>";
               }
               echo "&nbsp;&nbsp; <a href=../Display/training_message_letter.php?linkid=$row[id] target=_blank>Letter</a>
               &nbsp;&nbsp; <a href=../Display/training_message_letter_1.php?linkid=$row[id] target=_blank>Details</a>
               </td>";
                $i++;
                echo "</tr>";
                }
     }

     ?>
<tr>
<td colspan="8" align="center" bgcolor="#CCCCCC"><b>सेवा प्रवेश</b></td>
</tr>
<?php
$i=1;
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user,coordinator from tblruntraining where trainingname='सेवा प्रवेश' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["id"];
              $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."-".$row["coordinator"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                echo "<td bgcolor=blue align=center><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>Teacher</a>";
                echo "&nbsp;&nbsp;"; 
               if($activeuser==$_SESSION['lname'])
               {
               echo "<a href=../Input/edit_new_training.php?linkid=$row[id] target=_blank>Edit</a>";
               }
               echo "&nbsp;&nbsp; <a href=../Display/training_message_letter.php?linkid=$row[id] target=_blank>Letter</a>
               &nbsp;&nbsp; <a href=../Display/training_message_letter_1.php?linkid=$row[id] target=_blank>Details</a>
               </td>";
                $i++;
                echo "</tr>";
                }
     }

     ?>
   
 </table>
