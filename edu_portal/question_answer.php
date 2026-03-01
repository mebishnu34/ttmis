<?php
$sub=$_SESSION['cque'];
if($_SESSION['level']=="वालविकास केन्द्र")
	 	{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblecdque where level='$_SESSION[level]' and subject='$sub'";
	 		$fqunum=$conn_1->query($sql);
		}
elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark from tblprimaryque where level='$_SESSION[level]' and subject='$sub'";
		 	$fqunum=$conn_1->query($sql);
		}
elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
	 		$sql="select queid, subject, queby, topic, question, ondate, remark from tblsecondaryque where level='$_SESSION[level]' and subject='$sub'";
	 		$fqunum=$conn_1->query($sql);
		}
elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblhigherque where level='$_SESSION[level]' and subject='$sub'";
		 	$fqunum=$conn_1->query($sql);
		}
elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblhigherque where level='$_SESSION[level]' and subject='$sub'";
		 	$fqunum=$conn_1->query($sql);
		}
elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblhigherque where level='$_SESSION[level]' and subject='$sub'";
		 	$fqunum=$conn_1->query($sql);
			}
elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblhigherque where level='$_SESSION[level]' and subject='$sub'";
		 	$fqunum=$conn_1->query($sql);
			
		}
if($fqunum->num_rows>0)
	{
		while($quedata=$fqunum->fetch_assoc())
		{
		echo "<tr>";
		echo "<td><b><font size=+2>" . $quedata["question"]."(". $quedata["queby"] .")". "</font></b></td>";
		echo "</tr>";
		$queid=$quedata["queid"];
		$sqlans="select queid, answer, answerby, ondate, remark from tblhigherans where queid='$queid'";
		$rownumans=$conn_1->query($sqlans);
		if($rownumans->num_rows>0)
			{
			while($ansdata=$rownumans->fetch_assoc())
				{
				echo "<tr>";
				echo "<td bgcolor=#FFFFCC>" ."Answer By: " . $ansdata["answerby"] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $ansdata["answer"] ."</td>";
				echo "</tr>";
				}
			}
	}
}
?>
