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
<center><font size="+1" color="blue"><b><font size="6" color="blue">एक महिने प्रमाणीकरण तालिम</font></b></font></center>
 <center><b><font size="7" color="red">&sext;&sext; <u>प्रमाण पत्र</u> &sext;&sext;</font></b></center>
-->
<div class="cnumber">
<?php echo $certificateno;?> 
</div>
<div class="school_district">
<?php 
if($regno<>"")
    {
        echo $schooldistrict . ':-'. $regno;
    }
else
    {
        echo $schooldistrict;
    }
?> 
</div>
<div class="onemonth_fathername">
<?php echo $fathername;?> 
</div>
<div class="onemonth_province">
<?php echo $province;?> 
</div>
<div class="onemonth_district">
<?php echo $district;?>
</div>
<div class="onemonth_munvdc">
<?php echo $munvdc;?>
</div>
<div class="onemonth_ward">
<?php echo $wardno;?>
</div>
<div class="onemonth_citizenshipno">
<?php echo $citizenshipno;?>
</div>
<div class="onemonth_name">
<?php echo $teachername;?>
</div>
<div class="onemonth_year">
<?php echo $traingyear;?>
</div>
<div class="onemonth_trainingname">
<?php 
echo $level;
//echo $training;?>
</div>
    <!--
  <table width="100%" border="0">

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

 <tr>
 <td align="center" colspan="4"><font face="Fontasy Himali" size="4" color="white">मिति </font><font face="Fontasy Himali" size="4"><b><?php echo $printdate;?></b></font></td>
  </tr>

 </table>
 -->
 <div class="onemonth_printdate">
<?php echo $printdate;?>
</div>
</div>
</body>
</html>
    
