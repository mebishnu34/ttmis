<?php
session_start();
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
</HEAD>
<BODY class="bg">
<div align="center">

<table width="100%" class="subtable">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
</tr>
<?php
$year=$_POST['cmbyear'];
$_SESSION['appyear']=$year;
$sn=1;
include("../Processing/db_connection.php");
$sql = "SELECT * FROM tblruntraining where financialyear='" . $year . "' ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
          echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $row["trainingname"] . "</td>";
         echo "<td align=center>" . $row["level"] . "</td>";
         echo "<td align=center>" . $row["subject"] . "</td>";
         echo "<td align=center>" . $row["startdate"] . "</td>";
         echo "<td align=center>" . $row["enddate"] . "</td>";
         echo "<td align=center>" . $row["venue"] . "</td>";
         echo "<td align=center bgcolor=blue><a href=../Display/teacher_training_list.php?tid=$row[trainingid] target=_blank>Allowance</a> &nbsp;&nbsp;<a href=../Display/teacher_attendance_sheet.php?tid=$row[trainingid] target=_blank>Attendance</a></td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</div>
</BODY>
</HTML>
