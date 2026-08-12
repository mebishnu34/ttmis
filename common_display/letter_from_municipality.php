<br />
<table align="Left" class="subtable">
<?php
$sqlm="SELECT distinct msgnumber,ondate, munvdc from tblmuncipalityinfo where remark='Request'";
$resultm = $conn->query($sqlm);
echo "<OL>";
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
      echo "<tr><td>";  
      echo "<Li><a href=../Display/create_letter_2.php?tid=$rowm[msgnumber] target=_blank>"."<b>Download Letter On ".$rowm["ondate"]." / ".$rowm["munvdc"]."</b></a></</Li>";
      echo "<td></tr>";
    }
   }
     echo "</OL>";
?>
</table>
    
