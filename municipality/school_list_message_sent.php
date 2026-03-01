<?php
session_start();
include("../Processing/db_connection.php");
include("../Processing/db_palika_connection.php");
if(isset($_GET['linkid']))
   {
   $traid=$_GET['linkid'];
   $tsql = "SELECT trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$traid'";
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
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Display/../Image/logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="../Display/../Image/banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Display/../Image/np_flag.gif" width="150" height="130"></td>
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
<th>School Code</th>
<th>Name of School</th>
<th>Authorize Person</th>
<th>Contact</th>
<th>&nbsp;</th>
</tr>
<?php
$sn=1;
$sql1 = "SELECT ID,schoolcode, trainingid, msgnumber FROM tblschoolinfo where munvdc='$_SESSION[uname]' and trainingid='$traid'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
	while($row = $result->fetch_assoc())
    {
		$scode=$row["schoolcode"];
		$sqlt = "SELECT schoolname,authorizeperson,address, contact FROM tblschool where schoolcode='$scode'";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   			{
	    	if($rowt = $resultt->fetch_assoc())
    		   {
			    echo "<tr>";
				echo "<td align=center>". $sn . "</td>";
				echo "<td align=left>" . $scode . "</td>";
				echo "<td align=center>" . $rowt["schoolname"]  . "</td>";
			    echo "<td align=left>" . $rowt["authorizeperson"] . "</td>";
				echo "<td align=left>" . $rowt["contact"] . "</td>";
				echo "<td bgcolor=blue><a href=cancel_in_training.php?tid=$row[ID] target=_blank>Cancel</a></td>";
				$sn++;
				echo "</tr>";
				}
			}
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
