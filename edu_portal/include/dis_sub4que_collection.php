<?php
//	echo $_SESSION['level'];
//echo $_SESSION['year'];
//echo $_SESSION['subject'];
	if($_SESSION['level']=="Six")
	 	{
		$sql="select queansid, level, queyear, subject, question, answer, remark from tblsixqueans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Seven")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblsevenqueans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Eight")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbleightqueans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Nine")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblhumanequeans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Ten")
		{
		$sql="select queansid, level, queyear, subject, question, answer, remark from tbltenqueans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Eleven")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblelevenqueans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Tweleve")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbltwelevequeans where level='$_SESSION[level]' and queyear='$_SESSION[year]' and subject='$_SESSION[subject]'";
	 	$rownum=$conn->query($sql);
		}
	 $i=0;
	 	$s=0;
	?>
<table width="95%" align="center">
<tr>
<td align="center" bgcolor="#0000FF"><font color="#FFFFFF"><b><?php echo $_SESSION['subject'];?></b></font></td>
</tr>
<?php
	if($rownum->num_rows>0)
		{
		while($quedata=$rownum->fetch_assoc())
			{
			echo "<tr>";
			echo "<td>";
			echo  $quedata["question"];
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td align=right bgcolor=#0066FF>";
			echo  "<a href=post_queans.php?queid=" . $quedata["queansid"] . " target=_blank>Post Answer</a>";
			echo "</td>";
			echo "</tr>";
			$s++;
			}
		}
?>  
<tr>
<td align="center" bgcolor="#0066FF"><a href="question_collection.php?queans=display">Check Answer</a></td>
</tr> 
</table> 
