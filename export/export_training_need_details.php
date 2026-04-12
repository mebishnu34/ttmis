<?php
include("../Processing/db_connection.php");
$ecd="";
$teacher="";
$principal="";
$output='';
$output .='
 <font size="+2"><b>Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम</b></font>
 <table width="500%" border="1" bgcolor="#FFFFFF" cellpadding="5" cellspacing="0">
 <tr>
<th>क्र स</th>
<th>नाम</th>
<th>पद</th>
<th>नियुत्ति भएकाे तह</th>
<th>विषय</th>
<th>अनुभव</th>
<th>सम्पर्क नम्बर</th>
<th>इमेल</th>
<th>विद्यालयकाे नाम</th>
<th>जिल्ला</th>
<th>स्थानीय तह</th>
<th>वडा नम्बर</th>
<th>विद्यालय सम्पर्क</th>
<th>बिद्यालय इमेल</th>
<th>छनाेट भएकाे वर्ग</th>
<th>ECD तालिमहरु</th>
<th>थप ECD तालिमहरु</th>
<th>शिक्षक तालिमहरु</th>
<th>थप  शिक्षक तालिमहरु</th>
<th>प्रधानाध्यापक तालिमहरु</th>
<th>थप प्रधानाध्यापक तालिमहरु</th>
<th>तालिम माेडालिटी(face-to-face) प्राथमिकता</th>
<th>तालिम माेडालिटी(online) प्राथमिकता</th>
<th>अवधि</th>
<th>थप सुझावहरु</th>
<th>पेश गरिएकाे मिति</th>
</tr>';
$i = 1;
$sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed ORDER BY regdate DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
$output .='
    <tr>
    <td align=center>' . $i . '</td>
    <td>' . $row["needname"] . '</td>
    <td>' . $row["needpost"] . '</td>
    <td>' . $row["appointlevel"] . '</td>
    <td>' . $row["needsubject"] . '</td>
    <td>' . $row["experenceyear"] . '</td>
    <td>' . $row["mobileno"] . '</td>
    <td>' . $row["email"] . '</td>
    <td>' . $row["schoolname"] . '</td>
    <td>' . $row["district"] . '</td>
    <td>' . $row["munvdc"] . '</td>
    <td>' . $row["wardno"] . '</td>
    <td>' . $row["trainingmode1"] . '</td>
    <td>' . $row["trainingmode2"] . '</td>
    <td>' . $row["trainingduration"] . '</td>';
    $sql2 = "SELECT topicid,selectionid,optindexno,submitdate,ondate,remark FROM tbltopicselectiondetails where needid='".$row["needid"]."' and category='ECD शिक्षकका लागि'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0)
        {
        while($row2 = $result2->fetch_assoc()) 
		    {
		        $selectionid=$row2["selectionid"];
                $sql3 = "SELECT selectoption FROM tbltopicselection where selectionid='".$selectionid."'";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0)
                    {
                    if($row3 = $result3->fetch_assoc()) 
		                {
                        $ecd .= $row3["selectoption"];
                        $ecd .= ", ";   
                        }
                    }
	        }
	    }
    $output .='
    <td align=center>'.$ecd.'</td>
    <td align=center></td>';
    $sql4 = "SELECT topicid,selectionid,optindexno,submitdate,ondate,remark FROM tbltopicselectiondetails where needid='".$row["needid"]."' and category='विद्यालयतहका शिक्षकका लागि'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0)
        {
        while($row4 = $result4->fetch_assoc()) 
		    {
		        $selectionid=$row4["selectionid"];
                $sql5 = "SELECT selectoption FROM tbltopicselection where selectionid='".$selectionid."'";
                $result5 = $conn->query($sql5);
                if ($result5->num_rows > 0)
                    {
                if($row5 = $result5->fetch_assoc()) 
		            {
                        $teacher .= $row5["selectoption"];
                        $teacher .= ", ";   
                    }
            }
	}
	}
    $output .='
    <td align=center>'.$teacher.'</td>
    <td align=center></td>';
    $sql6 = "SELECT topicid,selectionid,optindexno,submitdate,ondate,remark FROM tbltopicselectiondetails where needid='".$row["needid"]."' and category='प्रअ तथा कर्मचारीहरुका लागि'";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0)
        {
        while($row6 = $result6->fetch_assoc()) 
		    {
		    $selectionid=$row6["selectionid"];
            $sql7 = "SELECT selectoption FROM tbltopicselection where selectionid='".$selectionid."'";
            $result7 = $conn->query($sql7);
        if($result7->num_rows > 0)
            {
                if($row7 = $result7->fetch_assoc()) 
		            {
                        $principal .= $row5["selectoption"];
                        $principal .= ", ";   
                    }
            }
	}
	}
    $output .='
    <td align=center>'.$principal.'</td>
    <td align=center></td>
    <td>' . $row["trainingmode1"] . '</td>
    <td>' . $row["trainingmode2"] . '</td>
    <td>' . $row["trainingduration"] . '</td>
    <td>' . $row["suggestion"] . '</td>
    <td>' . $row["regdate"] . '</td>
    </tr>';
    $i++;
}
mysqli_close($conn);
$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export_training_need_details.xls");
echo $output;
?>
