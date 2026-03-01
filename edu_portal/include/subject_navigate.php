<?php
$sub="Select ID,subject from tbltraining where level='$_SESSION[level]'";
$subrownum=$conn->query($sub);
$j=0;
?>
<table width="300" border="0">
<tr>
<td valign="top" bgcolor="#0066CC">
<div id="verticalmenu">
<ul>
<?php
//<li><a href="member.php?ans=ans">Replied Answers </a> </li>
?>
<?php
if($subrownum->num_rows>0)
{
while($data=$subrownum->fetch_assoc())
	{
?>
	<li><a href="#"><?php echo $data["subject"]; $subject=$data["subject"];?></a>
		<ul>
		<?php
	if($_SESSION['level']=="वालविकास केन्द्र")
	 	{
		$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblecd where level='$_SESSION[level]' and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblprimary where level='$_SESSION[level]' and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblsecondary where level='$_SESSION[level]' and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]' and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]'  and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]'  and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
	 	$sql1="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]'  and subject='$subject'";
	 	$subrownum1=$conn_1->query($sql1);
		}
	if($subrownum1->num_rows>0)
		{
			while($data=$subrownum1->fetch_assoc())
				{
				echo "<a href=php/check_session.php?linkid=" .$data["detailsid"]."> >>" . $data["topic"] ."</a><br>";
				}
		}

		?>    
		</ul>
	</li>
<?php
	}
}
?>
</ul>
</div>
</td>
</tr>
</table>
</div>
