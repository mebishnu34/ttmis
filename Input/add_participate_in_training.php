<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS Bagamati</TITLE>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="../CSS/main_table.css">
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY class="bg">
<div align="center">
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
   $financial_year=$_POST["cmbyear"];
   $sdate="";
   $edate="";
   include("../financial_year.php");
?>
<p><h1>Running Training on Financial <?php echo $financial_year;?></h1></p>
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
$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and trainingname='शिक्षक पेशागत विकास' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
			$cid=$row["id"];
         $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]. "-". $row["coordinator"] ."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td bgcolor=blue><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</a></td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
               //  echo "<td>". $row["venue"]."</td>";
               if($activeuser==$_SESSION['lname'])
               {
                echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>sdfdAdd Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a>// <a href=../Input/applicant_list.php?id=$row[id] target=_blank>Applicant</a></td>";
               }
               else
               {
                 echo "<td bgcolor=blue align=center><a href=../Input/applicant_list.php?id=$row[id] target=_blank>Applicant</a></td>";
               }
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
$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and trainingname='पुनर्ताजगी' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    { 
			    $cid=$row["id"];
             $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
             echo "<td>". $row["trainingname"]. "-". $row["coordinator"] ."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td bgcolor=blue><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</a></td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                if($activeuser==$_SESSION['lname'])
                {
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a>//<a href=../Input/applicant_list.php?id=$row[id] target=_blank>Applicant</a></td>";
                }
                else
                {
                  echo "<td bgcolor=blue align=center><a href=../Input/applicant_list.php?id=$row[id] target=_blank>Applicant</a></td>";
                }
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
$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and trainingname='नेतृत्व तथा व्यवस्थापन' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				  $cid=$row["id"];
              $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
             echo "<td>". $row["trainingname"]. "-". $row["coordinator"] ."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td bgcolor=blue><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</a></td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                if($activeuser==$_SESSION['lname'])
                {
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a></td>";
                }
                else
                {
                  echo "<td>&nbsp;</td>";
                }
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
$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where startdate>='".$sdate."' and enddate<='".$edate."' and trainingname='सेवा प्रवेश' and remark='Running' ORDER BY subject";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				  $cid=$row["id"];
              $activeuser=$row["user"];
				$csql = "SELECT coordinator FROM tblttraining where trainingid='$cid' or runid='$cid'";
				$cresult=$conn->query($csql);
				 echo "<td>". $i . "</td>";
             echo "<td>". $row["trainingname"]. "-". $row["coordinator"] ."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td bgcolor=blue><a href=../Display/run_training_1.php?linkid=$row[id] target=_blank>". $row["subject"]."(<b>". $cresult->num_rows ."</b>)"."</a></td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                // echo "<td>". $row["venue"]."</td>";
                if($activeuser==$_SESSION['lname'])
                {
                 echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a></td>";
                }
                else
                {
                  echo "<td>&nbsp;</td>";
                }
					$i++;
                echo "</tr>";
                }
     }
	?>

    </table>
</div>
<body>
</html>