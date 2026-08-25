<?php
session_start();
include("../Processing/db_connection.php");

if (isset($_GET['mobileno']))
      {
      $mobileno = trim($_GET['mobileno']);
      $sql="SELECT tname, mobileno, citizenshipno, schoolname, appointdate,appointmonth,appointday,appointsubject,appointletter,citizenship,schoolrecommend,trainingcategory,trainingsubject,appointlocallevel,schooldistrict, schoollocallevel,priority1model,financialyear FROM tblapplication where mobileno LIKE ?";
      $stmt = mysqli_prepare($conn, $sql);
      $search = $mobileno . "%";
      mysqli_stmt_bind_param($stmt, "s", $search);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) > 0) 
            {
?>
<table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2" id="datatable">
<tr>
<th align="center">
      <font size="+2"><b>तालिमको लागि प्राप्त आवेदनहरु</b></font>
 <table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
 <tr>
<th>क्र.सं.</th>
<th>शिक्षककाे नाम</th>
<th>माेबाइल न‌‍</th>
<th>तालिमको नाम</th>
<th>विषय</th>
<th>तह</th>
<th>हाल कार्यरत जिल्ला</th>
<th> हाल कार्यरत पालिका</th>
<th>तालिम माेड</th>
<th>बिद्यालय</th>
<th>नियुक्ति मिति</th>
<th>आर्थिक वर्ष</th>
<th>नियुत्ति</th>
<th>नागरिक्ता</th>
<th>विद्यालय पत्र<th>
      
</tr>
<?php
$i=1;
      while ($row = mysqli_fetch_assoc($result)) 
            {
            echo "<tr>";
            echo "<td align=center>" . $i ."</td>";
            echo "<td>".$row["tname"]."</td>";
            echo "<td align=center>".$row["mobileno"]."</td>";
            echo "<td align=center>". $row["trainingcategory"]."</td>";
            echo "<td align=center>". $row["trainingsubject"]."</td>";
            echo "<td align=center>". $row["appointlocallevel"]."</td>";
            echo "<td align=center>". $row["schooldistrict"]."</td>";
            echo "<td align=center>". $row["schoollocallevel"]."</td>";
            echo "<td align=center>". $row["priority1model"]."</td>";
            echo "<td>".$row["schoolname"]."</td>";
            echo "<td>".$row["appointdate"]."/".$row["appointmonth"]."/".$row["appointday"]."</td>";
            echo "<td align=center>".$row["financialyear"]."</td>";
            ?>
            <td align="center">
                  <?php
                  if($row["appointletter"]<>"")
                        {
                  ?>
                  <a href="..\application_document\<?php echo $row["appointletter"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
            </td>
            <?php
                        }
                  else
                        {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }
                        ?>
            
                  <?php
                  if($row["citizenship"]<>"")
                  {
                  ?>
                  <td align="center">
                        <a href="..\application_document\<?php echo $row["citizenship"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
                  </td>
                  <?php
                  }
                  else
                   {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }
                        ?>
                  <?php
                  if($row["schoolrecommend"]<>"")
                  {
                  ?>
                  <td align="center">
                  <a href="..\application_document\<?php echo $row["schoolrecommend"];?>" target="_blank"><img src="../image/eye.png" width="20" height="15"></a>
                   </td>
                  <?php
                  }
                  else
                        {
                        ?>
                        <td>&nbsp;</td>
                        <?php
                        }

              echo "</tr>";
            $i++;
            }
     mysqli_close($conn);
?>
</table>
<?php
            }        
else 
      {

        echo "<span style='color:red;'>Mobile Number भेटिएन।</span>";
    }
    ?>
</div>
<?php
      }
?>
