<?php
session_start();
include("database/db_connection.php");
if($_GET['gkid'])
	$id=$_GET['gkid'];
	$quesql=mysql_query("Select subjectid, subject from tblsubject where subjectid='$id'",$con);
	$quedata=mysql_fetch_array($quesql);
	$_SESSION['subject']=$quedata["subject"];
	$data=mysql_query("Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where subject='$_SESSION[subject]'",$con);
	$rownum=mysql_num_rows($data);
	$k=0;
?>
<table width="90%" border="0" align="center" bgcolor="#FFFFCC">
<tr>
<td align="center"><font size="+3" color="#0000FF"><b><?php echo $_SESSION['subject'];?></b></font></td>
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