<?php
include("../Processing/db_connection.php");
?>
<link rel="stylesheet" href="../CSS/main_table.css">
<?php
if (isset($_POST['search'])) 
{
$Name = $_POST['search'];
?>
<table width="90%" class="tdetails">
<tr>
<th>S.No</th>
<th>Teacher Code</th>
<th>Name of Teacher</th>
<th>Level</th>
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
if($Name<>"")
	 {
        $Query = "SELECT DISTINCT tcode FROM tbltpd where tname LIKE '$Name%' ORDER BY tname";
	    $ExecQuery = MySQLi_query($conn, $Query);
	    while ($rowt = MySQLi_fetch_array($ExecQuery)) 
   		{
       	    echo "<tr>";
	        echo "<td align=center>". $sn . "</td>";
             $teachercode=$rowt["tcode"];
	        echo "<td align=center>" . $teachercode . "</td>";
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
            $p1totalobtmark=0;
            $p2totalobtmark=0;
            $p1="";
            $p2="";
            $m1="";
            $m2="";
            $m3="";
            $Query1 = "SELECT tpdstep,regularatten, creative, written, planning FROM tbltpd where tcode='$teachercode'";
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
                    }
                else
                    {
                       echo "<td align=center>Uncomplete</td>";
                    }
            echo "<th><a href=../Display/tpd_teacher_details.php?tid=$teachercode target=_blank>Print</a></th>";
            echo "</tr>";
            $sn++;
        }
     }
}
?>
</table>
