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
   $_SESSION['financialyear']=$financial_year;
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
<?php
$i=1;
$activeuser="";
if($_SESSION['utype']=="Administrator")
   {

$sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where financialyear='".$financial_year."' and remark='Running' ORDER BY starttime, subject";
   }
else
   {
      $sql = "SELECT id, trainingname, level, subject, coordinator, startdate, enddate,venue,user from tblruntraining where financialyear='".$financial_year."' and user='".$_SESSION['lname']."' and remark='Running' ORDER BY starttime, subject";
   }
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
                echo "<td bgcolor=blue align=center><a href=../Input/school_code.php?id=$row[id] target=_blank>Add Participate</a> // <a href=../Input/student_code.php?id=$row[id] target=_blank>Teacher</a>// <a href=../Input/applicant_list.php?id=$row[id] target=_blank>Applicant</a></td>";
              	$i++;
                echo "</tr>";
                }
     }
				?>
    </table>
</div>
<body>
</html>