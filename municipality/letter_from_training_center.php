<br />
<table align="Left" bgcolor="blue" cellpadding="10">
<?php
$munid=$_SESSION['tid'];
$sqlm="SELECT distinct msgnumber,ondate,runtrainingid from tbltraininginfo where munid='$munid'";
$resultm = $conn->query($sqlm);
echo "<UL>";
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
        echo "<tr><td>";
      echo "<Li><a href=municipality/create_letter.php?tid=$rowm[runtrainingid] target=_blank>"."<b> Download Letter On ".$rowm["ondate"]."<b></a></</Li>";
      echo "</td></tr>";
    }
   }
     echo "</UL>";
?>
</table>
    
