<br />
<table align="Left" bgcolor="blue" cellspacing="10">
<?php
$sqlm="SELECT distinct tnumber,ondate,schoolcode from tbltrainingrequest where govname='$_SESSION[uname]' and remark='Request'";
$resultm = $conn->query($sqlm);
echo "<UL>";
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
        echo "<tr><td>";
      echo "<Li><a href=municipality/create_letter_3.php?tid=$rowm[tnumber] target=_blank>"."<b>Download Letter On ".$rowm["ondate"]." / School Code :-".$rowm["schoolcode"]."</b></a></</Li>";
      echo "</td></tr>";
    }
   }
     echo "</UL>";
?>
</table>
    
