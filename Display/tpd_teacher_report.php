<?php
include("../Processing/db_connection.php");
if (isset($_POST['search'])) 
{
$Name = $_POST['search'];
?>
<form action="../Object/update_teacher_code_1.php" method="Post">
<table width="350%" class="table_design_1">
<tr>
<th rowspan="2">S.No</th>
<th rowspan="2">Update Code</th>
<th rowspan="2">Teacher Code</th>
<th rowspan="2">Name of Teacher</th>
<th rowspan="2">Level</th>
<th rowspan="2">Name of School</th>
<th rowspan="2">Local Government</th>
<th rowspan="2">District</th>
<th rowspan="2">M1</th>
<th rowspan="2">M2</th>
<th rowspan="2">M3</th>
<th colspan="14">P1</th>
<th colspan="14">P2</th>
<th rowspan="2">Grand Total</th>
<th rowspan="2">Percentage</th>
<th rowspan="2">Division</th>
<th rowspan="2">Result</th>
<th rowspan="2">Remark</th>
</tr>
<tr>
<th>Regular Atten</th>
<th>Creative</th>
<th>Written</th>
<th>Planning</th>
<th>Total Obtain Mark</th>
<th>Percentage</th>
<th>Division</th>
<th>Result</th>
<th >Start Date</th>
<th >End Date</th>
<th >Financial Year</th>
<th >Venue</th>
<th>Facilitator</th>
<th>Remark</th>
<th>Regular Atten</th>
<th>Creative</th>
<th>Written</th>
<th>Planning</th>
<th>Total Obtain Mark</th>
<th>Percentage</th>
<th>Division</th>
<th>Result</th>
<th >Start Date</th>
<th >End Date</th>
<th >Financial Year</th>
<th >Venue</th>
<th>Facilitator</th>
<th>Remark</th>
</tr>

<?php
$sn=1;
if($Name<>"")
	 {
        $Query = "SELECT DISTINCT tcode FROM tbltpd where tname LIKE '$Name%' ORDER BY tname";
	    $ExecQuery = MySQLi_query($conn, $Query);
	    while ($rowt = MySQLi_fetch_array($ExecQuery)) 
   		{
       	 echo "<tr>";
	    echo "<td align=center>". $sn . "</td>";
        echo "<td><input type=text name=txtrecordcode[]></td>";
        $teachercode=$rowt["tcode"];
	    echo "<td align=center><input type=hidden name=txttpdcode[] value=" . $teachercode . " size=10>" . $teachercode . "</td>";
        $Query1 = "SELECT tname, teacherlevel, schoolname, logov, district FROM tbltpd where tcode='$teachercode'";
	    $ExecQuery1 = MySQLi_query($conn, $Query1);
	    if ($rowt = MySQLi_fetch_array($ExecQuery1)) 
   		{
    	echo "<td>" . $rowt["tname"] . "</td>";
		echo "<td align=center>" . $rowt["teacherlevel"] . "</td>";
		echo "<td>" . $rowt["schoolname"] . "</td>";
    	echo "<td>" . $rowt["logov"] . "</td>";
        echo "<td align=center>" . $rowt["district"] . "</td>";
        }
        else
        {
            echo "<td>-</td>";
		    echo "<td align=center>-</td>";
		    echo "<td>-</td>";
    	    echo "<td>-</td>";
            echo "<td align=center>-</td>";
        }
        $sn++;
        $QueryM1 = "SELECT * FROM tbltpd where tcode='$teachercode' and tpdstep='M1'";
	    $ExecQueryM1 = MySQLi_query($conn, $QueryM1);
   		if ($rowt = MySQLi_fetch_array($ExecQueryM1)) 
   		{
             echo "<td align=center>M1</td>";
        }
        else
        {
            echo "<td align=center>-</td>";
        }
        $QueryM2 = "SELECT * FROM tbltpd where tcode='$teachercode' and tpdstep='M2'";
	    $ExecQueryM2 = MySQLi_query($conn, $QueryM2);
        if ($rowt = MySQLi_fetch_array($ExecQueryM2)) 
   		{
             echo "<td align=center>M2</td>";
        }
        else
        {
            echo "<td align=center>-</td>";
        }

        $QueryM3 = "SELECT * FROM tbltpd where tcode='$teachercode' and tpdstep='M3'";
	    $ExecQueryM3 = MySQLi_query($conn, $QueryM3);
        if ($rowt = MySQLi_fetch_array($ExecQueryM3)) 
   		{
             echo "<td align=center>M3</td>";
        }
        else
        {
            echo "<td align=center>-</td>";
        }
        $totalobtmark=0;
        $QueryP1 = "SELECT regularatten, creative, written, planning,trainingdate, closingdate, fyear, trainingvenue, facilitator,remark FROM tbltpd where tcode='$teachercode' and tpdstep='P1'";
	    $ExecQueryP1 = MySQLi_query($conn, $QueryP1);
        if ($rowt = MySQLi_fetch_array($ExecQueryP1)) 
   		{
            echo "<td align=center>" . $rowt["regularatten"] . "</td>";
            echo "<td align=center>" . $rowt["creative"] . "</td>";
            echo "<td align=center>" . $rowt["written"] . "</td>";
            echo "<td align=center>" . $rowt["planning"] . "</td>";
            $totalobtmark=$rowt["regularatten"]+$rowt["creative"]+$rowt["written"]+$rowt["planning"];
            echo "<td align=center>" . $totalobtmark . "</td>";
            $percentage=$totalobtmark/100 * 100;
            echo "<td align=center>" . $percentage . "</td>";
            echo "<td align=center>";
            if($percentage>80)
            {
                echo "Distinction";        
            }
            elseif($percentage>=60)
            {
            echo "First";
            }
            elseif($percentage>=60)
            {
            echo "Second";
            }
            elseif($percentage>=60)
            {
            echo "Third";
            }
            else
            {
            echo "Failed";
            }
        echo "</td>";
        echo "<td align=center>";
            if($percentage>40)
            {
                echo "Passed";        
            }
            else
            {
                echo "Failed";
            }
            echo "</td>";
        echo "<td align=center>" . $rowt["trainingdate"] . "</td>";
        echo "<td align=center>" . $rowt["closingdate"] . "</td>";
        echo "<td align=center>" . $rowt["fyear"] . "</td>";
        echo "<td align=center>" . $rowt["trainingvenue"] . "</td>";
        echo "<td>" . $rowt["facilitator"] . "</td>";
        echo "<td align=center>" . $rowt["remark"] . "</td>";
        }
        else
        {
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td>-</td>";
            echo "<td>-</td>";
        }
        $totalobtmarkp2=0;
        $QueryP2 = "SELECT regularatten, creative, written, planning,trainingdate, closingdate, fyear, trainingvenue, facilitator,remark FROM tbltpd where tcode='$teachercode' and tpdstep='P2'";
	    $ExecQueryP2 = MySQLi_query($conn, $QueryP2);
        if ($rowt = MySQLi_fetch_array($ExecQueryP2)) 
   		{
            echo "<td align=center>" . $rowt["regularatten"] . "</td>";
            echo "<td align=center>" . $rowt["creative"] . "</td>";
            echo "<td align=center>" . $rowt["written"] . "</td>";
            echo "<td align=center>" . $rowt["planning"] . "</td>";
            $totalobtmarkp2=$rowt["regularatten"]+$rowt["creative"]+$rowt["written"]+$rowt["planning"];
            echo "<td align=center>" . $totalobtmarkp2 . "</td>";
            $percentage=$totalobtmarkp2/100 * 100;
            echo "<td align=center>" . $percentage . "</td>";
            echo "<td align=center>";
            if($percentage>80)
            {
                echo "Distinction";        
            }
            elseif($percentage>=60)
            {
            echo "First";
            }
            elseif($percentage>=60)
            {
            echo "Second";
            }
            elseif($percentage>=60)
            {
            echo "Third";
            }
            else
            {
            echo "Failed";
            }
        echo "</td>";
        echo "<td align=center>";
            if($percentage>40)
            {
                echo "Passed";        
            }
            else
            {
                echo "Failed";
            }
            echo "</td>";
        echo "<td align=center>" . $rowt["trainingdate"] . "</td>";
        echo "<td align=center>" . $rowt["closingdate"] . "</td>";
        echo "<td align=center>" . $rowt["fyear"] . "</td>";
        echo "<td align=center>" . $rowt["trainingvenue"] . "</td>";
        echo "<td>" . $rowt["facilitator"] . "</td>";
        echo "<td align=center>" . $rowt["remark"] . "</td>";
        }
        else
        {
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td align=center>-</td>";
            echo "<td>-</td>";
            echo "<td align=center>-</td>";
        }
        $grandtotal = $totalobtmark + $totalobtmarkp2;

        echo "<td align=center>" . $grandtotal . "</td>";
        $gpercent=$grandtotal/100 * 100;
        echo "<td align=center>" . $gpercent . "</td>";
            
           
            echo "<td align=center>";
            if($gpercent>80)
            {
                echo "Distinction";        
            }
            elseif($gpercent>=60)
            {
            echo "First";
            }
            elseif($gpercent>=60)
            {
            echo "Second";
            }
            elseif($gpercent>=60)
            {
            echo "Third";
            }
            else
            {
            echo "Failed";
            }
        echo "</td>";
        echo "<td align=center>";
        if($gpercent>40)
        {
            echo "Passed";        
        }
        else
        {
            echo "Failed";
        }
        echo "</td>";
        echo "<td><a href=../Display/tpd_teacher_details.php?tid=$teachercode target=_blank>Print</a></td>";
		echo "</tr>";
		}
}
}

?>
</table>
<br><br>
<center><input type="submit" value="Update Code"></center>
<?php
$count=0;
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
 if($Name<>"")
 {
   $Query = "SELECT teacherid, teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '$Name%' LIMIT 100";
   $ExecQuery = MySQLi_query($conn, $Query);
   echo '
 <table width="100%">
   ';
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
     <a>
	<tr>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'> 
    <?php echo $Result['teacherid']; ?>
   </td>
   <td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tname']; ?></td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tcontact']; ?> </td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['schoolname']; ?></td>
   <td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['munvdc']; ?></td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'> <?php echo $Result['district']; ?></td>
   </tr>
   </a>
   <?php
   $count++;
}}
}
echo $count;
?>
