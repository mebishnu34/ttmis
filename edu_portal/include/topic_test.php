<?php
session_start();
if($_GET['tsubid'])
{
	$id=$_GET['tsubid'];
	$sub=mysql_query("Select subject from tblsubject where subjectid='$id'",$con);
	$data=mysql_fetch_array($sub);
	$subname=$data["subject"];
	$_SESSION['tsubject']=$subname;
	if($_SESSION['level']="Six")
		{
		$sql=mysql_query("Select topic from tblsix where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="Seven")
		{
		$sql=mysql_query("Select topic from tblseven where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="eight")
		{
		$sql=mysql_query("Select topic from tbleight where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="Nine")
		{
		$sql=mysql_query("Select topic from tblnine where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="Ten")
		{
		$sql=mysql_query("Select topic from tblten where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="Eleven")
		{
		$sql=mysql_query("Select topic from tbleleven where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	elseif($_SESSION['level']="Twelve")
		{
		$sql=mysql_query("Select topic from tbltwelve where subject='$subname'",$con);
		$rownum=mysql_num_rows($sql);
		}
	$i=0;
}
	?>
<form action="Topicquestion4Student.php" method="post">
<table width="600" align="center">
<tr>
<td align="right" width="200">Select Topic</td>
<td>
<select name="cmbtopic">
<?php
	while($i<$rownum)
		{
		echo "<option>" . mysql_result($sql, $i, "topic");
		$i++;
		}
?>
</select>
</td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" value="Get Question"></td>
</tr>
</table>
</form>