<?php
session_start();
   include("Processing/db_connection.php");
   include("Processing/db_palika_connection.php");
   include("title.htm");
   $munid=$_SESSION['tid'];
?>
<table width="100%">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
<th></th>
</tr>
<?php
$i=1;
$sqlm="SELECT runtrainingid from tbltraininginfo where munid='$munid'";
$resultm = $conn->query($sqlm);
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
    $id=$rowm["runtrainingid"];
    $sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$id' and remark='Running' ORDER BY trainingname";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
            {
			     echo "<tr>";
                 echo "<td>". $i . $row["trainingid"]. "</td>";
				$sql1 = "SELECT * from tblmuncipalityinfo where munvdc='$_SESSION[uname]' and trainingid='$row[trainingid]' and remark='Request'";
				$res = $conn->query($sql1);
				if ($res->num_rows > 0)
			   		{
                 		echo "<td bgcolor=blue><a href=municipality/display_palikarequest_for_training.php?id=$row[trainingid] target=_blank>". $row["trainingname"]."[". $res->num_rows ."]</a> </td>";
					}
				else
					{
                 		echo "<td>". $row["trainingname"]."</td>";
					}
				$_SESSION['trainingname']=$row["trainingname"];
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                 echo "<td>". $row["venue"]."</td>";
                echo "<td bgcolor=blue align=center><a href=municipality/school_teacher.php?id=$row[trainingid] target=_blank>School</a>&nbsp;&nbsp;<a href=municipality/add_participate_in_training_lgov.php?id=$row[trainingid] target=_blank>Teacher</a></td>";
					$i++;
                echo "</tr>";
                }
     }
     }
     }
				?>
 </table>
<br><br>   
  <center><font size="+2"><b>Internal Training Package</b></font></center>
  
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
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				$cid=$row["trainingid"];
				$csql = "SELECT coordinator FROM tblttraining where runid='$cid'";
				$cresult=$palikaconn->query($csql);
				 echo "<td>". $i . "</td>";
				$sql1 = "SELECT * from tblttraining where munid='$_SESSION[tid]' and trainingid='$row[trainingid]'";
				$res = $palikaconn->query($sql1);
				if ($res->num_rows > 0)
			   		{
                 		echo "<td bgcolor=blue><a href=municipality/display_palika_for_training.php?id=$row[trainingid] target=_blank>". $row["trainingname"]."[". $res->num_rows ."]</a> </td>";
					}
				else
					{
                 		echo "<td>". $row["trainingname"]."</td>";
					}
				$_SESSION['trainingname']=$row["trainingname"];
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
               //  echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=municipality/school_teacher_internal.php?id=$row[trainingid] target=_blank>School</a>&nbsp;&nbsp;<a href=municipality/add_teacher.php?id=$row[trainingid] target=_blank>Teacher</a></td>";
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
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid'";
				$cresult=$palikaconn->query($csql);
				 echo "<td>". $i . "</td>";
				$sql1 = "SELECT * from tblttraining where munid='$_SESSION[tid]' and trainingid='$row[trainingid]'";
				$res = $palikaconn->query($sql1);
				if ($res->num_rows > 0)
			   		{
                 		echo "<td bgcolor=blue><a href=municipality/display_palika_for_training.php?id=$row[trainingid] target=_blank>". $row["trainingname"]."[". $res->num_rows ."]</a> </td>";
					}
				else
					{
                 		echo "<td>". $row["trainingname"]."</td>";
					}
				$_SESSION['trainingname']=$row["trainingname"];
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=municipality/school_teacher_internal.php?id=$row[trainingid] target=_blank>School</a>&nbsp;&nbsp;<a href=municipality/add_teacher.php?id=$row[trainingid] target=_blank>Teacher</a></td>";
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
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid'";
				$cresult=$palikaconn->query($csql);
				 echo "<td>". $i . "</td>";
                 $sql1 = "SELECT * from tblttraining where munid='$_SESSION[tid]' and trainingid='$row[trainingid]'";
				$res = $palikaconn->query($sql1);
				if ($res->num_rows > 0)
			   		{
                 		echo "<td bgcolor=blue><a href=municipality/display_palika_for_training.php?id=$row[trainingid] target=_blank>". $row["trainingname"]."[". $res->num_rows ."]</a> </td>";
					}
				else
					{
                 		echo "<td>". $row["trainingname"]."</td>";
					}
				$_SESSION['trainingname']=$row["trainingname"];
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=municipality/school_teacher_internal.php?id=$row[trainingid] target=_blank>School</a>&nbsp;&nbsp;<a href=municipality/add_teacher.php?id=$row[trainingid] target=_blank>Teacher</a></td>";
					$i++;
                echo "</tr>";
                }
     }
				?>

    </table>
