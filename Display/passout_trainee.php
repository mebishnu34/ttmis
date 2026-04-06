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
      <font size="+2"><b>तालिम सम्पन्न भएका शिक्षकहरु</b></font>
 <table width="100%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>बिद्यालय</th>
<th>तालिमको नाम</th>
<th></th>
</tr>
<?php
$i=1;
$sql = "SELECT ID, teacherid,trainingid FROM tblmarkdetails where remark='Applicant' ORDER BY teacherid";
$result = $conn->query($sql);
if ($result->num_rows > 0)
      {
         while($row1 = $result->fetch_assoc())
         {
        echo "<td align=center>" . $i ."</td>";
            $sql1 = "SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointsubject,runtrainingid,groupnumber FROM tblapplication where appid='".$row1["teacherid"]."'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0)
                {
                    if($row = $result1->fetch_assoc())
                        {
                        $tname=$row["tname"];
                        $mobileno=$row["mobileno"];
                        $schoolname=$row["schoolname"];
                        }
                }
             $sql2 = "SELECT id,subject, startdate, enddate from tblruntraining where id='".$row1["trainingid"]."'";
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0)
                {
                   if($row2 = $result2->fetch_assoc())
                        {
                        $trainingname=$row2["subject"];
                        $sdate=$row2["startdate"];
                        $edate=$row2["enddate"];
                        }
                }
            echo "<td>".$tname."</td>";
            echo "<td align=center>". $mobileno."</td>";
            echo "<td>".$schoolname."</td>";
            echo "<td>".$trainingname."</td>";
            echo "<th align=center bgcolor=blue><a href=../Display/select_certificate_1.php?tid=".$row1["ID"]. " target=blank>Certificate</a></th>";
            echo "</tr>";
         $i++;
         }
      }
mysqli_close($conn);
?>
</table>
</div>

