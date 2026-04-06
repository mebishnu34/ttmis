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
<th>तालिमको नाम</th>
<th>तालिम स‌चालन हुने मिति</th>
</tr>
<?php
$i=1;
$sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,runtrainingid,groupnumber FROM tblapplication where remark='Selected' ORDER BY appid";
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
         $sql = "SELECT id,subject, startdate, enddate from tblruntraining where id='".$row["runtrainingid"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
                {
                    if($row1 = $result->fetch_assoc())
                        {
				           $trainingname=$row1["subject"];
                           $sdate=$row1["startdate"];
                           $edate=$row1["enddate"];
	                    }
                }
         echo "<td>".$trainingname."</td>";
         echo "<td align=center>मिति ".$sdate. " देखि ". $edate." सम्म</td>";
         echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
?>
</table>
</div>

