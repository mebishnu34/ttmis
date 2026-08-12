<HTML>
<head>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<BODY>
<form action="../Input/municipality.php" method="Post">
<table width="100%" class="subtable">
<tr>
<th colspan="8" align="Left2">Number of Participate:<input type="Text" name="txtnumber" size="5"></th>
</tr>
<tr>
<th>S.No</th>
<th>Name of Training</th>
<th>Level</th>
<th>Subject</th>
<th>Start Date</th>
<th>End Date</th>
<th>Venue</th>
<th></th>
</tr>
<?php
$i=1;
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where remark='Running' ORDER BY trainingname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    		     echo "<tr>";
                 echo "<td>". $i . "</td>";
                 echo "<td>". $row["trainingname"]."</td>";
                 echo "<td>". $row["level"] ."</td>";
                 echo "<td>". $row["subject"]."</td>";
                 echo "<td>". $row["startdate"]."</td>";
                 echo "<td>". $row["enddate"]."</td>";
                 echo "<td>". $row["venue"]."</td>";
                echo "<td align=center><input type=checkbox name=tid[] value=". $row["id"] ."></td>";
                $i++;
                echo "</tr>";
                }
     }
				?>
    </table>
    <input type="Submit" value="Select District" name="btnmsg" > 
   </form>
</BODY>
</HTML>
