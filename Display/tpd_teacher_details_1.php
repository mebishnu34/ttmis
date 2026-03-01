<?php
session_start();
?>
<link rel="stylesheet" href="../CSS/main_table.css">
<?php
include("../Processing/db_connection.php");
$p1subject="";
$p1regular=0;
$p1creative=0;
$p1written=0;
$p1planning=0;
$p1totalobtmark=0;
$p1startdate="";
$p1enddate="";
$p1venue="";
$p1facilitor="";
$p2subject="";
$p2regular=0;
$p2creative=0;
$p2written=0;
$p2planning=0;
$p2totalobtmark=0;
$p2startdate="";
$p2enddate="";
$p2venue="";
$p2facilitor="";
$percent=0;
$p1gtotal=0;
$p2gtotal=0;
$regularfm=20;
$creativefm=20;
$writtenfm=40;
$projectfm=20;
 $teachercode=$_SESSION["updatecode"];
 $Query1 = "SELECT tname, teacherlevel, schoolname, logov, district FROM tbltpd where tcode='$teachercode'";
	    $ExecQuery1 = MySQLi_query($conn, $Query1);
	    if ($rowt = MySQLi_fetch_array($ExecQuery1)) 
   		{
    	$tname=$rowt["tname"];
		$sname=$rowt["schoolname"];
    	$log=$rowt["logov"];
        $district=$rowt["district"];
        }
?>
<table width="80%" border="1" align="Center" cellspacing="0">
<tr>
<td align="center">
<table width="100%" border="0" align="Center" cellspacing="0">
<tr>
<td align="center"><font size="2">शिक्षा तालिम केन्द्र</font></td>
</tr>
<tr>
<td align="center"><font size="2">धुलिखेल, काभ्रेपलाञ्चोक</td>
</tr>

<tr>
<td>
शिक्षकको नाम : <?php echo $tname;?><br>
विद्यालयको नाम : <?php echo $sname;?><br>
स्थानीय तह : <?php echo $log;?><br>
जिल्ला : <?php echo $district;?><br>
    </td>
</tr>
<tr>
<td align="right"><font  size="2">मितिः </font><font size="2"> <?php echo $_SESSION['$tdate'];?></font></td>
</tr>

<tr>
<td align="center"><font  size="4">प्राप्तांक विवरण</font></td>
</tr>
<tr>
<td>
<table align="center" id="details" class="tdetails" width="95%" border="0">
<?php 
include("result.php");
?>
<tr>
<th>S.No</th>
<th>Subject</th>
<th>Full Mark</th>
<th>P1<br>(<?php echo $p1startdate . date('Y-m-d', $p1startdate) . " To " . $p1startdate;?>)</th>
<th>P2<br>(<?php echo $p2startdate . " To " . $p2startdate;?>)</th>
<th>Total Mark</th>
<th>Result</th>
<th>Percent</th>
<th>Devision</th>
<th>Remark</th>
</tr>

<tr>
<td align="center">1</td>
<td>Regulation</td>
<td align="center"><?php echo $regularfm;?></td>
<td align="center"><?php echo $p1regular;?></td>
<td align="center"><?php echo $p2regular;?></td>
<?php
    $total=$p1regular+$p2regular;
    $result="";
    $division="";
    $percent=$total/$regularfm * 100;
    $p1gtotal+=$p1regular;
    $p2gtotal+=$p2regular;
    include("result.php");
?>
<td align="center"><?php echo $total;?></td>
<td align="center"><?php echo $result;?></td>
<td align="center"><?php echo $percent;?></td>
<td align="center"><?php echo $division;?></td>
<td align="center"><?php $rem;?></td>
</tr>
<tr>
<td align="center">2</td>
<td>Creative Work</td>
<td align="center"><?php echo $creativefm;?></td>
<td align="center"><?php echo $p1creative;?></td>
<td align="center"><?php echo $p2creative;?></td>
<?php
    $total=$p1creative+$p2creative;
    $result="";
    $division="";
    $percent=$total/$creativefm*100;
    $p1gtotal+=$p1creative;
    $p2gtotal+=$p2creative;
    include("result.php");
?>
<td align="center"><?php echo $total;?></td>
<td align="center"><?php echo $result;?></td>
<td align="center"><?php echo $percent;?></td>
<td align="center"><?php echo $division;?></td>
<td align="center"><?php $rem;?></td>
</tr>
<tr>
<td align="center">3</td>
<td>Written</td>
<td align="center"><?php echo $writtenfm;?></td>
<td align="center"><?php echo $p1written;?></td>
<td align="center"><?php echo $p2written;?></td>
<?php
    $total=$p1written+$p2written;
    $result="";
    $division="";
    $percent=$total/$writtenfm*100;
    $p1gtotal+=$p1written;
    $p2gtotal+=$p2written;
    include("result.php");
?>
<td align="center"><?php echo $total;?></td>
<td align="center"><?php echo $result;?></td>
<td align="center"><?php echo $percent;?></td>
<td align="center"><?php echo $division;?></td>
<td align="center"><?php $rem;?></td>
</tr>
<tr>
<td align="center">4</td>
<td>Project Work</td>
<td align="center"><?php echo $projectfm;?></td>
<td align="center"><?php echo $p1planning;?></td>
<td align="center"><?php echo $p2planning;?></td>
<?php
    $total=$p1planning+$p2planning;
    $result="";
    $division="";
    $percent=$total/$projectfm*100;
    $p1gtotal+=$p1planning;
    $p2gtotal+=$p2planning;
    include("result.php");
?>
<td align="center"><?php echo $total;?></td>
<td align="center"><?php echo $result;?></td>
<td align="center"><?php echo $percent;?></td>
<td align="center"><?php echo $division;?></td>
<td align="center"><?php $rem;?></td>

</tr>
<tr>
<td colspan="3" align="Right">Total</td>
<td align="center"><?php echo $p1gtotal;?></td>
<td align="center"><?php echo $p2gtotal;?></td>
<td align="center"><?php echo $nettotal;?></td>
<td align="center"><?php echo $finalresult;?></td>
<td align="center"><?php echo $finalpercent;?></td>
<td align="center"><?php echo $finaldivision;?></td>
<td align="center"><?php echo $finalrem;?></td>
</tr>
<?php
include("result.php");
?>
<tr>
<td colspan="3" align="Right">Result</td>
<td align="center"><?php echo $p1result;?></td>
<td align="center"><?php echo $p2result;?></td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
    </tr>
    <tr>
<td colspan="3" align="Right">Percentage</td>

<td align="center"><?php echo $p1percent;?></td>
<td align="center"><?php echo $p2percent;?></td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
    </tr>
    <tr>
<td colspan="3" align="right">Division</td>
<td align="center"><?php echo $p1division;?></td>
<td align="center"><?php echo $p2division;?></td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
<td align="center">-</td>
    </tr>
</table>
    </td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td align="Right">&nbsp;</td>
    </tr>
    </table>
    
    </td>
    </tr>
    </table>
