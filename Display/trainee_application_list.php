<?php
include("../Processing/db_connection.php");
include("../print_function.php");
?>

<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<div id="pdata">
      <font size="+2"><b>प्रशिक्षकको लागि प्राप्त आवेदनहरु</b></font>
 <table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>नाम</th>
<th>माेबाइल न‌‍</th>
<th>स्थायी ठेगाना</th>
<th>शैक्षिक योग्यता</th>
<th>हालको अवस्था</th>
<th>कार्यरत  सस्थाको नाम</th>
<th>विषयक्षेत्र</th>
<th></th>
</tr>
<?php
$i=1;
$sql1 = "SELECT traineename,trainerengname,mobileno,email,traineeaddress,currentaddress,qualification,position,workingoffice,citizenshipno,bankname,bankac,panno,trainingname,trainingsubject,cvfilename,qualifilename FROM tbltrainee";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
         while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>" . $i ."</td>";
         echo "<td>".$row["traineename"]."</td>";
         echo "<td align=center>".$row["mobileno"]."</td>";
         echo "<td align=center>". $row["traineeaddress"]."</td>";
         echo "<td>".$row["qualification"]."</td>";
         echo "<td>".$row["position"]."</td>";
         echo "<td align=center>".$row["workingoffice"]."</td>";
         echo "<td align=center>".$row["trainingsubject"]."</td>";
         ?>
         <td align="center">
            <?php
            if($row["cvfilename"]<>"")
                  {
            ?>
            <a href="..\application_document\<?php echo $row["cvfilename"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            <?php
            }
            if($row["qualifilename"]<>"")
            {
            ?>
                  <a href="..\application_document\<?php echo $row["qualifilename"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            <?php
            }
             ?>
            </td>

         <?php
         echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
?>
</table>
</div>

