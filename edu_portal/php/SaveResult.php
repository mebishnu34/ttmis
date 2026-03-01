<?php
session_start();
ob_start();
$lname=$_SESSION['memlname'];
$subject=$_SESSION['subject'];
if($_POST['Accept'])
	{
	}
else
	{
			header('Location: ../Question4Student.php?msg="Please Check I am sure .."');
	}
$count=0;
$n=1;
foreach($_POST['ans'] as $ans)
	{
		$answer[$n]=$ans;
		//print $answer[$i];
		$n++;
	}
?><link rel="stylesheet" type="text/css" href="../css/body.css">
<body bgcolor=#FFFFCC>
<table width="80%" align="center" bgcolor="#0000FF">
<tr>
<td align="left"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';?></td>
<td align="left"><img src="../image/banner.jpg" width="400" height="100"></td>
<td align="center"></td>
</tr>
<tr>
<td colspan="3">
<table cellpadding="2" width="100%">
<tr>
<td width="50%" bgcolor="#FFFFFF" align="left"><?php echo $_SESSION['fname'] . "/" . $_SESSION['level'] . "/" . $_SESSION['faculty'];?></td>
</tr>
</table>
</td>
</tr>
</table>
<table width="1000" border="0" align="center">
<table width="80%" border="1" align="center" bgcolor="#FFFFFF">
<tr>
<td colspan="4" align="center" bgcolor="#FFCCCC"><font size="+2" color="#0000FF"><b>RESULT DETAILS</b></font></td>
</tr>
<tr>
<td align="center" bgcolor="#FFFF00"><font size="+1" color="#0000FF"><B>Q.NO.</B></font></td>
<td align="center" bgcolor="#FFFF00"><font size="+1" color="#0000FF"><B>Selected</B></font></td>
<td align="center" bgcolor="#FFFF00"><font size="+1" color="#0000FF"><B>Correct Answer</B></font></td>
<td align="center" bgcolor="#FFFF00"><font size="+1" color="#0000FF"><B>Result</B></font></td>
</tr>
<?php
$i=1;
foreach($_POST['opt1'] as $check)
	{
	if($check>0)
		{
			$i=$i-1;
			$checked[$i]=$check;
			
		}
	$i++;
	}
	
$score=0;
for($q=1; $q<=25; $q++)
		{
			$ans=$answer[$q];
			$sans=$checked[$q];
			print "<tr>";
			print "<td align=center>" . $q . "</td>";
			print "<td align=center>" . $sans . "</td>";
			print "<td align=center>" .$ans ."</td>";
			if($sans==$ans)
				{
					print "<td align=center bgcolor=green> Correct</td>";
					$score = $score+2;
				}
			else
				{
					print "<td align=center bgcolor=red> Wrong </td>";
				}
			print "</tr>";
						
		}
print "<tr>";
print "<td colspan=4 bgcolor=yellow align=center><font size=24 color=blue> Your Score IS : " . $score . "</font></td>";
print "</tr>";
include("../database/db_connection.php");
$sql="Insert into tbltestresult(lname, ondate, subject, obtmark) values('$lname', now(), '$subject', '$score')";
if(!mysql_query($sql,$conn_1))
	{	
	 header('Location: ../Examhall.php?msg='. die("Database Connection Error" .mysql_error()));
	}
else
	{
		echo "<center>Best of Luck</center>";
	}
ob_flush();
?>
</table>
</body>