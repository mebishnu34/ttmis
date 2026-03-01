<?php
session_start();
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
include('database/db_connection1.php');
$sql = mysql_query("SELECT stucode, stuname, paddress, image  FROM tblstudent where stucode='$_SESSION[stucode]'",$con1);
$data=mysql_fetch_array($sql)
?>
<table width="1000" align="center">
<tr>
<td align="left"><img src="image/banner.jpg"></td>
<td><img src="image/sagar.jpg" width="200" height="100"></td>
</tr>
</table>
<table border=0 bordercolor=#FFFF00 width=1000 align=center bgcolor=#FFFFCC>
<tr>
<?php
	$stucode=$data['stucode'];
	$stuname=$data['stuname'];
	$address=$data['address'];
	$content=$data['photo'];
echo "<td valign=top align=center width=1000>";
include("display_Rules.php"); 
echo "</td>";
echo "<td>";
echo "<table width=200, border=0 align=right>";
echo "<tr>";
echo "<td>";
echo '<img src="data:image/jpeg;base64,' . base64_encode($data['image']) . '" width="150" height="200">';
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Code No. " . $stucode;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Name of Student :" . $stuname;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Address : " .$address;
echo "</td>";
echo "<tr>";
echo "<tr>";
echo "<td>";
echo "<a href=index.php?log=logoff>Log Off</a>";
echo "</td>";
echo "<tr>";
echo "</table>";
echo "</td>";
$i=0;
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 bgcolor=#0000FF align=center><font color =#FFFFFF><B>List Of Course(s)</b></font></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 align=center>";
	include("Student_CourseDetails.php");
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 bgcolor=#0000FF align=center><font color=#FFFFFF><B>List of Topics</B></font></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 align=center>";
	include("Student_TopicDetails.php");
echo "</td>";
echo "</tr>";
echo "</table>";
?>

