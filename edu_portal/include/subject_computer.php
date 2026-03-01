<?php
$sub=mysql_query("Select subjectid, subject from tblsubject where faculty='None'", $con);
$subrownum=mysql_num_rows($sub);
$j=0;
?>
<table width="300" border="0">
<tr>
<td valign="top" bgcolor="#0099FF">
<div id="verticalmenu">
<ul>
<li><a href="member.php?ans=ans">Replied Answers </a> </li>
<?php
while($j<$subrownum)
	{
?>
	<li><a href="#"><?php echo mysql_result($sub, $j,"subject"); $subject=mysql_result($sub, $j,"subject");?></a>
		<ul>
		<?php
		$sql1=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblcomputer where subject='$subject'",$con);
	 	$subrownum1=mysql_num_rows($sql1);
		$s=0;
		while($s<$subrownum1)
			{
			echo "<a href=php/checkcomp_session.php?linkid=" .mysql_result($sql1, $s, "detailsid")."> >>" . mysql_result($sql1, $s,"topic") ."</a><br>";
			$s++;
			}
		?>    
		</ul>
		</li>
<?php
	$j++;
	}
?>
<li><a href="member.php?fque=fans">Question-Answer</a></li>
</ul>
</div>
</td>
</tr>
</table>
</div>
