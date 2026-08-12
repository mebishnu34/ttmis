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
<td colspan="8">Teacher Summery</td>
</tr>
<tr>
<td align="center">S.No</td>
<td>Name of District</td>
<td align="center">ECD</td>
<td align="center">1-5</td>
<td align="center">6-8</td>
<td align="center">9-10</td>
<td align="center">11-12</td>
<td>Total Teacher</td>
</tr>
<?php
$total=0;
$gtotal=0;
$ecd=0;
$basic=0;
$upperbasic=0;
$secondary=0;
$higher=0;
    echo "<tr>";
    echo "<td align=center>1</td>";
	    echo "<td align=center>भक्तपुर</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='भक्तपुर' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	echo "</tr>";
	 
	     echo "<tr>";
    echo "<td align=center>2</td>";
	    echo "<td align=center>चितवन</td>";
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='चितवन' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
$gtotal+=$total;
		$total=0;
	
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>3</td>";
	    echo "<td align=center>धादिंग</td>";
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='धादिंग' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
$gtotal+=$total;
		$total=0;
	
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>4</td>";
	    echo "<td align=center>दोलखा</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='दोलखा' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
	$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>5</td>";
	echo "<td align=center>काठमाण्डौ</td>";
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काठमाण्डौ' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>6</td>";
	    echo "<td align=center>काभ्रेपलाञ्चोक</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='काभ्रेपलाञ्चोक' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>7</td>";
	    echo "<td align=center>ललितपुर</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='ललितपुर' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>8</td>";
	    echo "<td align=center>मकवानपुर</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='मकवानपुर' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>9</td>";
	    echo "<td align=center>नुवाकोट</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='नुवाकोट' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>10</td>";
	    echo "<td align=center>रामेछाप</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रामेछाप' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>11</td>";
	    echo "<td align=center>रसुवा</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='रसुवा' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>12</td>";
	    echo "<td align=center>सिन्धुली</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुली' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	     echo "<tr>";
    echo "<td align=center>13</td>";
	    echo "<td align=center>सिन्धुपाल्चोक</td>";
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and workinglevel='वालविकास केन्द्र'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $ecd+=$row['count(teachercode)'];
		 }
		}
	$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and workinglevel='आधारभूत (१ –५)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $basic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and workinglevel='आधारभूत (६ –८)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
		echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $upperbasic+=$row['count(teachercode)'];
		 }
		}
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and workinglevel='माध्यमिक(९ –१०)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $secondary+=$row['count(teachercode)'];
		 }
		}
		
		$sql1 = "SELECT count(teachercode) FROM tblteacher where district='सिन्धुपाल्चोक' and workinglevel='माध्यमिक(११ –१२)'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
echo "<td align=center>".$row['count(teachercode)']."</td>";
		 $total+=$row['count(teachercode)'];
		 $higher+=$row['count(teachercode)'];
		 }
		}
		echo "<td align=center>".$total."</td>";
		$gtotal+=$total;
		$total=0;
	 echo "</tr>";

	 //Total
	     echo "<tr>";
       echo "<td align=right colspan=2>Total</td>";
	    echo "<td align=center>".$ecd."</td>";
		echo "<td align=center>".$basic."</td>";
		echo "<td align=center>".$upperbasic."</td>";
	    echo "<td align=center>".$secondary."</td>";
	   echo "<td align=center>".$higher."</td>";
		echo "<td align=center>".$gtotal."</td>";
		 
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
