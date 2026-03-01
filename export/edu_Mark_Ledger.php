<?php
session_start();
include("../database/db_connection.php");
$class=$_SESSION['class'];
$exam=$_SESSION['exam'];
include("../css/jquery.php");
?>
<table width="1200" align="center" bgcolor="#FFFFFF">
 <tr>
  <td align="center" width="300">
  <img src="../image/logo.jpg" width="100" height="100">
  </td>
  <td>
  <table>
  <tr>
  <td align="center"><font size="+4"><b><?php echo $_SESSION['compname'];?></b></font></td>
  </tr>
  <tr>
  <td align="center"><font size="+1"><b><?php echo $_SESSION['compaddress'];?></b></font></td>
  </tr>
  <tr>
  <td align="center"><font size="+3"><b><u>Mark Ledger-2072</u></b></font></td>
  </tr>
  </table>
<tr>
<td colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1"><b>Class: <?php echo $class;?></b></font></td>
</tr>
<tr>
<td colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1"><b>Exam: <?php echo $_POST['cmbexam']?></b></font></td>
</tr>
</table>

<table width="1400" border="1" align="center" bgcolor="#FFFFFF" id="ledger">
<?Php
echo "<tr>";
$subsql2=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and remark<>'Other' ORDER BY subindex",$con);
$rownum2=mysql_num_rows($subsql2);
$i=0;
echo "<td align=center rowspan=4>S.No</td>";
echo "<td align=center rowspan=4>Code</td>";
echo "<td align=center rowspan=4> Name of student </td>";
echo "<td align=center rowspan=4> Date of Birth </td>";
$t=0;
while($i<$rownum2)
	{
		$subject=mysql_result($subsql2,$i,"subname");
		$subsql3=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and subname='$subject' ORDER BY subindex",$con);
		$rownum3=mysql_num_rows($subsql3);
		$j=0;
		while($j<$rownum3)
			{
			$j++;
			}
		if($sub<>$subject)
			{
			if($j>1)
				{
				$j=$j+1;
				echo "<td align=center colspan=". $j . ">" .$subject. "</td>";
				$sub=$subject;
				}
			else
				{
				echo "<td align=center rowspan=2>" . $subject . "</td>";
				$sub=$subject;
				}
			}
					
		$i++;
	}
echo "<td align=center rowspan=4>Total</td>";
echo "<td align=center rowspan=4>Result</td>";
echo "<td align=center rowspan=4>Percentage </td>";
echo "<td align=center rowspan=4>Devision</td>";
echo "<td align=center rowspan=4>Rank</td>";
echo "</tr>";
echo "<tr>";
$subsql=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and remark<>'Other' ORDER BY subindex",$con);
$rownum=mysql_num_rows($subsql);
$i=1;
$t=0;
$s=0;
$sub1="";
while($i<$rownum)
	{
		
		$subject=mysql_result($subsql,$i,"subname");
		if($sub1<>$subject)
		{
			$subsql1=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and subname='$subject' ORDER BY subindex",$con);
			$rownum1=mysql_num_rows($subsql1);
			$j=0;
			while($j<$rownum1)
				{
				if($rownum1>1)
					{
						echo "<td align=center>" . mysql_result($subsql1, $j, "subcode") . "</td>";
						$subs[$s]=mysql_result($subsql1,$j,"subcode");
						$s++;
					}
				else
					{
					$subs[$s]=mysql_result($subsql1,$j,"subcode");
					$s++;
					}
				$j++;
				}
			if($j>1)
				{
				echo "<td align=center>Total</td>";
				$subs[$s]="Total";
				$s++;
				$t++;
				$j++;
				}
			$sub1=$subject;
			}
		$i++;
	}
echo "</tr>";
//Full mark
echo "<tr>";
$subsql=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and remark<>'Other' ORDER BY subindex",$con);
$rownum=mysql_num_rows($subsql);
$i=0;
$t=0;
$s=0;
$sub1="";
while($i<$rownum)
	{
		
		$subject=mysql_result($subsql,$i,"subname");
		if($sub1<>$subject)
		{
			$subsql1=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and subname='$subject' ORDER BY subindex",$con);
			$rownum1=mysql_num_rows($subsql1);
			$j=0;
			while($j<$rownum1)
				{
				if($rownum1>1)
					{
						$subs[$s]=mysql_result($subsql1,$j,"subcode");
						$sqlmark=mysql_query("select classname, subcode, fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$s]'",$con);
						$datam=mysql_fetch_array($sqlmark);
						echo "<td align=center>" . $datam["fullmark"] . "</td>";
						$fmtotal+=$datam["fullmark"];
						$s++;
					}
				else
					{
					$subs[$s]=mysql_result($subsql1,$j,"subcode");
					$sqlmark=mysql_query("select classname, subcode, fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$s]'",$con);
					$datam=mysql_fetch_array($sqlmark);
					echo "<td align=center>" . $datam["fullmark"] . "</td>";
					$s++;
					}
				$j++;
				}
			if($j>1)
				{
				echo "<td align=center>". $fmtotal ."</td>";
				$fmtotal=0;
				$subs[$s]="Total";
				$s++;
				$t++;
				$j++;
				}
			$sub1=$subject;
			}
		$i++;
	}
echo "</tr>";

// Pass mark

echo "<tr>";
$subsql=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and remark<>'Other' ORDER BY subindex",$con);
$rownum=mysql_num_rows($subsql);
$i=0;
$t=0;
$s=0;
$sub1="";
while($i<$rownum)
	{
		
		$subject=mysql_result($subsql,$i,"subname");
		if($sub1<>$subject)
		{
			$subsql1=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and subname='$subject' ORDER BY subindex",$con);
			$rownum1=mysql_num_rows($subsql1);
			$j=0;
			while($j<$rownum1)
				{
				if($rownum1>1)
					{
						$subs[$s]=mysql_result($subsql1,$j,"subcode");
						$sqlmark=mysql_query("select classname, subcode, fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$s]'",$con);
						$datam=mysql_fetch_array($sqlmark);
						echo "<td align=center>" . $datam["passmark"] . "</td>";
						$pmtotal+=$datam["passmark"];
						$s++;
					}
				else
					{
					$subs[$s]=mysql_result($subsql1,$j,"subcode");
					$sqlmark=mysql_query("select classname, subcode, fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$s]'",$con);
					$datam=mysql_fetch_array($sqlmark);
					echo "<td align=center>" . $datam["passmark"] . "</td>";
					$s++;
					}
				$j++;
				}
			if($j>1)
				{
				echo "<td align=center>$pmtotal</td>";
				$pmtotal=0;
				$subs[$s]="Total";
				$s++;
				$t++;
				$j++;
				}
			$sub1=$subject;
			}
		$i++;
	}
echo "</tr>";


$stusql=mysql_query("select stucode, stuname from tblstudentclass where class='$class' and remark='Running' ORDER BY sectionname, rollno",$con);
$sturownum=mysql_num_rows($stusql);
$s=0;
while($s<$sturownum)
	{
		echo "<tr>";
		echo "<td align=center>" . ($s+1) . "</td>";
		echo "<td align=center>" . mysql_result($stusql, $s, "stucode") . "</td>";
		$scode[$s]=mysql_result($stusql, $s, "stucode");
		echo "<td>" . mysql_result($stusql, $s, "stuname") ."</td>";
		$sname[$s]=mysql_result($stusql, $s, "stuname");
		$stucode=mysql_result($stusql,$s,"stucode");
		$studob=mysql_query("Select dyear, dmonth, dday from tblstudent where stucode='$stucode'",$con);
		$studob=mysql_fetch_array($studob);
		echo "<td>".$studob["dyear"]."-". $studob["dmonth"]."-".$studob["dday"]."</td>";
		$m=0;
		$total=0;
		$fm=0;
		$pm=0;
		$result=0;
		$res=1;
		$subtotal=0;
		while($m<($i+$t))
				{
					if($subs[$m]<>"Total")
					{
						$sqlmark=mysql_query("Select obtmark from tblmarkdetails where classname='$class' and subcode='$subs[$m]' and stucode='$stucode' and examname='$exam'",$con);
						$data=mysql_fetch_array($sqlmark);
						$sqlopt=mysql_query("Select subname from tblsubjectclass where subcode='$subs[$m]' and remark='Optional'",$con);
						$optrownum=mysql_num_rows($sqlopt);
						$sqlopt1=mysql_query("Select subname from tblsubjectclass where subcode='$subs[$m]'",$con);
						$subdata=mysql_fetch_array($sqlopt1);
						if($optrownum>0)
							{
							$opt="yes";
							}
						else
							{
							$opt="no";
							}
						if($opt=="no")
							{
							$sqlfpmark=mysql_query("select fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$m]'",$con);
							$fpdata=mysql_fetch_array($sqlfpmark);
							$fm+=$fpdata["fullmark"];
							$pm=$fpdata["passmark"];
							$total+=$data["obtmark"];
							}
						elseif($opt=="yes")
							{
							$sqlstu2=mysql_query("select * from tblstusubject where stucode='$stucode' and subcode='$subs[$m]'",$con);
							$sturow2=mysql_num_rows($sqlstu2);
							if($sturow2>0)
								{
								$sqlfpmark=mysql_query("select fullmark, passmark from tblsubmark where classname='$class' and subcode='$subs[$m]'",$con);
								$fpdata=mysql_fetch_array($sqlfpmark);
								$fm+=$fpdata["fullmark"];
								$pm=$fpdata["passmark"];
								$total+=$data["obtmark"];
								}
							}
						if($hm[$m]<$data["obtmark"])
							{
								$hm[$m]=$data["obtmark"];
							}
						
						if($opt=="no") // check optional subject yes or not, if optional subject is not then below 
							{
								if($data["obtmark"]<$pm)
									{
										echo "<td align=center bgcolor=#cccccc><u>" . $data["obtmark"] . "*</u></td>";
									}
								else
									{
										echo "<td align=center>" . $data["obtmark"] . "</td>";
									}
							}
						elseif($opt=="yes") // check optional subject yes or not, if optional subject is yes then below 
							{
								$sqlstu=mysql_query("select * from tblstusubject where stucode='$stucode' and subcode='$subs[$m]'",$con);
								$sturow=mysql_num_rows($sqlstu);
								if($sturow>0)
								{
									if($data["obtmark"]<$pm)
										{
											echo "<td align=center bgcolor=#cccccc><u>" . $data["obtmark"] . "*</u></td>";
										}
									else
										{
											echo "<td align=center>" .  $data["obtmark"] . "</td>";
										}
								}
								else
									{
										echo "<td align=center>-</td>";
									}
							}
						
						if($opt=="no")
							{
								if($res==1)
									 {
										if($data["obtmark"]>=$pm)
										  {
											 $result="Passed";
										  }
										else
										 {
											$result="Failed";
											$res=0;
										 }
									}
							}
						elseif($opt=="yes")
							{
							$sqlstu1=mysql_query("select * from tblstusubject where stucode='$stucode' and subcode='$subs[$m]'",$con);
							$sturow1=mysql_num_rows($sqlstu1);
							if($sturow1>0)
								{
									if($res==1)
									   {
											if($data["obtmark"]>=$pm)
											  {
												 $result="Passed";
											  }
											else
											 {
												$result="Failed";
												$res=0;
											 }
										}
								}
							}
					$subject=$subdata["subname"];
					$subsql1=mysql_query("Select subcode, subname from tblsubjectclass where class='$class' and subname='$subject'",$con);
					$rownum1=mysql_num_rows($subsql1);
					$j=0;
					if($rownum1>1)
						{
							$subtotal+=$data["obtmark"];
						}
					
				}
			elseif($subs[$m]="Total")
				{
				echo "<td align=center><b>" . $subtotal. "</b></td>";
				$subtotal=0;
				}
			else
				{
				echo "<td align=center><b>-</b></td>";
				$subtotal=0;
				}
				$m++;
		}
echo "<td align=center>" .$total . "</td>";
$stotal[$s]=$total;
echo "<td align=center>" . $result ."</td>";
$sresult[$s]=$result;
//$per=round((($total/$fm)*100),3);
if($total>0)
{
$per=number_format((($total/$fm)*100),2,'.','');
}
echo "<td align=center>" . $per ."</td>";
if($result=="Passed")
{
	$order[]=$per;
	$n++;
	}
else
	{
	$order[]=0;
	$n++;
	}
echo "<td align=center>";
if($per>=80 && $result=="Passed")
	{
	echo "Distinction";
	$sdiv[$s]="Distinction";
	}
elseif($per>=60 && $result=="Passed")
	{
	echo "First";
	$sdiv[$s]="First";
	}
elseif($per>=45 && $result=="Passed")
	{
	echo "Second";
	$sdiv[$s]="Second";
	}
elseif($per>=40 && $result=="Passed")
	{
	echo "Third";
	$sdiv[$s]="Third";
	}
else
	{
	echo "***";
	$sdiv[$s]="***";
	}

echo "</td>";
echo "<td align=center>";
	$rsql=mysql_query("select sturank, stunum from tblrank where examname='$exam' and stucode='$stucode'",$con);
			$rdata=mysql_fetch_array($rsql); 
	echo $rdata["sturank"];
echo "</td>";
$s++;
		echo "</tr>";
	}
/*
?>
<tr>
<td colspan="3" align="right"><b>Highest Mark</b></td>
<?php
$hs=0;
while($hs<$i)
	{
		echo "<td align=center><b>" . $hm[$hs] . "</b></td>";
		$hs++;
	}
?>
</tr>
<?php
*/
?>
</table>
<br>
<br>
<br>
<table width="1000">
<tr>
<td align="center">Class Teacher</td>
<td align="center">Varified By</td>
<td align="center">Principal</td>
</tr>
</table>
</body>
</html>