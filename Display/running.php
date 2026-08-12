<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
  <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>

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
<?php
$fyear=$_POST['cmbyear'];
$i=1;
$activeuser="";
if($_SESSION['utype']=="Administrator")
   {
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user,coordinator from tblruntraining where financialyear='".$fyear."' and remark='Running' ORDER BY starttime DESC,subject";
   }
else
   {
      $sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue,user,coordinator from tblruntraining where financialyear='".$fyear."' and remark='Running' and user='".$_SESSION['lname']."' ORDER BY starttime DESC,subject";
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
                  echo "<a href=../Input/edit_new_training.php?linkid=$row[id] target=_blank>Edit</a>";
                  echo "&nbsp;&nbsp; <a href=../Display/training_message_letter.php?linkid=$row[id] target=_blank>Letter</a>
                  &nbsp;&nbsp; <a href=../Display/training_message_letter_1.php?linkid=$row[id] target=_blank>Details</a>
				      </td>";
                $i++;
                echo "</tr>";
                }
     }
				?>

 </table>
</body>
</html>
