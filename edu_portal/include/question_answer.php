<?php
if($_SESSION['faculty']=="Management")
	 	{
	 	$sql=mysql_query("select queid, subject, queby, topic, question, ondate, remark from tblmgntque where level='$_SESSION[level]' and faculty='$_SESSION[faculty]' and queby='$_SESSION[lname]'",$con);
	 	$rownum=mysql_num_rows($sql);
		$i=0;
		while($i<$rownum)
			{
				echo "<tr>";
				echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
				echo "</tr>";
				$queid=mysql_result($sql, $i, "queid");
				$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tblmgntans where queid='$queid'",$con);
	 			$rownumans=mysql_num_rows($sqlans);
				$j=0;
					while($j<$rownumans)
						{
							echo "<tr>";
							echo "<td bgcolor=#FFFFCC>" ."Answer-" . ($j+1) . "-" . mysql_result($sqlans, $j, "answer") . "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<td>&nbsp;</td>";
							echo "</tr>";
							$j++;
						}
				$i++;
			}
				
		}
	elseif($_SESSION['faculty']=="Education")
		{
	 	$sql=mysql_query("select queid, subject, queby, topic, question, ondate, remark from tbleduque where level='$_SESSION[level]' and faculty='$_SESSION[faculty]' and queby='$_SESSION[lname]'",$con);
	 	$rownum=mysql_num_rows($sql);
		$i=0;
		while($i<$rownum)
			{
				echo "<tr>";
				echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
				echo "</tr>";
				$queid=mysql_result($sql, $i, "queid");
				$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tbleduans where queid='$queid'",$con);
	 			$rownumans=mysql_num_rows($sqlans);
				$j=0;
					while($j<$rownumans)
						{
							echo "<tr>";
							echo "<td bgcolor=#FFFFCC>" ."Answer-" . ($j+1) . "-" . mysql_result($sqlans, $j, "answer") . "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<td>&nbsp;</td>";
							echo "</tr>";
							$j++;
						}
				$i++;
			}
		}
	elseif($_SESSION['faculty']=="None")
		{
	 	$sql=mysql_query("select queid, subject, queby, topic, question, ondate, remark from tblcompque where level='$_SESSION[level]' and faculty='$_SESSION[faculty]' and queby='$_SESSION[lname]'",$con);
	 	$rownum=mysql_num_rows($sql);
		$i=0;
		while($i<$rownum)
			{
				echo "<tr>";
				echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
				echo "</tr>";
				$queid=mysql_result($sql, $i, "queid");
				$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tblcompans where queid='$queid'",$con);
	 			$rownumans=mysql_num_rows($sqlans);
				$j=0;
					while($j<$rownumans)
						{
							echo "<tr>";
							echo "<td bgcolor=#FFFFCC>" ."Answer-" . ($j+1) . "-" . mysql_result($sqlans, $j, "answer") . "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<td>&nbsp;</td>";
							echo "</tr>";
							$j++;
						}
				$i++;
			}
		}
	elseif($_SESSION['faculty']=="Science")
		{
	 	$sql=mysql_query("select queid, subject, queby, topic, question, ondate, remark  from tblscienceque where level='$_SESSION[level]' and faculty='$_SESSION[faculty]' and queby='$_SESSION[lname]'",$con);
	 	$rownum=mysql_num_rows($sql);
		$i=0;
		while($i<$rownum)
			{
				echo "<tr>";
				echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
				echo "</tr>";
				$queid=mysql_result($sql, $i, "queid");
				$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tbleduans where queid='$queid'",$con);
	 			$rownumans=mysql_num_rows($sqlans);
				$j=0;
					while($j<$rownumans)
						{
							echo "<tr>";
							echo "<td bgcolor=#FFFFCC>" ."Answer-" . ($j+1) . "-" . mysql_result($sqlans, $j, "answer") . "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<td>&nbsp;</td>";
							echo "</tr>";
							$j++;
						}
				$i++;
			}
		}
?>