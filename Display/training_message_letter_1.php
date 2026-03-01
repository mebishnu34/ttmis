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
 <link rel="stylesheet" type="text/css" href="../CSS/main_table.css">
 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<div align="Right">
    					<button type="button" id="export_button" class="button">Export</button>
    				</div>
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
<td align="Right" colspan="3"><font  size="3">मितिः  <?php echo $_SESSION['$tdate']; ?></font></td>
</tr>
<tr>
<td align="Center" colspan="3"><font size="4">विषयः तालिममा सहभागी गराइएका  शिक्षकहरुको विवरणा ।</td>
</tr>
 <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3">
<table id="teacher_data" cellspacing="0" border="1" width="100%" align="center">
<tr>
<th>क्र.सं.</th>
<th>शिक्षककाे नाम</th>
<th>विद्यालयकाे नाम</th>
<th>पद</th>
<th>स्थानिय तह</th>
<th>जिल्ला</th>
<th>नियुक्ति मिति</th>
<th>इमेल</th>
<th>सम्पर्क नम्बर</th>



</tr>
<?php
$i=1;
	$sql="SELECT ID,teacherid,schoolcode,munid,sdate,edate FROM tblttraining where (trainingid='$tid' or runid='$tid') and remark='Running'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
    	$i=1;
   		 while($rowm = $result->fetch_assoc())
    		{
            $teacherid[$i]=$rowm["teacherid"];
            $scode[$i]=$rowm["schoolcode"];
            $mid[$i]=$rowm["munid"];
			 $i++;
        	}
        		
      	}
$j=1;
for($n=0;$n<$i;$n=$n+1)
{
echo "<tr>";
	//echo $mid[$n];
	if(($n+1)<$i)
		{
        $tcode=$teacherid[$n+1];
        $sqlt = "SELECT tname,tcontact,level, email,appointdate FROM tblteacher where (teacherid='$tcode' or teachercode='$tcode')";
        $resultt = $conn->query($sqlt);
        if($resultt->num_rows > 0)
           {
            if($rowt = $resultt->fetch_assoc())
               {
                $tname=$rowt["tname"];
                $contact=$rowt["tcontact"];
                $tlevel=$rowt["level"];
                $email=$rowt["email"];
                $appointdate=$rowt["appointdate"];
                }
            }
        $schoolcode=$scode[$n+1];
		$sqlm="SELECT schoolname,munvdc,district FROM tblschool where schoolcode='$schoolcode'";
        $resultm = mysqli_query($conn,$sqlm);
        if($row = mysqli_fetch_array($resultm))
           	{
    	      $schoolname=$row["schoolname"];
              $mun=$row["munvdc"];
			   $district=$row["district"];
		    }
		?>
            <td align="center"><?php echo $j;?></td>
            <td align="left"><?php echo $tname;?></td>
            <td align="left"><?php echo $schoolname;?></td>
            <td align="left"><?php echo $tlevel;?></td>
            <td align="left"><?php echo $mun;?></td>
            <td align="center"><?php echo $district;?></td>
            <td align="center"><?php echo $appointdate;?></td>
            <td align="center"><?php echo $email;?></td>
            <td align="center"><?php echo $contact;?></td>
        <?php
		}
$j=$j+1;
echo "</tr>";
}
?>
</table>
</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font  size="3">
&nbsp;
 </td>
 </tr>

<tr>
<td align="center" colspan="3"><p align="Justify"><font  size="3">
प्रस्तुत विषयमा यस केन्द्रको आयोजनामा  <?php echo $level;?> अन्तरगत  <?php echo $subject;?>    विषयमा अध्यापनरत शिक्षकहरुको लागि तपसिलको मिति, समय र स्थानमा सञ्चालन हुने तालिममा माथि उल्लेखित  शिक्षकहरु समावेश गरिएकाे छ ।</font> 
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
<font size="+2"><b><?php echo $coordinator;?> </b></font><br>
<font size="+1"><b>तालिम स‌याेजक </b></font>
</div>

</div>
					<script>

function html_table_to_excel(type)
{
	var data = document.getElementById('teacher_data');

	var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

	XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

	XLSX.writeFile(file, 'teacher.' + type);
}

const export_button = document.getElementById('export_button');

export_button.addEventListener('click', () =>  {
	html_table_to_excel('xlsx');
});

</script>
</BODY>
</HTML>
<?php
}
?>


    
