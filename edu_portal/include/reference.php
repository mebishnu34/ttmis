<?php
if($_SESSION['level']<>"")
{
if(isset($_GET['ans']))
	{
		if($_SESSION['level']=="वालविकास केन्द्र")
	 		{
	 		$sql="select queid, subject, queby, topic, question, ondate, remark from tblecdque where level='$_SESSION[level]'  and queby='$_SESSION[lname]'";
	 		$rownum=$conn_1->query($sql);
			$i=0;
			while($data=$rownum->fetch_assoc())
				{
				echo "<tr>";
				echo "<td><b><font size=+2>" . $data["question"] . "</font></b></td>";
				echo "</tr>";
				$queid=$data["queid"];
				$sqlans="select queid, answer, answerby, ondate, remark from tblsixans where queid='$queid'";
	 			$rownumans=$conn_1->query($sqlans);
				$j=0;
					while($ansdata=$rownumans->fetch_assoc())
						{
							echo "<tr>";
							echo "<td bgcolor=#FFFFCC>" ."Answer-" . ($j+1) . "-" . $ansdata["answer"] . "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<td>&nbsp;</td>";
							echo "</tr>";
							$j++;
						}
				$i++;
			}
				
		}
		elseif($_SESSION['level']=="आधारभूत (१ –५)")
			{
	 			$sql="select queid, subject, queby, topic, question, ondate, remark from tblprimaryque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
	 			$rownum=$conn_1->query($sql);
				$i=0;
				while($data=$rownum->fetch_assoc())
					{
						echo "<tr>";
						echo "<td><b><font size=+2>" . $data["question"] . "</font></b></td>";
						echo "</tr>";
						$queid=mysql_result($sql, $i, "queid");
						$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tblsevenans where queid='$queid'",$con);
	 					$rownumans=$conn_1->query($sqlans);
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
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
	 		$sql="select queid, subject, queby, topic, question, ondate, remark from tblsecondaryque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
	 		$rownum=$conn_1->query($sql);
			$i=0;
			while($i<$rownum)
				{
					echo "<tr>";
					echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
					echo "</tr>";
					$queid=mysql_result($sql, $i, "queid");
					$sqlans=mysql_query("select queid, answer, ansby, ondate, remark from tbleightans where queid='$queid'",$con);
	 				$rownumans=$conn_1->query($sqlans);
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
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblnineque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
		 	$rownum=$conn_1->query($sql);
			$i=0;
			while($i<$rownum)
				{
					echo "<tr>";
					echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
					echo "</tr>";
					$queid=mysql_result($sql, $i, "queid");
					$sqlans=mysql_query("select queid, answer, answerby, ondate, remark from tblnineans where queid='$queid'",$con);
	 				$rownumans=$conn_1->query($sqlans);
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
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblnineque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
		 	$rownum=$conn_1->query($sql);
			$i=0;
			while($i<$rownum)
				{
					echo "<tr>";
					echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
					echo "</tr>";
					$queid=mysql_result($sql, $i, "queid");
					$sqlans=mysql_query("select queid, answer, answerby, ondate, remark from tblnineans where queid='$queid'",$con);
	 				$rownumans=$conn_1->query($sqlans);
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
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblnineque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
		 	$rownum=$conn_1->query($sql);
			$i=0;
			while($i<$rownum)
				{
					echo "<tr>";
					echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
					echo "</tr>";
					$queid=mysql_result($sql, $i, "queid");
					$sqlans=mysql_query("select queid, answer, answerby, ondate, remark from tblnineans where queid='$queid'",$con);
	 				$rownumans=$conn_1->query($sqlans);
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
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
		 	$sql="select queid, subject, queby, topic, question, ondate, remark  from tblnineque where level='$_SESSION[level]' and queby='$_SESSION[lname]'";
		 	$rownum=$conn_1->query($sql);
			$i=0;
			while($i<$rownum)
				{
					echo "<tr>";
					echo "<td><b><font size=+2>" . mysql_result($sql, $i, "question") . "</font></b></td>";
					echo "</tr>";
					$queid=mysql_result($sql, $i, "queid");
					$sqlans=mysql_query("select queid, answer, answerby, ondate, remark from tblnineans where queid='$queid'",$con);
	 				$rownumans=$conn_1->query($sqlans);
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
	 $i=0;
}
else
{
//echo "Reference";
if($rownum1->num_rows>0)
{
while($data=$rownum1->fetch_assoc())
		{
			echo "<tr>";
			echo "<td bgcolor=#FFFFCC><b>" . $data["level"] .  " \ " . $data["subject"] . " \ " . $_SESSION['topic'] . "--Post By:" . $data["postby"] . "</b></td>";
		//	$_SESSION['topic']=$data["topic"];
			echo "</tr>";
			if($_SESSION['topic']=="Video")
		    	{
			      	echo "<tr>";
			  	    echo "<td align=center>" . $data["filename"];?>
			  	    <br>
			  	    <video width="800" height="400" controls>
                    <source src="video/<?php echo $data["filename"];?>" type="video/mp4">
                    <source src="video/sample.ogg" type="video/ogg">
                    Video Not Display.
                    </video>
            <?php
              echo  "</td></tr>";   
			}
			elseif($_SESSION['topic']=="Audio")
			{
			        echo "<tr>";
			  	    echo "<td align=center>" . $data["filename"];?>
			  	    <br>
			  	    <audio controls>
                    <source src="audio/<?php echo $data["filename"];?>" type="audio/wav">
                    <source src="audio/sample.ogg" type="audio/wav">
                    Audio Not Play.
                    </audio>
            <?php
              echo  "</td></tr>";    
			}
			elseif($_SESSION['topic']=="Hyperlink")
			{
			        echo "<tr>";
			  	    echo "<td align=center bgcolor=blue>";?>
			  	    <a href="<?php echo $data["hyperlink"];?>" target="blank"><?php echo $data["hyperlink"];?>"</a>
			 <?php
			 echo "</td></tr>";      
			}
			else
			{
			    
			    echo "<tr>";
			    echo "<td>" . $data["details"] . "</td>";
			    echo "</tr>";
			    if($data["image"]<>"")
			    {
			    echo "<tr>";
			    echo "<td align=center>";
			    echo '<img src="data:image/jpeg;base64,' . base64_encode($data["image"]) . '" width="200" height="200">';
			    echo "</td>";
			    echo "</tr>";
			    }
			    echo "</tr>";
			}
			echo "<td bgcolor=#0000FF align=right><a href=random_number.php?que=" . $data["subject"] . ">Comments &nbsp;&nbsp&nbsp;<a href=random_number.php?examid=" . $data["subject"] . ">Get Question &nbsp;&nbsp&nbsp;<a href=random_number.php?uque=" . $data["subject"] . ">Display Comments</td>";
			$i++;
		}
}
		//computer
/*		$i=0;
while($i<$crownum)
		{
			echo "<tr>";
			echo "<td bgcolor=#FFFFCC><b>" . $_SESSION['level'] . " \ "  .  $_SESSION['faculty'] . " \ " . mysql_result($csql, $i, "subject") . " \ " . mysql_result($csql, $i, "topic") . "--Post By:" . mysql_result($csql, $i, "postby") . "</b></td>";
			$_SESSION['topic']=mysql_result($csql, $i, "topic");
			echo "</tr>";
			echo "<tr>";
			echo "<td>" . mysql_result($csql, $i, "Details") . "</td>";
			echo "</tr>";
			if(mysql_result($csql, $i, "image")<>"")
			{
			echo "<tr>";
			echo "<td align=center>";
			echo '<img src="data:image/jpeg;base64,' . base64_encode(mysql_result($csql, $i, "image")) . '" width="200" height="200">';
			echo "</td>";
			echo "</tr>";
			}
			echo "</tr>";
			echo "<td bgcolor=#0000FF align=right><a href=member.php?que=" . mysql_result($csql, $i, "subject") . ">Ask Question</td>";
			$i++;
		}
		*/
	}
}
?>