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
 <table width="180%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>S.No</th>
<th>नाम</th>
<th>माेबाइल न‌‍</th>
<th>स्थायी ठेगाना</th>
<th>शैक्षिक योग्यता</th>
<th>हालको अवस्था</th>
<th>कार्यरत  सस्थाको नाम</th>
<th>सहजीकरण प्रशिक्षण माध्यम</th>
<th>माथिल्लो शैक्षिक योग्यता</th>
<th>तालिम तथा प्रशिक्षण लिएको</th>
<th>सहजीकरण प्रशिक्षण गरेको</th>
<th>विज्ञता क्षेत्र</th>
<th>प्रकाशन अनुसन्धान</th>
<th>नागरिक्ता</th>
<th>बायोडाटा</th>
<th>शैक्षिक प्रमाण पत्र</th>
</tr>
<?php
$i=1;
$sql1 = "SELECT traineeid,traineename,trainerengname,mobileno,email,traineeaddress,currentaddress,qualification,position,workingoffice,citizenshipno,bankname,bankac,panno,trainingmode,trainingname,trainingsubject,cvfilename,qualifilename,citizenship FROM tbltrainee ORDER BY traineeid";
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
         echo "<td align=center>".$row["trainingmode"]."</td>";
         echo "<td valign=top>";
         ?>
         <table>
            <?php
         $sql3 = "SELECT trainerid,qualification, trainersubject, university, passedyear, grade, remark FROM tbltrainerqualification where trainerid='".$row["traineeid"]."' LIMIT 2";
         $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0)
            {
            while($row3 = $result3->fetch_assoc())
                  {
                  ?>
                  <tr>
                        <td><?php echo $row3["qualification"];?></td>
                        <td><?php echo $row3["trainersubject"];?></td>
                        <td><?php echo $row3["university"];?></td>
                        <td><?php echo $row3["passedyear"];?></td>
                  </tr>
                  <?php

                  }
             }
            echo "</table>";
          echo "</td>";
         echo "<td valign=top>";
         ?>
         <table>
            <?php
         $sql2 = "SELECT trainerid, trainingname, trainingperiod, organization,trainingyear, remark FROM tbltrainertraining where trainerid='".$row["traineeid"]."' LIMIT 2";
         $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0)
            {
            while($row2 = $result2->fetch_assoc())
                  {
                  ?>
                  <tr>
                        <td><?php echo $row2["trainingname"];?></td>
                        <td><?php echo $row2["trainingperiod"];?></td>
                        <td><?php echo $row2["organization"];?></td>
                        <td><?php echo $row2["trainingyear"];?></td>
                  </tr>
                  <?php

                  }
             }
            echo "</table>";
          echo "</td>";
         echo "<td valign=top>";
         ?>
         <table>
            <?php
         $sql4 = "SELECT trainerid,programname, rollinprogram, programsubject, organization, programyear, remark FROM tbltrainerprogram where trainerid='".$row["traineeid"]."' LIMIT 2";
         $result4 = $conn->query($sql4);
        if ($result4->num_rows > 0)
            {
            while($row4 = $result4->fetch_assoc())
                  {
                  ?>
                  <tr>
                        <td><?php echo $row4["programname"];?></td>
                        <td><?php echo $row4["rollinprogram"];?></td>
                        <td><?php echo $row4["programsubject"];?></td>
                        <td><?php echo $row4["organization"];?></td>
                  </tr>
                  <?php

                  }
             }
            echo "</table>";
          echo "</td>";
         echo "<td valign=top>";
         $sql5 = "SELECT trainerid,specialist, remark FROM tblspecialist where trainerid='".$row["traineeid"]."' LIMIT 2";
         $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0)
            {
            while($row5 = $result5->fetch_assoc())
                  {
                        echo $row5["specialist"]. ",&nbsp;&nbsp;";
                  }
             }
            
          echo "</td>";
         echo "<td valign=top>";
         $sql6 = "SELECT trainerid,publishtitle, publishdate, remark FROM tbltrainerpublish where trainerid='".$row["traineeid"]."' LIMIT 2";
         $result6 = $conn->query($sql6);
        if ($result6->num_rows > 0)
            {
            while($row6 = $result6->fetch_assoc())
                  {
                        echo $row6["publishtitle"];
                        if($row6["publishdate"]<>"")
                              {
                              echo "(".$row6["publishdate"].")";
                              }
                        echo ",&nbsp;&nbsp;";
                  }
             }
            
          echo "</td>";
         ?>
         <td align="center">
            <?php
            if($row["citizenship"]<>"")
                  {
            ?>
            <a href="..\application_document\<?php echo $row["citizenship"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            </td>
            <td>
            <?php
            }
            if($row["cvfilename"]<>"")
                  {
            ?>
            <a href="..\application_document\<?php echo $row["cvfilename"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            <?php
            }
             ?>
            </td>
            <td>
            <?php
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

