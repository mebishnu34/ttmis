<?php
session_start();
include("../database/db_connection.php");
	$data=mysql_query("Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where subject='$_SESSION[subname]' and level='$_SESSION[level]' and topic='$_POST[cmbtopic]'",$con);
	$rownum=mysql_num_rows($data);
	$k=0;
?>
<body bgcolor="#CCCCCC">
<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td width="100%" align="center" valign="top">
<table width="100%" align="center" bgcolor="#0000FF">
<tr>
<td align="left" width="400"><img src="../image/banner.jpg" width="400" height="100"></td>
<td align="left"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';?></td>
</tr>
</table>
<table width="100%" border="0" align="center" bgcolor="#FFFFFF">
<tr>
<td align="center"><font size="+1" color="#0000FF"><b><?php echo $_SESSION['subname']. "(" . $_POST['cmbtopic'] . ")";?></b></font> &nbsp; <a href="../member_exam.php">Back</a></td>
</tr>
<?php	
while($k<$rownum)
	{
		echo "<tr>";
		echo "<td>";
		echo mysql_result($data, $k, "question");
		echo "</tr>";
		echo "<tr>";
		echo "<td align=right bgcolor=#FFFFFF>>>>>";
		$ansno=mysql_result($data, $k, "correctno");
		if($ansno==1)
			{
				echo mysql_result($data,$k,"ans1");
			}
		elseif($ansno==2)
			{
				echo mysql_result($data,$k,"ans2");
			}
		elseif($ansno==3)
			{
				echo mysql_result($data,$k,"ans3");
			}
		elseif($ansno=4)
			{
				echo mysql_result($data,$k,"ans4");
			}
		else
			{		
			echo "Not Avaiable";
			}
		echo "</td>";
		echo "</tr>";
		$k++;
	}			
?>
</table>
</td>
</tr>
</table>
</body>