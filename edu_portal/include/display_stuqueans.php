<?php
ob_start();
include("database/db_connection.php");
$anssql="Select subject, queid,answer from tblpostanswer where subject='$_SESSION[subject]' and queyear='$_SESSION[year]'";
$ansrownum=$conn->query($anssql);
		$i=0;
?>
<table width="95%" align="center" border="1">
<tr>
<td align="center" bgcolor="#0000FF" colspan="3"><font color="#FFFFFF"><b><?php echo $_SESSION['subject'];?></b></font></td>
</tr>
<?php
if($ansrownum->num_rows>0)
{
while($ansdata=$ansrownum->fetch_assoc())
	{
	$id=$ansdata["queid"];
	if($_SESSION['level']=="Six")
	 	{
		$sql="select queansid, level, queyear, subject, question, answer, remark from tblsixqueans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Seven")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblsevenqueans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Eight")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbleightqueans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Nine")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblninequeans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Ten")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbltenqueans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Eleven")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblelevenqueans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['level']=="Twelve")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbltwelvequeans where queansid='$id'";
	 	$row=$conn->query($sql);
		}
	if($row->num_rows>0)
		{
			if($data=$row->fetch_assoc())
				{
					echo "<tr>";
					echo "<td colspan=2>" . $data["question"] . "</td>";
					echo "</tr>";
				?>
					<tr>
					<td bgcolor="#0000FF" align="center"><font color="#FFFFFF"><b>Your Answer</b></font></td>
					<td bgcolor="#0000FF" align="center"><font color="#FFFFFF"><b>Computer's Answer</b></font></td>
					</tr>
				<?php
					echo "<tr>";
					echo "<td align=justify valign=top>". $ansdata["answer"] . "</td>";
					echo "<td align=justify valign=top>" . $data["answer"] . "</td>";
					echo "</tr>";
					$i++;
				}
		}
	}
}
?>
</table>
