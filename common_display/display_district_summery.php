<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<?php
   include("Processing/db_connection.php");
include("print_function.php");
?>
<div id="pdata">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<table width="100%" class="dtable">
<tr>
<td colspan="6">Teacher Summery</td>
</tr>
<tr>
<td align="center">S.No</td>
<td>Name of District</td>
<td align="center">No. of School</td>
<td>No. of Male Teacher</td>
<td>NO. of Female Teacher</td>
<td>Total Teacher</td>
</tr>
<?php
$totalschool=0;
$tmale=0;
$tfemale=0;
$tteacher=0;
    echo "<tr>";
    echo "<td align=center>1</td>";
	    echo "<td align=center>भक्तपुर</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='भक्तपुर'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";
	 
	     echo "<tr>";
    echo "<td align=center>2</td>";
	    echo "<td align=center>चितवन</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='चितवन'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>3</td>";
	    echo "<td align=center>धादिंग</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='धादिंग'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>4</td>";
	    echo "<td align=center>दोलखा</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='दोलखा'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>5</td>";
	    echo "<td align=center>काठमाण्डौ</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='काठमाण्डौ'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>6</td>";
	    echo "<td align=center>काभ्रेपलाञ्चोक</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='काभ्रेपलाञ्चोक'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>7</td>";
	    echo "<td align=center>ललितपुर</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='ललितपुर'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>8</td>";
	    echo "<td align=center>मकवानपुर</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='मकवानपुर'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>9</td>";
	    echo "<td align=center>नुवाकोट</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='नुवाकोट'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>10</td>";
	    echo "<td align=center>रामेछाप</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='रामेछाप'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>11</td>";
	    echo "<td align=center>रसुवा</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='रसुवा'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>12</td>";
	    echo "<td align=center>सिन्धुली</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='सिन्धुली'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>13</td>";
	    echo "<td align=center>सिन्धुपाल्चोक</td>";
	$sql1 = "SELECT count(schoolcode) FROM tblschool where district='सिन्धुपाल्चोक'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(schoolcode)']."</td>";
		 $totalschool+=$row['count(schoolcode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and gender='पुरूष'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tmale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and gender='महिला'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 		 $tfemale+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक';";
			$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $tteacher+=$row['count(teachercode)'];
		 }
		}
	 echo "</tr>";

	 //Total
	     echo "<tr>";
       echo "<td align=right colspan=2>Total</td>";
	    echo "<td align=center>".$totalschool."</td>";
		echo "<td align=center>".$tmale."</td>";
		echo "<td align=center>".$tfemale."</td>";
	    echo "<td align=center>".$tteacher."</td>";
		 
	 echo "</tr>";

?>
</table>
</div>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>

</BODY>
</HTML>
