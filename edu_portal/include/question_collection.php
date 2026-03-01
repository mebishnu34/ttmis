<?php
//ini_set('session.bug_compat_warn', 0); use to remove warning from using same session variable
//ini_set('session.bug_compat_42', 0);
$sub=mysql_query("Select subjectid, subject from tblsubject where level='$_SESSION[mclass]' and faculty='$_SESSION[faculty]'", $con);
$subrownum=mysql_num_rows($sub);
$j=0;
?>
<table width="300" border="0">
<tr>
<td valign="top" bgcolor="#FFFFFF">
<div id="verticalmenu">
<ul>
<li><a href="#">Question Collection</a>
	<ul>
		<li><a href="php/year_session.php?yearid=2068">2068</a></li>
		<li><a href="php/year_session.php?yearid=2069">2069</a></li>
		<li><a href="php/year_session.php?yearid=2070">2070</a></li>
		<li><a href="php/year_session.php?yearid=2071">2071</a></li>
		<li><a href="php/year_session.php?yearid=2071">2072</a></li>
	</ul>
</ul>
</div>
</td>
</tr>
</table>
</div>
