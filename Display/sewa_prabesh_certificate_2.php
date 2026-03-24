<?php
if(!isset($_SESSION))
{
session_start();
}
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
$printdate="2082/12/10";
?>

<html>
    <head>
        <link rel="stylesheet" href="../CSS/certificate.css">
        <link rel="stylesheet" href="../CSS/paging.css">
    </head>
<body>
<div class="page">
<div class="div_certificate">
<!--
<table width="100%" align="center">
    <tr>
        <td align="center" width="20%"><img src="..\Image\logo.svg" width="100" height="100"></td>
        <td align="center" width="60%">
            <font color="red" size="+1"><b>
   बागमती प्रदेश सरकार<br>
सामाजिक विकास मन्त्रालय<br>
<font size="+3"><b>शिक्षा तालिम केन्द्र</b></font><br>
धुलिखेल , काभ्रेपलाञ्चोक</b></font></td>
<td width="20%">&nbsp;</td>
    </tr>
</table>
<br>
<br>
 <center><font size="+3" color="Red"><b><font size="7" color="red">&sext;&sext; <u>प्रमाण पत्र</u> &sext;&sext;</font></b></font></center>
-->
 <br>
 <br><br><br><br><br><br><br><br><br>
 <br>
     <div align="justify" style="line-height: 2;">
        <font size="+1">
           <font color="white">शिक्षा तालिम केन्द्र, धुलिखेल, काभ्रेपलाञ्चोकको आयोजनामा मिति </font><font size="5"><b><?php echo $startdate;?></b></font> <font color="white"> देखि </font> <font size="5"><b><?php echo $enddate;?></b></font> <font color="white">सम्म तालिम केन्द्रमा आधारित १५ कार्य दिन र सो पश्चात विद्यालयमा आधारित १५ दिन गरी जम्मा ३० कार्य दिनको आधारभूत/माध्यमिक तहको सेवा प्रवेश तालिम </font><font size="5"><?php echo $district;?></font> <font color="white"> जिल्ला,</font><font size="5"><?php echo $municipality;?> <font color="white"> म.न.पा/उ.प.न.पा./न.पा./गा.पा. स्थित </font><font size="5"> <b><?php echo $schoolname;?></b></font> <font color="white">का शिक्षक तपाइ श्री </font><font size="5"> <b><?php echo $teachername;?></b></font><font size="5" color="white">ले सफलतापूर्वक सम्पन्न गर्नुभएकाले स–धन्यवाद यो प्रमाणपत्र प्रदान गरिएको छ ।</font>
        </font>    
    </div>
<br>
<br><br><br><br><br><br><br><br><br><br>

  <table width="100%" border="0">
    <!--
  <tr>
  <td align="center" width="30%"><font size="5">.......................</font></td>
  <td align="center"><font size="5">..................</font></td>
 <td align="center" width="25%"><font size="5">.......................</font></td>
  
   
 </tr>
 <tr>
 <td align="center"><font size="5">तयार गर्ने</font></td>
  <td align="center"><font face="Kantipur" size="5">रुजु गर्ने</font></td>
 <td align="center"><font size="5">प्रमाणित गर्ने</font></td>
 </tr>
 <tr>
    <td colspan="3">&nbsp;</td>
</tr>
-->
  <tr>
 <td align="center" colspan="4"><font face="Fontasy Himali" size="4" color="white">मिति </font><font face="Fontasy Himali" size="4"><b><?php echo $printdate;?></b></font></td>
  </tr>
 </table>
</div>
</body>
</html>
    
