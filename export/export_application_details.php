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
$displayoption="";
if($_SESSION["listtype"]=="Selected")
      {
                     
                  $displayoption="Selected";
                  $sql1 = "SELECT id, trainingname,level,subject,startdate,enddate,venue,coordinator FROM tblruntraining where financialyear='" . $_SESSION['appyear'] . "'";
                  $sql1 .= " ORDER BY id";
                  $stmt = $conn->prepare($sql1);
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
if($displayoption=="Selected")
      {
       if ($result1->num_rows > 0)
            {
            while($row = $result1->fetch_assoc())
            {
                  $id=$row["id"];
            $sqlcount = "SELECT teacherid,allowance FROM tblttraining where runid='$id' and remark<>'Cancel' ORDER BY trainingid";
            $resultcount = $conn->query($sqlcount);
            if ($resultcount->num_rows > 0)
                  {
            $output .='
                        <tr>
                        <td align=left colspan=15 bgcolor=blue> <B><font color=white>' . $row["trainingname"] ."-".$row["coordinator"]. "-" . $row["level"] . "-" . $row["subject"] . "-". $row["startdate"] . '-'. $row["enddate"] . '-' . $row["venue"] . '</font></b></td>
                        </tr>';
            $sn=1;
            $sql2 = "SELECT teacherid,allowance FROM tblttraining where runid='$id' and remark<>'Cancel' ORDER BY trainingid";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0)
                  {
                  while($row2 = $result2->fetch_assoc())
                  {
                        $teacherid=$row2["teacherid"];
                        $allowance=$row2["allowance"];
                        $sql3 = "SELECT tname, gender, mobileno, citizenshipno, schoolname,bankname,bankacno,acholdername, panno, appointdate,appointmonth,appointday,appointsubject,appointletter,citizenship,schoolrecommend,trainingcategory,trainingsubject,appointlocallevel,schooldistrict, schoollocallevel,priority1model FROM tblapplication where appid='$teacherid' and financialyear='".$_SESSION['appyear']."'";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows > 0)
                              {
                                    if($row3 = $result3->fetch_assoc())
                                          {
                                          $tname=$row3["tname"];
                                          $gender=$row3["gender"];
                                          $mobileno=$row3["mobileno"];
                                          $training=$row3["trainingcategory"];
                                          $subject=$row3["trainingsubject"];
                                          $level=$row3["appointlocallevel"];
                                          $district=$row3["schooldistrict"];
                                          $mun=$row3["schoollocallevel"];
                                          $scode=$row3["schoolname"];
                                          $bankname=$row3["bankname"];
                                          $bankac=$row3["bankacno"];
                                          $acholdername=$row3["acholdername"];
                                          $panno=$row3["panno"];
                                          $mode=$row3["priority1model"];
                                          $ayear=$row3["appointdate"];
                                          $amonth=$row3["appointmonth"];
                                          $aday=$row3["appointday"];
                                          $asubject=$row3["appointsubject"];
                                         
                               $output .='
                              <tr>
                              <td align=center>' . $sn .'</td>
                              <td>'.$tname.'</td>
                              <td align=center>'.$mobileno.'</td>
                              <td align=center>'. $training.'</td>
                              <td align=center>'. $subject.'</td>
                              <td align=center>'. $level.'</td>
                              <td align=center>'. $district.'</td>
                              <td align=center>'. $mun.'</td>
                              <td align=center>'. $mode.'</td>
                              <td>'.$scode.'</td>
                              <td>'.$ayear.'/'.$amonth.'/'.$aday.'</td>
                              <td align=center>'.$asubject.'</td>
                              </tr>';
                              $sn++;
                               }
                        }
                              

                              echo "<tr>";
                              echo "<td align=left colspan=15 >&nbsp;</td>";
                              echo "</tr>";
                  }
            }}}

      }
}
            
else
      {

     if ($result1->num_rows > 0)
            {
            while($row = $result1->fetch_assoc())
            
            {
            $output .='
            <tr>
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
      }
  mysqli_close($conn);
$output .= '</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=application_details.xls");
echo $output;
?>
