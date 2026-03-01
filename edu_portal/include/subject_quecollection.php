<?php
$sub="Select subjectid, subject from tblsubject where level='$_SESSION[level]' and faculty='$_SESSION[faculty]'";
$subrownum=$conn->query($sub);
$j=0;
?>
<table width="300" border="0">
<tr>
<td valign="top" bgcolor="#0099FF">
<div id="verticalmenu">
<ul>
<?php
if($subrownum->num_rows>0)
{
while($que=$subrownum->fetch_assoc())
	{
?>
	<li><a href="php/check_quesession.php?qsubject=<?php echo $que["subject"];?>"><?php echo $que["subject"]; $subject=$que["subject"];?></a></li>
<?php
	$j++;
	}
}
?>
</ul>
</div>
</td>
</tr>
</table>
</div>
