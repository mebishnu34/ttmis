<HTML>
<HEAD>
 <TITLE>TTMIS:Personal Details</TITLE>
</HEAD>
<BODY>
<?php 
include("../print_function.php");
?>
<div id="pdata">
<center><font size="+2">Teacher Personal Details</font></center>
<table width="90%" border="1" bgcolor="#FFFFFF" cellpadding="10" align="center">
<?php
$sn=1;
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
$teacherid = $_GET['tid'];
}
$sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		 echo "<tr>";
         echo "<td width=30%>Name of School</td>";
		 $scode=$row['scode'];
		 $school="";
		 $sql1 = "SELECT * FROM tblschool where schoolcode='$scode'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0)
		      {
		      while($row1 = $result1->fetch_assoc())
        		 {
				 $school=$row1['schoolname'];
				 }
			  }
         echo "<td>". $school . "</td>";
         echo "</tr>";
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
         echo "<td>Cast</td>";
         echo "<td>". $row['cast'] . "</td>";
         echo "</tr>";
		 echo "<tr>";
         echo "<td>Mother Tong</td>";
         echo "<td>". $row['mothertong'] . "</td>";
         echo "</tr>";
		 echo "<tr>";
         echo "<td>Father's Name</td>";
         echo "<td>". $row['fathername'] . "</td>";
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
         echo "<td>Stream</td>";
         echo "<td>". $row['stream'] . "</td>";
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
		 echo "<tr>";
		 echo "<td>Login Name</td>";
         echo "<td>". $row['loginname'] . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Password</td>";
         echo "<td>". $row['tpass'] . "</td>";
         echo "</tr>";
         }
   }
?>
</table>
</div>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
</body>
</html>