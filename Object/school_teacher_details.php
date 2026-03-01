<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<table width="100%" border="1" bgcolor="#FFFFFF">
<?php
$sn=1;
include("Processing/db_connection.php");
if(isset($_GET['tid']))
{
$teacherid = $_GET['tid'];
}
$sql1 = "SELECT * FROM tblteacher where teachercode='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<tr>";
         echo "<td width=30%>Teacher ID</td>";
         echo "<td>". $row['teacherid'] . "</td>";
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
</BODY>
</HTML>
