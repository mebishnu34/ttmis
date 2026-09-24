<?php
session_start();
include("../Processing/db_connection.php");
$output='';
$output .='
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
<th>विषय</th>
</tr>';
$i=1;
if($_SESSION["listtype"]=="Selected")
      {
                     
            $sql1 = "
                  SELECT 
                        tname,
                        mobileno,
                        citizenshipno,
                        schoolname,
                        appointdate,
                        appointmonth,
                        appointday,
                        appointsubject,
                        appointletter,
                        citizenship,
                        schoolrecommend,
                        trainingcategory,
                        trainingsubject,
                        appointlocallevel,
                        schooldistrict,
                        schoollocallevel,
                        priority1model
                  FROM tblapplication
                  WHERE remark='Selected' AND financialyear = ?";
                  $params = [$_SESSION['appyear']];
                  $types  = "s";
                  // Add filters only when selected
                  if ($_SESSION["chkdistrict"] == "district") {
                  $sql1 .= " AND schooldistrict = ?";
                  $params[] = $_SESSION["district"];
                  $types .= "s";
                  }

                  if ($_SESSION["chkpalika"] == "palika") {
                  $sql1 .= " AND schoollocallevel = ?";
                  $params[] = $_SESSION["munvdc"];
                  $types .= "s";
                  }

                  if ($_SESSION["chklevel"] == "level") {
                  $sql1 .= " AND appointlocallevel = ?";
                  $params[] = $_SESSION["level"];
                  $types .= "s";
                  }

                  if ($_SESSION["training"] == "training") {
                  $sql1 .= " AND trainingcategory = ?";
                  $params[] = $_SESSION["category"];
                  $types .= "s";
                  }

                  if ($_SESSION["chksubject"] == "subject") {
                  $sql1 .= " AND trainingsubject = ?";
                  $params[] = $_SESSION["subject"];
                  $types .= "s";
                  }

                  $sql1 .= " ORDER BY appid";
                  $stmt = $conn->prepare($sql1);
                  $stmt->bind_param($types, ...$params);
                  $stmt->execute();
                  $result1 = $stmt->get_result();
      }
elseif($_SESSION["listtype"]=="NotSelected")
      {
            
            $sql1 = "
                  SELECT 
                        tname,
                        mobileno,
                        citizenshipno,
                        schoolname,
                        appointdate,
                        appointmonth,
                        appointday,
                        appointsubject,
                        appointletter,
                        citizenship,
                        schoolrecommend,
                        trainingcategory,
                        trainingsubject,
                        appointlocallevel,
                        schooldistrict,
                        schoollocallevel,
                        priority1model
                  FROM tblapplication
                  WHERE remark<>'Selected' AND financialyear = ?";
                  $params = [$_SESSION['appyear']];
                  $types  = "s";
                  // Add filters only when selected
                  if ($_SESSION["chkdistrict"] == "district") {
                  $sql1 .= " AND schooldistrict = ?";
                  $params[] = $_SESSION["district"];
                  $types .= "s";
                  }

                  if ($_SESSION["chkpalika"] == "palika") {
                  $sql1 .= " AND schoollocallevel = ?";
                  $params[] = $_SESSION["munvdc"];
                  $types .= "s";
                  }

                  if ($_SESSION["chklevel"] == "level") {
                  $sql1 .= " AND appointlocallevel = ?";
                  $params[] = $_SESSION["level"];
                  $types .= "s";
                  }

                  if ($_SESSION["training"] == "training") {
                  $sql1 .= " AND trainingcategory = ?";
                  $params[] = $_SESSION["category"];
                  $types .= "s";
                  }

                  if ($_SESSION["chksubject"] == "subject") {
                  $sql1 .= " AND trainingsubject = ?";
                  $params[] = $_SESSION["subject"];
                  $types .= "s";
                  }

                  $sql1 .= " ORDER BY appid";
                  $stmt = $conn->prepare($sql1);
                  $stmt->bind_param($types, ...$params);
                  $stmt->execute();
                  $result1 = $stmt->get_result();
      }
elseif($_SESSION["listtype"]=="All")
      {
            $sql1 = "
                  SELECT 
                        tname,
                        mobileno,
                        citizenshipno,
                        schoolname,
                        appointdate,
                        appointmonth,
                        appointday,
                        appointsubject,
                        appointletter,
                        citizenship,
                        schoolrecommend,
                        trainingcategory,
                        trainingsubject,
                        appointlocallevel,
                        schooldistrict,
                        schoollocallevel,
                        priority1model
                  FROM tblapplication
                  WHERE financialyear = ?";
                  $params = [$_SESSION['appyear']];
                  $types  = "s";
                  // Add filters only when selected
                  if ($_SESSION["chkdistrict"] == "district") {
                  $sql1 .= " AND schooldistrict = ?";
                  $params[] = $_SESSION["district"];
                  $types .= "s";
                  }

                  if ($_SESSION["chkpalika"] == "palika") {
                  $sql1 .= " AND schoollocallevel = ?";
                  $params[] = $_SESSION["munvdc"];
                  $types .= "s";
                  }

                  if ($_SESSION["chklevel"] == "level") {
                  $sql1 .= " AND appointlocallevel = ?";
                  $params[] = $_SESSION["level"];
                  $types .= "s";
                  }

                  if ($_SESSION["training"] == "training") {
                  $sql1 .= " AND trainingcategory = ?";
                  $params[] = $_SESSION["category"];
                  $types .= "s";
                  }

                  if ($_SESSION["chksubject"] == "subject") {
                  $sql1 .= " AND trainingsubject = ?";
                  $params[] = $_SESSION["subject"];
                  $types .= "s";
                  }

                  $sql1 .= " ORDER BY appid";
                  $stmt = $conn->prepare($sql1);
                  $stmt->bind_param($types, ...$params);
                  $stmt->execute();
                  $result1 = $stmt->get_result();
      }
     if ($result1->num_rows > 0)
            {
            while($row = $result1->fetch_assoc())
            
            {
            $output .='
            <td align=center>' . $i .'</td>
            <td>'.$row["tname"].'</td>
            <td align=center>'.$row["mobileno"].'</td>
            <td align=center>'. $row["trainingcategory"].'</td>
            <td align=center>'. $row["trainingsubject"].'</td>
            <td align=center>'. $row["appointlocallevel"].'</td>
            <td align=center>'. $row["schooldistrict"].'</td>
            <td align=center>'. $row["schoollocallevel"].'</td>
            <td align=center>'. $row["priority1model"].'</td>
            <td>'.$row["schoolname"].'</td>
            <td>'.$row["appointdate"].'/'.$row["appointmonth"].'/'.$row["appointday"].'</td>
            <td align=center>'.$row["appointsubject"].'</td>
            </tr>';
            $i++;
            }
            }
  mysqli_close($conn);
$output .= '</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=application_details.xls");
echo $output;
?>
