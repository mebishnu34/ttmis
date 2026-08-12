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
	$ldate="";
	$mn="";
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
<td align="center" width="10%"><img src="../municipality/../Image/logo.jpg" width="150" height="130"></td>
<td align="center" width="80%"><font size="4">बागमती प्रदेश सरकार</font><br>
<font size="4">सामाजिक विकास मन्त्रालय</font><br>
<font  size="6">शिक्षा तालिम केन्द्र</font><br>
<font  size="4">धुलिखेल काभ्रेपलाञ्चोक</font><br><font face="Kantipur" size="4"> </font>
</td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3"><font size="3">इ‍.च.नं.</font><font size="3"> <?php echo $mn;?></font></td>
</tr>
<tr>
<td align="Right" colspan="3"><font  size="3">मितिः  <?php echo $ldate; ?></font></td>
</tr>
<tr>
<td align="Center" colspan="3"><font size="4">विषयः सहभागि पठाईदिने संबन्धमा ।</td>
</tr>
 <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3">
<table cellspacing="0" border="1" width="100%" align="center">
<tr>
<th>क्र.सं.</th>
<th>पालिकाको नाम</th>
<th>जिल्ला</th>
<th>सहभागी संख्या</th>
<th>क्र.सं.</th>
<th>पालिकाको नाम</th>
<th>जिल्ला</th>
<th>सहभागी संख्या</th>
<th>क्र.सं.</th>
<th>पालिकाको नाम</th>
<th>जिल्ला</th>
<th>सहभागी संख्या</th>

</tr>
<?php
$i=1;
	$sql="SELECT munid,msgnumber, pnumber from tbltraininginfo where runtrainingid='$tid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
    	$i=1;
   		 while($rowm = $result->fetch_assoc())
    		{
			$mid[$i]=$rowm["munid"];
			$pno[$i]=$rowm["pnumber"];
           	$pid=$rowm["munid"];
			$mn= $rowm["msgnumber"];
            /*
			$pn= $rowm["pnumber"];
			$sqlm="SELECT munvdc,districtname FROM tbldistrict where ID='$pid'";
            $resultm = mysqli_query($conn,$sqlm);
            if($row = mysqli_fetch_array($resultm))
                {
    		    ?>
				<tr>
				<td align="center"><?php echo $i;?></td>
				<td align="left"><?php echo $row["munvdc"];?></td>
				<td align="left"><?php echo $row["districtname"];?></td>
				<td align="center"><?php echo $pn;?></td>
				</tr>
				<?php
				$i++;
                }
			*/
			$i++;
        	}
        		
      	}
$j=1;
for($n=0;$n<$i;$n=$n+3)
{
echo "<tr>";

	//echo $mid[$n];
	if(($n+1)<$i)
		{
		$pid=$mid[$n+1];
		$sqlm="SELECT munvdc,districtname FROM tbldistrict where ID='$pid'";
        $resultm = mysqli_query($conn,$sqlm);
        if($row = mysqli_fetch_array($resultm))
           	{
    	?>
			
			<td align="center"><?php echo $j;?></td>
			<td align="left"><?php echo $row["munvdc"];?></td>
			<td align="left"><?php echo $row["districtname"];?></td>
			<td align="center"><?php echo $pno[$n+1];?></td>
		<?php
				
             }
		}
	if(($n+2)<($i))
		{
		$pid=$mid[$n+2];
		$sqlm="SELECT munvdc,districtname FROM tbldistrict where ID='$pid'";
        $resultm = mysqli_query($conn,$sqlm);
        if($row = mysqli_fetch_array($resultm))
           	{
    	?>
			<td align="center"><?php echo $j+1;?></td>
			<td align="left"><?php echo $row["munvdc"];?></td>
			<td align="left"><?php echo $row["districtname"];?></td>
			<td align="center"><?php echo $pno[$n+2];?></td>
		<?php
				
             }
		}
	if(($n+3)<($i)) 
	{ 
		$pid=$mid[$n+3];
		$sqlm="SELECT munvdc,districtname FROM tbldistrict where ID='$pid'";
        $resultm = mysqli_query($conn,$sqlm);
        if($row = mysqli_fetch_array($resultm))
           	{
    	?>
			<td align="center"><?php echo $j+2;?></td>
			<td align="left"><?php echo $row["munvdc"];?></td>
			<td align="left"><?php echo $row["districtname"];?></td>
			<td align="center"><?php echo $pno[$n+3];?></td>
			
		<?php
			
             }
	}
$j=$j+3;
echo "</tr>";
}
?>
</table>
</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font  size="3">
प्रस्तुत विषयमा यस केन्द्रको आयोजनामा  <?php echo $level;?> मा  <?php echo $subject;?>    विषयमा अध्यापनरत शिक्षकहरुको लागि  <?php echo $tdays;?> दिने क्षमता अभिवृद्धि तालिम तपसिलको मिति, समय र स्थानमा सञ्चालन हुने भएकोले तहाँ स्थानीयतह अन्तर्गतका विद्यालयहरुमध्येबाट सो तहमा <?php echo $subject;?> विषय अध्यापनरत शिक्षकलाई सहभागी हुन पठाइदिन हुन अनुरोध छ ।</font> 
 </td>
 </tr>
</table>
<br><br><br>
<div align="left">
&nbsp;&nbsp;&nbsp;<font size="4"><b><u>तपसिल</u></b></font><br>
&nbsp;&nbsp;&nbsp;<font size="3"><b>मिति : <?php echo $sdate;?> देखि <?php echo $edate;?> ( <?php echo $tdays;?> दिन)</b></font><br>
&nbsp;&nbsp;&nbsp;<font size="3"><b>समय : <?php echo $stime;?></b></font><br>
&nbsp;&nbsp;&nbsp;<font size="3"><b>स्थान : <?php echo $venue;?></b></font><br>
&nbsp;&nbsp;&nbsp;<font size="3"><b>थप जानकारीका लागि : <?php echo $coordinator;?> (<?php echo $mobile;?>)</b></font><br>
</div>

<br><br><br>
<div align="right">
<font size="+2"><b>रुद्रहरि भण्डारी </b></font><br>
<font size="+2"><b>तालिम प्रमुख </b></font>
</div>

</div>
</BODY>
</HTML>
<?php
}
?>


    
