<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['linkid']))
    {
	$tid=$_GET['linkid'];
	$training="";
	$level="";
	$subject="";
	$sdate="";
	$edate="";
	$tdays="";
	$venue="";
	$coordinator="";
	$mobile="";
	$stime="";
	$msql = "SELECT munvdc FROM tblschool where schoolcode='$_SESSION[code]'";
	$mresult = $conn->query($msql);
	if($mresult->num_rows > 0)
   		{
		if($mrow = $mresult->fetch_assoc())
    		{
			$palika=$mrow["munvdc"];
			$msql1 = "SELECT districtname FROM tbldistrict where munvdc='$palika'";
			$mresult1 = $conn->query($msql1);
			if($mresult1->num_rows > 0)
   				{
				if($mrow1 = $mresult1->fetch_assoc())
    				{
					$district=$mrow1["districtname"];
					}
				}
			}
		}
	$sql1="SELECT trainingname, level,subject,startdate,enddate,trainingdays,venue,coordinator, mobileno,starttime from tblruntraining where id='$tid'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0)
   		{
    	
   		 if($row1 = $result1->fetch_assoc())
    		{
			$training=$row1["trainingname"];
			$level=$row1["level"];
			$subject=$row1["subject"];
			$sdate=$row1["startdate"];
			$edate=$row1["enddate"];
			$tdays=$row1["trainingdays"];
			$venue=$row1["venue"];
			$coordinator=$row1["coordinator"];
			$mobile=$row1["mobileno"];
			$stime=$row1["starttime"];
			}
		}
	$sql2="SELECT msgnumber, ldate from tbltraininginfo where runtrainingid='$tid'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0)
   		{
    	$i=1;
   		 while($row2 = $result2->fetch_assoc())
    		{
			$mn=$row2["msgnumber"];
			$ldate=$row2["ldate"];
			}
		}
   	?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Letter</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<div align="center" style="border:solid 4px black;">
<table width="90%" style="background-color: #FFFFFF;">
<tr>
<td colspan="3" align="center"><font size="3"></font></td>
</tr>
<tr>
<td align="center" width="10%"><img src="../Image/logo.jpg" width="150" height="130"></td>
<td align="center" width="80%"><font size="4"></font><br>
<font size="6"><?php echo $_SESSION['uname'];?></font><br>
<font  size="4"><?php echo $_SESSION['dname'];?></font><br>
</td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3"><font size="3">इ‍.च.नं. <?php echo $mn;?></font></td>
</tr>
<tr>
<td align="Right" colspan="3"><font  size="3">मितिः  <?php echo $ldate; ?></font></td>
</tr>
<tr>
<td align="Left" colspan="3">
<font size="4">
<b>
श्री <?php echo $palika;?><br>
<?php echo $district;?> <br>
</b>
</font>
</td>
</tr>
<tr>
<td align="Center" colspan="3"><font size="4">विषयः सहभागि छनोटगरि पठाएको बारे ।</td>
</tr>
 <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font  size="3">
प्रस्तुत विषयमा शिक्षा तालिम केन्द्र, धुलिखेलको आयोजनामा <?php echo $venue;?>  मा <?php echo $level;?> तहको <?php echo $subject;?>    विषयमा अध्यापनरत शिक्षकहरुको लागि  <font size="3"><b>मिति : <?php echo $sdate;?> देखि <?php echo $edate; echo "&nbsp;&nbsp;"; echo $tdays;?></b></font> दिने क्षमता अभिवृद्धि तालिममा निम्नानुसारका शिक्षकहरु छनोटगरि पठाएको व्यहोरा अनुरोध छ । </font> 
 </td>
 </tr>
</table>
<br><br><br>
<div align="center">
&nbsp;&nbsp;&nbsp;<font size="+2"><b><u>छनोट भएका शिक्षकहरुको विवरण</u></b></font><br>
<table cellspacing="0" border="1" width="100%" align="center" cellpadding="5">
<tr>
<th>क्र.सं.</th>
<th>शिक्षकको नाम</th>
<th>तह</th>
<th>शिक्षण विषय</th>
<th>शिक्षकको इमेल</th>
<th>सम्पर्क नम्बर</th>
</tr>
<?php
	$sn=1;
	$sql="SELECT teacherid,schoolcode,govname, tnumber, trainingname, subject, level, trainingid,remark, ondate,ldate FROM tbltrainingrequest where schoolcode='$_SESSION[code]' and trainingid='$tid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
    	$i=1;
   		 while($rowm = $result->fetch_assoc())
    		{
			$scode=$rowm["schoolcode"];
			$teacherid=$rowm["teacherid"];
			$tsql = "SELECT teacherid,tname,level,contact,teachingsubject,email FROM tblteacher where teacherid='$teacherid'";
			$tresult = $conn->query($tsql);
			if($tresult->num_rows > 0)
   			{
		    	if($trow = $tresult->fetch_assoc())
    			   {
				   $teachername=$trow["tname"];
				   $level=$trow["level"];
				   $subject=$trow["teachingsubject"];
				   $email=$trow["email"];
				   $mobile=$trow["contact"];
				   }
			}
			echo "<tr>";
			echo "<td align=center>". $sn . "</td>";
			echo "<td align=left>" . $teachername . "</td>";
			echo "<td align=center>" . $level . "</td>";
			echo "<td align=center>" . $subject . "</td>";
			echo "<td align=center>" . $email . "</td>";
			echo "<td align=center>" . $mobile . "</td>";
			$sn++;
			echo "</tr>";
			$i++;
        	}
	}
?>
</table>
<br><br><br>
<div align="right">
<font size="4"><b><?php echo $_SESSION['head'];?> </b></font><br>
<font size="4"><b><?php echo  $_SESSION['mobileno'];?> </b></font>
</div>

</div>
</BODY>
</HTML>
<?php
}
?>


    
