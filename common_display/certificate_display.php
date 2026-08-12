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
//echo $teacherid;
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
</HEAD>
<BODY>
<div align="center" id="b5">
<br />
<table width="90%">
<tr>
<td align="center" width="10%"><img src="..\Image\logo.svg" width="150" height="150"></td>
<td align="center" width="80%">
    <font size="3" color="red">प्रदेश सरकार</font>
    <br>
    <font size="5" color="red">सामाजिक विकास मन्त्रालय</font><br>
<font size="7" color="red">शिक्षा तालिम केन्द्र</font><br>
<font size="5" color="red">धुलिखेल , काभ्रेपलाञ्चोक</font><br><font color="red" size="5">  बागमती प्रदेश</font>

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
<td align="center" colspan="3"><p align="Justify"><font size="5">
शिक्षा तालिम केन्द्र, धुलिखेलको आयोजनामा मिति</font> <font size="5"><b><?php echo $startdate;?></b></font><font size="5"> गतेदेखि मिति </font><font size="5"><b><?php echo $enddate;?></b></font><font size="5"> गतेसम्म </font><font size="5"><b><?php echo $venu;?> </b></font> <font size="5"> मा सञ्चालन भएको</font><font size="5"><b> <?php echo $subject;?></b></font><font size="5"> संग सम्बन्धित विषयका शिक्षकहरूका लागि </font><font size="5"><b><?php echo $trainingdays;?></b></font> <font size="5"> दिने</font> <font size="5"><b><?php echo $training;?></b></font><font size="5"> तालिममा सहभागि हुनु भएको हुँदा श्री </font><font size="5"> <b><?php echo $schoolname;?></b></font><font size="5">का शिक्षक तपाइ श्री </font><font size="5"> <b><?php echo $teachername;?></b></font><font size="5">लाइ सधन्यवाद यो प्रमाणा पत्र प्रदान गरिएको छ ।</font>
 </font></td>
 <tr>
 <td align="center" colspan="3"><font face="Kantipur" size="5">&nbsp</font></td>
  </tr>
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
  <td align="center" width="30%"><font size="5"><?php echo $coordinator;?></font></td>
  <td align="center"><font face="Kantipur" size="5">&nbsp;</font></td>
 <td align="center" width="25%"><font size="5"></font></td>
  
   
 </tr>
 <tr>
 <td align="center"><font size="5">सहज कर्ता/संयोजक</font></td>
  <td align="center"><font face="Kantipur" size="5"></font></td>
 <td align="center"><font size="5">तालिम प्रमुख्र </font></td>
 
   
 </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>
