<?php
session_start();
$class=$_SESSION['class'];
$section=$_SESSION['sec'];
header('Content-type: application/excel');
$filename = 'filename.xls';
header('Content-Disposition: attachment; filename='.$filename);
$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
?>
<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>
<body>
<?php
include("../database/db_connection.php");
if($class=='All')
	{
	$dataclass=mysql_query("Select classname from tblclass ORDER BY classid",$con);
	$rownum1=mysql_num_rows($dataclass);
	?>
	<div id="pdata">
<center><font size="+2"><b><?php echo $_SESSION['compname'];?></b></font></center>
<table width="95%" border="1" align="center" bgcolor="#FFFFFF" cellpadding="5">
<tr>
<td colspan="9" align="center"><font size="+2" color="#0000FF"><b><u>LIST OF STUDENT</u></b></font></td>
</tr>
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Code</b></td>
<td align="center"><b>Class</b></td>
<td align="center"><b>Roll No.</b></td>
<td><b>Name of Student</b></td>
<td><b>Gender</b></td>
<td><b>House</b></td>
<td><b>Address</b></td>
<td><b>Contact</b></td>
</tr>
	<?php
	$c=0;
	$s=0;
	while($c<$rownum1)
	{
	$class=mysql_result($dataclass,$c,"classname");
	$data=mysql_query("Select stuclassid,rollno, stucode, stuname, class, House from tblstudentclass where class='$class' ORDER BY sectionname, rollno",$con);
	$rownum=mysql_num_rows($data);
	$i=0;
	while($i<$rownum)
	{
	?>
		<tr>
		<td align="center">
	<?php
		echo $s+1;
	?>
		</td>
		<td align="center">
	<?php
	 	echo mysql_result($data, $i, "stucode");
		$code=mysql_result($data, $i, "stucode");
		$sql=mysql_query("select stuname, gender, phone, mobile, paddress from tblstudent where stucode='$code'",$con);
		$studata=mysql_fetch_array($sql);
	?>
		</td>
		<td align="center">
		<?php
		echo mysql_result($data, $i, "class");
	?>
		</td>
		<td align="center">
	<?php
		echo mysql_result($data, $i, "rollno");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["stuname"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["gender"];
		if($studata["gender"]=="Male")
			{
				$tmale+=1;
			}
		else
			{
				$tfemale+=1;
			}
	?>
		</td>
		<td align="center">
	<?php
	echo mysql_result($data, $i, "House");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["paddress"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["phone"]." " . $studata["mobile"];
	?>
		</td>
	<?php
		$i++;
		$s++;
		echo "</tr>";
		}
	$c++;
}

?>
<tr>
<td colspan="5" align="center"><font size="+2"><b>Total Male:-<?php echo $tmale; ?> and Total Female:-<?php echo $tfemale; ?></b></font> </td>
</tr>
</table>
</div>
	<?php
	}
elseif($section=='All')
	{
		$data=mysql_query("Select stuclassid, stucode,rollno, stuname, House, sectionname from tblstudentclass where class='$class' ORDER BY sectionname, rollno",$con);
		$rownum=mysql_num_rows($data);
	
	?>
	<div id="pdata">
<center><font size="+2"><b><?php echo $_SESSION['compname'];?></b></font></center>
<table width="95%" border="1" align="center" bgcolor="#FFFFFF" cellpadding="5">
<tr>
<td colspan="9" align="center"><font size="+2" color="#0000FF"><b><u>LIST OF STUDENT ( Class:-<?php echo $class;?>) </u></b></font></td>
</tr>
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Code</b></td>
<td align="center"><b>Section</b></td>
<td align="center"><b>Roll No.</b></td>
<td><b>Name of Student</b></td>
<td><b>Gender</b></td>
<td><b>House</b></td>
<td><b>Address</b></td>
<td><b>Contact</b></td>
</tr>
	<?php
	$s=0;
	$i=0;
	while($i<$rownum)
	{
	?>
		<tr>
		<td align="center">
	<?php
		echo $s+1;
	?>
		</td>
		<td align="center">
	<?php
	 	echo mysql_result($data, $i, "stucode");
		$code=mysql_result($data, $i, "stucode");
		$sql=mysql_query("select stuname, gender, phone, mobile, paddress from tblstudent where stucode='$code'",$con);
		$studata=mysql_fetch_array($sql);
	?>
		</td>
		<td align="center">
	<?php
		echo mysql_result($data, $i, "sectionname");
	?>
		</td>
		<td align="center">
	<?php
		echo mysql_result($data, $i, "rollno");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["stuname"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["gender"];
		if($studata["gender"]=="Male")
			{
				$tmale+=1;
			}
		else
			{
				$tfemale+=1;
			}
	?>
		</td>
		<td align="center">
	<?php
	echo mysql_result($data, $i, "House");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["paddress"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["phone"]." " . $studata["mobile"];
	?>
		</td>
	<?php
		$i++;
		$s++;
		echo "</tr>";
		}
?>
<tr>
<td colspan="5" align="center"><font size="+2"><b>Total Male:-<?php echo $tmale; ?> and Total Female:-<?php echo $tfemale; ?></b></font> </td>
</tr>
</table>
</div>

<?php
}
else
	{
		$data=mysql_query("Select stuclassid, stucode,rollno, stuname, House from tblstudentclass where class='$class' and sectionname='$section' ORDER BY rollno",$con);
		$rownum=mysql_num_rows($data);
	?>
	<div id="pdata">
<center><font size="+2"><b><?php echo $_SESSION['compname'];?></b></font></center>
<table width="95%" border="1" align="center" bgcolor="#FFFFFF" cellpadding="5">
<tr>
<td colspan="9" align="center"><font size="+2" color="#0000FF"><b><u>LIST OF STUDENT ( Class:-<?php echo $class;?> Section:-<?php echo $section;?>) </u></b></font></td>
</tr>
<tr>
<td align="center"><b>S.No</b></td>
<td align="center"><b>Code</b></td>
<td align="center"><b>Roll No.</b></td>
<td><b>Name of Student</b></td>
<td><b>Gender</b></td>
<td><b>House</b></td>
<td><b>Address</b></td>
<td><b>Contact</b></td>
</tr>
	<?php
	$s=0;
	$i=0;
	while($i<$rownum)
	{
	?>
		<tr>
		<td align="center">
	<?php
		echo $s+1;
	?>
		</td>
		<td align="center">
	<?php
	 	echo mysql_result($data, $i, "stucode");
		$code=mysql_result($data, $i, "stucode");
		$sql=mysql_query("select stuname, gender, phone, mobile, paddress from tblstudent where stucode='$code'",$con);
		$studata=mysql_fetch_array($sql);
	?>
		</td>
		<td align="center">
	<?php
		echo mysql_result($data, $i, "rollno");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["stuname"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["gender"];
		if($studata["gender"]=="Male")
			{
				$tmale+=1;
			}
		else
			{
				$tfemale+=1;
			}
	?>
		</td>
		<td align="center">
	<?php
	echo mysql_result($data, $i, "House");
	?>
		</td>
		<td>
	<?php
	 	echo $studata["paddress"];
	?>
		</td>
		<td>
	<?php
	 	echo $studata["phone"]." " . $studata["mobile"];
	?>
		</td>
	<?php
		$i++;
		$s++;
		echo "</tr>";
		}
?>
<tr>
<td colspan="5" align="center"><font size="+2"><b>Total Male:-<?php echo $tmale; ?> and Total Female:-<?php echo $tfemale; ?></b></font> </td>
</tr>
</table>
</div>

	<?php
	}
?>
<tr>
<td colspan="5" align="center"><font size="+2"><b>Total Male:-<?php echo $tmale; ?> and Total Female:-<?php echo $tfemale; ?></b></font> </td>
</tr>
</table></body>
</html>
<?php
echo $data;
?>
