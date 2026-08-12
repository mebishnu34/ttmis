<?php
include("../Processing/db_connection.php");
if(isset($_GET['linkid']))
   {
   $traid=$_GET['linkid'];
   }
$tsql = "SELECT trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingid='$traid'";
$tresult = $conn->query($tsql);
    if ($tresult->num_rows > 0)
   {
    if($trow = $tresult->fetch_assoc())
    {
	$training=$trow["trainingname"];
	$level=$trow["level"];
	$subject=$trow["subject"];
	$sdate=$trow["startdate"];
	$edate=$trow["enddate"];
	$venu=$trow["venue"];
    }
   }
?>
<html>
<head>
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<link rel="stylesheet" type="text/css" href="../CSS/main_table.css">
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<title>TTMIS:Bagamati</title>
</head>
<body class="bg">
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="90%" class="table_design" align="center">
<tr>
    <td colspan="5" allign="center">
<b><font size="+1"><?php echo "Training Name:- " . $training . " / Level:-".$level . " / Subject:-".$subject . " / Date From:-".$sdate . " To:-".$edate . " / Venu:-". $venu;?></font></b> 
</td>
</tr>
<tr>
<th align="center">S.No</th>
<th>Name of Teacher</th>
<th>Name of School</th>
<th>Local Government</th>
<th>District</th>
</tr>
<?php
$sn=1;
$sql1 = "SELECT ID,teacherid,schoolcode,sdate,edate FROM tblttraining where trainingid='$traid' and remark='Running'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
	while($row = $result->fetch_assoc())
    {
	$sname="";
		$mun="";
		$district="";
	$tcode=$row["teacherid"];
	$scode=$row["schoolcode"];
		$sqlt = "SELECT tname,tcontact FROM tblteacher where teachercode='$tcode'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	if($rowt = $resultt->fetch_assoc())
    	   {
		   $contact=$rowt["tcontact"];
		   $tname=$rowt["tname"];
		   }
		}
		
		$sqlt = "SELECT schoolname,munvdc,district FROM tblschool where schoolcode='$scode'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   			{
	    	if($rowt = $resultt->fetch_assoc())
    		   {
			   $sname=$rowt["schoolname"];
			   $mun=$rowt["munvdc"];
			   $district=$rowt["district"];
		   		}
			}
    echo "<tr>";
	echo "<td align=center>". $sn . "</td>";
	echo "<td align=left>" . $tname . "</td>";
	//echo "<td align=center>" . $contact . "</td>";
    echo "<td align=left>" . $sname . "</td>";
	echo "<td align=left>" . $mun . "</td>";
	echo "<td>" . $district . "</td>";
		$sn++;
	echo "</tr>";
	}
}
echo "</table>";

 if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
