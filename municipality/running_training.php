<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<?php
   include("Processing/db_connection.php");
      include("Processing/db_palika_connection.php");
?><font size="+2"><b><center>
केन्द्रबाट स‌चालन भैइराखेका तालिमहरु</center></b></font>
<table width="90%" class="table_design" align="center">
<tr>
<th>S.No</th>
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				 $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_lgov.php?linkid=$row[trainingid] target=_blank>Teacher</a></td>";
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingname='पुनर्ताजगी' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_lgov.php?linkid=$row[trainingid] target=_blank>Teacher</a> </td>";
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingname='नेतृत्व तथा व्यवस्थापन' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		      $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid'";
				$cresult=$conn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_lgov.php?linkid=$row[trainingid] target=_blank>Teacher</a></td>";
                $i++;
                echo "</tr>";
                }
     }
				?>

 </table>


<font size="+2"><b><center>
पालिकाबाट स‌चालन भैइराखेका तालिमहरु</center></b></font>
<table width="90%" class="table_design" align="center">
<tr>
<th>S.No</th>
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				 $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where munid='$_SESSION[tid]' and trainingid='$cid'";
				$cresult=$palikaconn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_palika.php?linkid=$row[trainingid] target=_blank>Teacher</a></td>";
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='पुनर्ताजगी' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where munid='$_SESSION[tid]' and trainingid='$cid'";
				$cresult=$palikaconn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_palika.php?linkid=$row[trainingid] target=_blank>Teacher</a> </td>";
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='नेतृत्व तथा व्यवस्थापन' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     $cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where munid='$_SESSION[tid]' and trainingid='$cid'";
				$cresult=$palikaconn->query($csql);
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=Display/run_training_palika.php?linkid=$row[trainingid] target=_blank>Teacher</a></td>";
                $i++;
                echo "</tr>";
                }
     }
				?>

 </table>
