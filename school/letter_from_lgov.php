<br />
<table>
<?php
$sqlm="SELECT distinct msgnumber,ondate,trainingid from tblschoolinfo where schoolcode='$_SESSION[code]'";
$resultm = $conn->query($sqlm);
echo "<OL>";
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
        {
            echo "<tr><td bgcolor=blue align=left>";
          echo "<Li><a href=school/create_letter_1.php?tid=$rowm[trainingid] target=_blank>"."<b>Download Letter OF ".$rowm["ondate"]."</b></a></</Li>";
          echo "</td></tr>";
                
                 
           
       }
     }
     echo "</OL>";
?>
</table>
    
