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
<br>
 <center><font size="+3" color="Red"><b><font size="7" color="red">&sext;&sext; <u>प्रमाण पत्र</u> &sext;&sext;</font></b></font></center>
-->
<div class="school_district">
<?php echo $schooldistrict;?> 
</div>
<div class="sewa_sdate">
    <?php echo $startdate;?>
</div> 
<div class="sewa_edate">
    <?php echo $enddate;?>
</div>
<div class="sewa_district">
<?php echo $district;?>
</div>
<div class="sewa_munvdc">
<?php echo $municipality;?> 
</div>
<div class="sewa_school">
<?php echo $schoolname;?>
</div>
<div class="sewa_name">
<?php echo $teachername;?>
</div>

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

  <tr>
 <td align="center" colspan="4"><font face="Fontasy Himali" size="4" color="white">मिति </font><font face="Fontasy Himali" size="4"><b><?php echo $printdate;?></b></font></td>
  </tr>
 </table>
 -->
 <div class="sewa_printdate">
    <?php echo $printdate;?>
</div>
</div>
</body>
</html>
    
