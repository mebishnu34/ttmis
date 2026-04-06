<?php
include("../Processing/db_connection.php");
include("../print_function.php");
?>
<form>
<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<div id="pdata">
      <font size="+2"><b>तालिमको लागि प्राप्त आवेदनहरु</b></font>
 <table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>नागरिक्ता न‌</th>
<th>बिद्यालय</th>
<th>नियुक्ति मिति</th>
<th>विषय</th>
<th></th>
</tr>
<?php
$i=1;
$sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,appointletter,citizenship,schoolrecommend FROM tblapplication ORDER BY appid";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
         while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>" . $i ."</td>";
         echo "<td>".$row["tname"]."</td>";
         echo "<td align=center>".$row["mobileno"]."</td>";
         echo "<td align=center>". $row["citizenshipno"]."</td>";
         echo "<td>".$row["schoolname"]."</td>";
         echo "<td>".$row["appointdate"]."</td>";
         echo "<td align=center>".$row["appointsubject"]."</td>";
         ?>
         <td align="center">
            <?php
            if($row["appointletter"]<>"")
                  {
            ?>
            <a href="..\application_document\<?php echo $row["appointletter"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            <?php
            }
            if($row["citizenship"]<>"")
            {
            ?>
                  <a href="..\application_document\<?php echo $row["citizenship"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            <?php
            }
            if($row["schoolrecommend"]<>"")
            {
            ?>
            <a href="..\application_document\<?php echo $row["schoolrecommend"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
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

