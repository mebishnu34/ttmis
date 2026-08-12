<?php
session_start();
include("../database/db_connection.php");
$class=$_SESSION['class'];
$exam=$_SESSION['exam'];
$section=$_SESSION['sec'];
header('Content-type: application/excel');
$filename = 'empty_ledger.xls';
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
<table width="1000" align="center" bgcolor="#FFFFFF">
  <tr>
  <td align="center" colspan="2"><font size="+2"><b><?php echo $_SESSION['compname'];?></b></font></td>
  </tr>
  <tr>
  <td align="center"><font size="+2"><b><u>Mark Ledger-2073</u></b></font></td>
  </tr>
  </table>
<tr>
<tr>
<td><font face="Verdana, Arial, Helvetica, sans-serif" size="+1"><b>Class: <?php echo $class;?>/Section: <?php echo $section;?></b></font></td>
<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1"><b>Exam: <?php echo $exam;?></b></font></td>
</tr>
</table>
<table width="1100" border="1" align="center" bgcolor="#FFFFFF">
<?Php
echo "<tr>";
$subsql=mysql_query("Select subcode, subname, remark from tblsubjectclass where class='$class' and remark<>'Other' ORDER BY subindex, sindex",$con);
$rownum=mysql_num_rows($subsql);
$i=0;
echo "<td align=center>S.No</td>";
echo "<td align=center>Code</td>";
echo "<td align=center> Name of student </td>";
while($i<$rownum)
	{
		echo "<td align=center>" . mysql_result($subsql, $i, "subcode") . "</td>";
		$sub[$i]=mysql_result($subsql,$i,"subcode");
		$subopt[$i]=mysql_result($subsql,$i,"remark");
		$i++;
	}
	echo "<tr>";
	$stusql=mysql_query("select stucode, stuname from tblstudentclass where class='$class' and sectionname='$section' and remark='Running' ORDER BY rollno",$con);
	$sturownum=mysql_num_rows($stusql);
	$s=0;
	while($s<$sturownum)
		{
			echo "<tr>";
			echo "<td align=center>" . ($s+1) . "</td>";
			echo "<td align=center>" . mysql_result($stusql, $s, "stucode") . " <input type=hidden name=stucode[] value=" . mysql_result($stusql,$s,"stucode") . "></td>";
			$scode[$s]=mysql_result($stusql, $s, "stucode");
			echo "<td>" . mysql_result($stusql, $s, "stuname") ."</td>";
			$sname[$s]=mysql_result($stusql, $s, "stuname");
			$stucode=mysql_result($stusql,$s,"stucode");
			$m=0;
			while($m<$i)
			{
			echo "<td>&nbsp;</td>";
			$m++;
			}
			$s++;
		}
?>
</tr>
</table>
</div>
</body>
</html>
<?php
echo $data;
?>