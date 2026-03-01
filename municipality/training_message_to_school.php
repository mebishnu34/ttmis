<?php
   include("Processing/db_connection.php");
   include("title.htm");
   $munid=$_SESSION['tid'];
?>
<form action="municipality/school.php" method="POST">
<table width="100%" border="1" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<th colspan="9" align=center>Number of Participate:<input type="Text" name="txtnumber" size="5"></th>
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
<th></th>
</tr>
<?php
$i=1;
$sqlm="SELECT runtrainingid from tbltraininginfo where munid='$munid'";
$resultm = $conn->query($sqlm);
if ($resultm->num_rows > 0)
 {
    while($rowm = $resultm->fetch_assoc())
    {
    $id=$rowm["runtrainingid"];
    $sql = "SELECT id,trainingid,trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$id' and remark='Running' ORDER BY trainingname";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    	{
        while($row = $result->fetch_assoc())
            {
				
			echo "<tr>";
            echo "<td>". $i . "</td>";
			$sql1 = "SELECT * from tblschoolinfo where munvdc='$_SESSION[uname]' and trainingid='$id'";
   			$result1 = $conn->query($sql1);
    		if ($result1->num_rows > 0)
				{
   				 ?>
                 <td align="center" bgcolor="#0033CC"><a href="municipality/school_list_message_sent.php?linkid=<?php echo $id;?>" target="blank">
				 <?php
				 echo $row["trainingname"];
				 ?>
				 </a></td>
			<?php
				}
			else
				{
				echo "<td align=center>".$row["trainingname"]."</td>";
				}
                 echo "<td align=center>". $row["level"] ."</td>";
                 echo "<td align=center>". $row["subject"]."</td>";
                 echo "<td align=center>". $row["startdate"]."</td>";
                 echo "<td align=center>". $row["enddate"]."</td>";
                 echo "<td align=center>". $row["venue"]."</td>";
                 echo "<td align=center><input type=checkbox name=tids[] value=". $row["id"] ."></td>";
				 echo "<td bgcolor=blue align=center> <a href=municipality/training_palika_letter.php?linkid=$row[id] target=_blank>Letter</a>
				 </td>";
					$i++;
                echo "</tr>";
                }
     	}
    }
}
?>
<tr>
<td colspan="9" align="center"><select name="option">
<option>All</option>
<option>Select</option>

</select></td>
</tr>
    </table>
    <input type="Submit" value="Select School" name="btnselect" > 
</form>
