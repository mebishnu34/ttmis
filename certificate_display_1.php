<?php
include("Processing/db_connection.php");
if(isset($_GET['tid']))
{
$tid=$_GET['tid'];
$sql = "SELECT * FROM tblttraining where ID='$tid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
		$id=$row["trainingid"];
		$sql1 = "SELECT * FROM tblruntraining where id='$id'";
  		$result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
           if($row1 = $result1->fetch_assoc())
             {
               $training= $row1["trainingname"];
        		$level= $row1["level"];
         		$subject=$row1["subject"];
				$venu=$row1["venue"];
			 }
			}
         $startdate= $row["sdate"];
         $enddate= $row["edate"];
         $teacherid=$row["teacherid"];
         $coordinator=$row["coordinator"];
         
         //echo $teacherid;
    }
    }
   }
   $schoolname="........................................";
   $teachername="....................................................";
   $munvdc="............";
   $scode=".......";
   
$sql1 = "SELECT * FROM tblteacher where teachercode='$teacherid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
   {
    while($row1 = $result1->fetch_assoc())
    {
        $munvdc= $row1["munvdc"];
        $teachername= $row1["tname"];
         $scode=$row1["scode"];
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
</HEAD>
<BODY>
<div align="center">
<table width="90%" style="background-color: #FFFFFF;">
<tr>
<td colspan="3" align="center"><font face="preeti" size="3" color="red">k|b]z ;/sf/ </font></td>
</tr>
<tr>
<td align="center" width="10%"><img src="Image\logo.svg" width="150" height="150"></td>
<td align="center" width="80%"><font face="preeti" size="5" color="red">;fdflhs ljsf; dGqfno </font><br>
<font face="Preeti" size="10" color="red">lzIff tflnd s]Gb|</font><br>
<font face="preeti" size="5" color="red">w'lnv]n sfe|[knf~rf]s</font><br><font face="Preeti" color="red" size="5"> k|b]z g+= #</font>

 </td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><font face="preeti" size="12" color="red"><u>k|df0f kq</u></font></td>
</tr>
   <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font face="preeti" size="10">
lzIff tflnd s]Gb|, sfe|]knf~rf]ssf] cfof]hgfdf ldlt</font> <font size="6"><?php echo $startdate;?></font><font face="preeti" size="10"> ut] b]lv ldlt</font><font size="6"> <?php echo $enddate;?></font><font face="preeti" size="10"> ut] ;Dd </font> <font size="6"><?php echo $venu;?> </font> <font face="preeti" size="10">df ;~rfng ePsf]</font><font size="6"> <?php echo $subject;?></font><font face="preeti" size="10"> ;+u ;DalGwt ljifosf lzIfsx?sf nflu </font><font size="6"><?php echo 5;?></font> <font face="preeti" size="10">lbg] s:6dfOH8</font> <font size="6"><?php echo $training;?></font><font face="preeti" size="10"> tflnddf ;xeflu x'g' ePsf] x'Fbf >L </font><font size="6"> <?php echo $schoolname;?></font><font face="preeti" size="10"> sf lzIfs tkfO{ >L  </font><font size="6"> <?php echo $teachername;?></font><font face="preeti" size="10">nfO{ ;wGojfb  of] k|df0f kq k|bfg ul/Psf] 5 .</font>
 </font></td>
 <tr>
 <td align="center" colspan="3"><font face="preeti" size="5">&nbsp</font></td>
  </tr>
  <tr>
 <td align="center" colspan="3"><font face="preeti" size="5">&nbsp</font></td>
  </tr>
 <tr>
 <td align="center" colspan="3"><font face="preeti" size="5">&nbsp</font></td>
  </tr>
  <tr>
  <td colspan="3">
  <table width="100%" border="0">
  <tr>
 <td align="center" width="25%"><font face="preeti" size="10"></font></td>
  <td align="center"><font face="preeti" size="5">&nbsp;</font></td>
   <td align="center" width="30%"><font face="Arial" size="6"><?php echo $coordinator;?></font></td>
 </tr>
 <tr>
 <td align="center"><font face="preeti" size="10">tflnd k|d'v</font></td>
  <td align="center"><font face="preeti" size="5"></font></td>
   <td align="center"><font face="preeti" size="10">;xhstf{</font></td>
 </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>
