<?php
session_start();
include("../Processing/db_connection.php");
$training=$_POST['cmbtraining'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$completecount=0;
$uncompletecount=0;
?>
<link rel="stylesheet" href="../CSS/main_table.css">
<table width="90%" border="0" align="Center" cellspacing="0">
<tr>
<td align="center"><font size="5">शिक्षा तालिम केन्द्र</font></td>
</tr>
<tr>
<td align="center"><font size="2">धुलिखेल, काभ्रेपलाञ्चोक</td>
</tr>
<tr>
<td>
तालिमको नाम : <?php echo $training;?><br>
तह : <?php echo $level;?><br>

 </td>
</tr>
<tr>
<td align="right"><font  size="2">मितिः </font><font size="2"> <?php echo $_SESSION['$tdate'];?></font></td>
</tr>

<tr>
<td align="center"><font  size="4"><?php echo $subject;?> विषयकाे TPD तालिम विवरण</font></td>
</tr>
</table>
<table width="90%" class="tdetails" align="center">

<tr>
<th>S.No</th>
<th>Teacher Code</th>
<th>Name of Teacher</th>
<th>Name of School</th>
<th>Local Government</th>
<th>District</th>
<th>P1</th>
<th>P2</th>
<th>Remark</th>
<th>&nbsp;</th>
</tr>
<?php
$sn=1;
    $Query = "SELECT DISTINCT tcode FROM tbltpd where teacherlevel='$level' and tsubject='$subject' ORDER BY tname";
	    $ExecQuery = MySQLi_query($conn, $Query);
	    while ($rowt = MySQLi_fetch_array($ExecQuery)) 
   		{
       	    echo "<tr>";
	        echo "<td align=center>". $sn . "</td>";
             $teachercode=$rowt["tcode"];
	        echo "<td align=center>" . $teachercode . "</td>";
        $Query1 = "SELECT tname, teacherlevel, schoolname, logov, district FROM tbltpd where tcode='$teachercode' and teacherlevel='$level' and tsubject='$subject'";
	    $ExecQuery1 = MySQLi_query($conn, $Query1);
	    if ($rowt = MySQLi_fetch_array($ExecQuery1)) 
   	    	{
    	    echo "<td>" . $rowt["tname"] . "</td>";
		    //echo "<td align=center>" . $rowt["teacherlevel"] . "</td>";
		    echo "<td>" . $rowt["schoolname"] . "</td>";
    	    echo "<td>" . $rowt["logov"] . "</td>";
            echo "<td align=center>" . $rowt["district"] . "</td>";
        	}
            $p1totalobtmark=0;
            $p2totalobtmark=0;

            $p1="";
            $p2="";
            $m1="";
            $m2="";
            $m3="";
            $Query1 = "SELECT tpdstep,regularatten, creative, written, planning FROM tbltpd where tcode='$teachercode' and teacherlevel='$level' and tsubject='$subject'";
	        $ExecQuery1 = MySQLi_query($conn, $Query1);
	        while ($rowt1 = MySQLi_fetch_array($ExecQuery1)) 
   		        {
                    if($rowt1["tpdstep"]=="P1" OR $rowt1["tpdstep"]=="P")
                        {
                            $p1="Yes";
                            $p1totalobtmark=$rowt1["regularatten"] + $rowt1["creative"] + $rowt1["written"] + $rowt1["planning"];
                            
                        }
                    if($rowt1["tpdstep"]=="P2")
                        {
                            $p2="Yes";
                            $p2totalobtmark=$rowt1["regularatten"] + $rowt1["creative"] + $rowt1["written"] + $rowt1["planning"];
                        }
                    if($rowt1["tpdstep"]=="M1")
                        {
                            $m1="Yes";
                        }
                    if($rowt1["tpdstep"]=="M2")
                        {
                            $m2="Yes";
                        }
                    if($rowt1["tpdstep"]=="M3")
                        {
                            $m3="Yes";
                        }
                    

                }
                echo "<td align=center>". $p1totalobtmark ."</td>";
                echo "<td align=center>". $p2totalobtmark ."</td>";
       	        if(($p1=="Yes" and $p2=="Yes") OR ($m1=="Yes" and $m2=="Yes" and $m3=="Yes"))
                    {
                       echo "<td align=center>Completed</td>";
                       $completecount++;
                    }
                else
                    {
                       echo "<td align=center>Uncomplete</td>";
                       $uncompletecount++;
                    }
            echo "<th><a href=../Display/tpd_teacher_details.php?tid=$teachercode target=_blank>Print</a></th>";
            echo "</tr>";
            $sn++;
        }
        
?>
</table>
<br>
<center>
<?php
    echo "Total TPD Completed in " . $subject . " is " . $completecount . "<br>";
    echo "Total TPD Uncompleted in " . $subject . " is " . $uncompletecount;
?>
</center>

