<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
$teacherid=$_GET['tid'];
$trainingid=$_SESSION['trainingid'];
}
if(isset($_GET['trainingid']))
{
 $teacherid=$_SESSION['teacherid']; 
 $trainingid=$_GET['trainingid']; 
}
$district="काभ्रेपलाञ्चोक";
$municipality="धुलिखेल";
$scode=0;
$startdate="";
$enddate="";
$venu="";
$subject="";
$trainingdays="";
$training="";
$schoolname="";
$teachername="";
$sql = "SELECT * FROM tblruntraining where trainingid='$trainingid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
        $training= $row["trainingname"];
        $level= $row["level"];
         $subject=$row["subject"];
         $startdate=$row["startdate"];
         $enddate= $row["enddate"];
         $venu=$row["venue"];
         $trainingdays=$row["trainingdays"];
        
        }
    }
/*
function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400*1000)); 
} 
   $date1=str_replace('/','-',$startdate);
  $date2=str_replace('/','-',$enddate);
  
  $date1="2037-08-06";
  $date2="2076-08-10";
  $trainingdays= dateDiffInDays($date2,$date1);
	*/
$cosql = "SELECT * FROM tblttraining where trainingid='$trainingid' and teacherid='$teacherid'";
$co = $conn->query($cosql);
if ($co->num_rows > 0)
   {
    if($corow = $co->fetch_assoc())
    {
         $coordinator=$corow["coordinator"];
         $scode=$corow["schoolcode"];
    }
    }
    $schoolname="........................................";
   $teachername="....................................................";
   $munvdc="............";
   
   
$sql1 = "SELECT * FROM tblteacher where teachercode='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
   {
    if($row1 = $result1->fetch_assoc())
    {
        $munvdc= $row1["munvdc"];
        $teachername= $row1["tname"];
         
    }
    }
$sql2 = "SELECT * FROM tblschool where schoolcode='$scode'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0)
   {
    while($row2 = $result2->fetch_assoc())
    {
        $schoolname= $row2["schoolname"];
        $schooladdress= $row2["address"];

    }
    }
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="../CSS/border.css">
<link rel="stylesheet" href="../CSS/certificate.css">
</HEAD>
<BODY>
<div align="center" class="certificate_border">
<br />
<table width="90%">
<tr>
<td align="center" width="10%"><img src="..\Image\logo.svg" width="150" height="150"></td>
<td align="center" width="80%">
    <font size="3" color="red">बागमती प्रदेश सरकार</font>
    <br>
    <font size="5" color="red">सामाजिक विकास मन्त्रालय</font><br>
<font size="7" color="red">शिक्षा तालिम केन्द्र</font><br>
<font size="5" color="red">धुलिखेल , काभ्रेपलाञ्चोक</font>

 </td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><font size="7" color="red">&sext;&sext; <u>प्रमाण पत्र</u> &sext;&sext;</font></td>
</tr>
   <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify" style="line-height: 2;"><font size="5">
    
शिक्षा तालिम केन्द्र, धुलिखेल, काभ्रेपलाञ्चोकको आयोजनामा मिति <font size="5"><b><?php echo $startdate;?></b></font> देखि <font size="5"><b><?php echo $enddate;?></b></font> सम्म तालिम केन्द्रमा आधारित १५ कार्य दिन र सो पश्चात विद्यालयमा आधारित १५ दिन गरी जम्मा ३० कार्य दिनको आधारभूत/माध्यमिक तहको सेवा प्रवेश तालिम <?php echo $district;?> जिल्ला,<?php echo $municipality;?> म.न.पा/उ.प.न.पा./न.पा./गा.पा. स्थित <font size="5"> <b><?php echo $schoolname;?></b></font> का शिक्षक तपाइ श्री <font size="5"> <b><?php echo $teachername;?></b></font><font size="5"> ले सफलतापूर्वक सम्पन्न गर्नुभएकाले स–धन्यवाद यो प्रमाणपत्र प्रदान गरिएको छ ।</font>


 </font></td>
 <tr>
 <td align="center" colspan="3"><font face="Kantipur" size="5">&nbsp</font></td>
  </tr>
  <tr>
 <td align="center" colspan="3"><font face="Kantipur" size="5">&nbsp</font></td>
  </tr>
  <tr>
  <td colspan="3">
  <table width="100%" border="0">
  <tr>
  <td align="center" width="30%"><font size="5">.......................</font></td>
  <td align="center"><font face="Kantipur" size="5">.......................</font></td>
 <td align="center" width="25%"><font size="5">.......................</font></td>
  
   
 </tr>
 <tr>
 <td align="center"><font size="5">तयार गर्ने</font></td>
  <td align="center"><font face="Kantipur" size="5">रुजु गर्ने</font></td>
 <td align="center"><font size="5">प्रमाणित गर्ने</font></td>
 </tr>
 <tr>
 <td align="center" colspan="3"><font face="Kantipur" size="5">&nbsp</font></td>
  </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>
