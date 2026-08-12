<HTML>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<?php
   include("Processing/db_palika_connection.php");
   include("title.htm");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
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
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
			$cid=$row["id"];
				$csql = "SELECT coordinator FROM tblttraining where runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
               //  echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a></td>";
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
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='पुनर्ताजगी' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    { 
			    $cid=$row["id"];
				$csql = "SELECT coordinator FROM tblttraining where runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a></td>";
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
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where palikaid='$_SESSION[tid]' and trainingname='नेतृत्व तथा व्यवस्थापन' and remark='Running' ORDER BY subject";
$result = $palikaconn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				  $cid=$row["id"];
				$csql = "SELECT coordinator FROM tblttraining where runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a></td>";
					$i++;
                echo "</tr>";
                }
     }
				?>

    </table>
</BODY>
</HTML>
