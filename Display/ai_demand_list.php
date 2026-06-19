<?php
include("../Processing/db_connection.php");
include("../print_function.php");
?>

<div align="right">
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<div id="pdata">
      <font size="+2"><b>अनलाइनमा आधारित AI Based Digital Learning Training का लागि प्राप्त आवेदनहरु</b></font>
 <table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>नाम</th>
<th>पद</th>
<th>तह</th>
<th>विषय</th>
<th>अनुभव वर्ष</th>
<th>माेबाइल न‌‍</th>
<th>इमेल</th>
<th>विद्यालयकाे नाम</th>
<th>जिल्ला</th>
<th>पालिका</th>
<th>वडा न‌</th>
</tr>
<?php
$i=1;
$sql1 = "SELECT traineename,traineepost, appointlevel, traineesubject, experenceyear,mobileno,email,schoolname,district,munvdc,wardno FROM tblaitraining order by regdate DESC";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
      {
         while($row = $result1->fetch_assoc())
         {
         echo "<td align=center>" . $i ."</td>";
         echo "<td>".$row["traineename"]."</td>";
         echo "<td>".$row["traineepost"]."</td>";
         echo "<td>".$row["appointlevel"]."</td>";
         echo "<td>".$row["traineesubject"]."</td>";
         echo "<td>".$row["experenceyear"]."</td>";
         echo "<td align=center>".$row["mobileno"]."</td>";
         echo "<td align=center>". $row["email"]."</td>";
         echo "<td>".$row["schoolname"]."</td>";
         echo "<td>".$row["district"]."</td>";
         echo "<td align=center>".$row["munvdc"]."</td>";
         echo "<td align=center>".$row["wardno"]."</td>";
         echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
?>
</table>
</div>

