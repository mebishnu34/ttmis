<?php
session_start();
include("../../database/db_connection.php");
$sql="Select questionid, question from tblquestion where subject='$_SESSION[subject]'";
$rownum=$conn_1->query($sql);
$i=0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Display Question</title>
</head>
<body>
<a href="../index.php">Back</a>
<table width="80%" align="center" border="1">
<?php
if($rownum->num_rows>0)
{
while($data=$rownum->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>" . ($i+1) . "</td>";
		echo "<td>" . $data["question"] . "</td>";
		echo "<td><a href=question_Action.php?linkid=" . $data["questionid"] .">Edit</a></td>";
		echo "</tr>";
		$i++;
	}
}
?>
</table>
</body>
</html>
