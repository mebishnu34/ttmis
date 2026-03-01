<?php
include("database/db_connection.php");
$examsql="Select subjectid, subject from tblsubject where level='$_SESSION[level]'";
$examrownum=$conn->query($examsql);
$i=0;
if($examrownum->num_rows>0)
{
while($exam=$examrownum->fetch_assoc())
	{
	echo "<br>";
	echo "<a href=member_exam.php?subid=".$exam["subjectid"] . "> > " . $exam["subject"] ."</a>";
	echo "<br>";
	echo "<a href=member_exam.php?tsubid=".$exam["subjectid"] . "> > Topic Test</a>";
	echo "<br>";
	echo "<a href=member_exam.php?gkid=".$exam["subjectid"] . "> > Read Question Answer</a>";
	echo "<br>";
	echo "<a href=member_exam.php?tgkid=". $exam["subjectid"] . "> > Topic Read Question Answer</a>";
	echo "<hr color=#FFFFFF>";
	}
}
?>
