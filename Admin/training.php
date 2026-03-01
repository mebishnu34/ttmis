<?php
session_start();
?>

<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%" class="dtable">
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
<th></th>
</tr>
<?php
$q = $_GET['q'];
$_SESSION['training']=$_GET['q'];
$sn=1;
include("../Processing/db_connection.php");
if($q=="Completed")
{
$sql = "SELECT * FROM tblruntraining where remark='Completed' ORDER BY trainingname";
}
else if($q=="Running")
{
 $sql = "SELECT * FROM tblruntraining where remark='Running' ORDER BY trainingname";
}
else
{
$sql = "SELECT * FROM tblruntraining ORDER BY trainingname";
}

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
		 echo "<td align=center><a href=../Input/edit_training.php?tid=$row[id] target=_blank>Edit</a></td>";
		 echo "<td align=center><a href=../Input/send_sms_teacher.php?tid=$row[id] target=_blank>Send SMS</a></td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
