<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>Teacher Details</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table width="90%">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>
<div align="center"><font size="+2"><b>Teacher Details</b></font></div>
<hr>
<table class="teacherdetails" border="0">
<?php
$sn=1;
include("../Processing/db_connection.php");
$teacherid = $_GET['tid'];
$sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)

      {
      if($row = $result1->fetch_assoc())
         {
        echo "<tr>";
         echo "<td width=30%>Teacher Code</td>";
         echo "<td>". $row['teachercode'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Name of Teacher</td>";
         echo "<td>". $row['tname'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Gender</td>";
         echo "<td>". $row['gender'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Date of Birth</td>";
         echo "<td>". $row['dob'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Address</td>";
         echo "<td>". $row['address'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Email Address</td>";
         echo "<td>". $row['email'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>District</td>";
         echo "<td>". $row['district'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Municipality/VDC</td>";
         echo "<td>". $row['munvdc'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Ward No.</td>";
         echo "<td>". $row['wardno'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Mobile No.</td>";
         echo "<td>". $row['tcontact'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Appointment Date</td>";
         echo "<td>". $row['appointdate'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Appointment Type</td>";
         echo "<td>". $row['appointtype'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Appointment Level</td>";
         echo "<td>". $row['workinglevel'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Teaching Level</td>";
         echo "<td>". $row['teachinglevel'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Qualification</td>";
         echo "<td>". $row['qualification'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Faculty</td>";
         echo "<td>". $row['faculty'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Major Subject</td>";
         echo "<td>". $row['majorsubject'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Teacher Subject</td>";
         echo "<td>". $row['teachingsubject'] . "</td>";
         echo "</tr>";

         }
   }
?>
</table>
</div>
</BODY>
</HTML>
