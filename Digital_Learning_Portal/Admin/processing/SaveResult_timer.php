<?php
ob_start();
session_start();
if(isset($_SESSION['memlname']))
	{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online Exam:<?php echo $_SESSION['schoolname'];?></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>


<body bgcolor=#FFFFCC>
<table width="600" border="1" align="center" bgcolor="#FFFFFF">
 <tr>
      <td colspan="4" bgcolor="#FFFFFF"><div align="center"><img src="../image/banner.jpg" width="600" height="150"></div></td>
    </tr>
<tr>
<td colspan="4" align="right" bgcolor="#FFCCCC"><font size="+1" color="#0000FF"><b><a href="../Examhall.php?linkid=out">Log Out</a></b></font></td>
</tr>

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
$count=0;
$n=1;
foreach($_POST['ans'] as $ans)
	{
		$answer[$n]=$ans;
		//print $answer[$i];
		$n++;
	}
$i=1;
$response=0;
foreach($_POST['opt1'] as $check)
	{
	if($check>0)
		{
			$i=$i-1;
			$checked[$i]=$check;
			$response++;
		}
	$i++;
	}
$score=0;
for($q=1; $q<=$response; $q++)
		{
			$ans=$answer[$q];
			if(isset($checked[$q]))
			{
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
		}
print "<tr>";
print "<td colspan=4 bgcolor=yellow align=center><font size=24 color=blue> Your Score IS : " . $score . "</font></td>";
print "</tr>";

include("../database/db_connection.php");
$sql="Insert into tblexammark(memid, level,subject,topic,obtmark,ondate) values('$_SESSION[memberid]','$_SESSION[level]','$_SESSION[subject]','$_SESSION[topic]','$score',now())";
		if(!mysqli_query($conn_1,$sql))
			{	
			 header('Location: ../Examhall.php?msg='. die("Database Connection Error" .mysql_error()));
			}
		else
			{
			session_destroy ();
			 //header('Location: ../Examhall.php?msg="Thank You"');
			}
ob_flush();
}
else
{
{
	header('Location: ../index.php?msg="Please Login First"');
}

}
?>
<tr>
<td colspan="4" align="center">
<form action="../member_exam.php" method="post">
<input type="submit" value="Close Exam" name="btnscore">
</form>
</td>
</tr>

</table>
</body>