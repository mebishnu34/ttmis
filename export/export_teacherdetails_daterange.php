<?php
session_start();
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 </HEAD>
<BODY>
<?php
include("../Processing/db_connection.php");
$output = '';
if(isset($_POST["teacherdistrict"]))
{
    $output.='
              <font size="+2"><b>प्रशिक्षकको लागि प्राप्त आवेदनहरु - जील्ला :-'. $_SESSION['district'] . ' शैक्षिक सत्र:-' . $_SESSION['eduyear'] .' </b></font>
              <table width="300%" border="1">
                <tr>
                <th rowspan="2">क्र स</th>
                <th rowspan="2">शिक्षकको नाम</th>
                <th rowspan="2">लिङ्ग</th>
                <th rowspan="2">जन्म मिति</th>
                <th rowspan="2">शैक्षिक योग्यता</th>
                <th rowspan="2">तह श्रेणी</th>
                <th rowspan="2">अध्यापन गर्ने विषय</th>
                <th rowspan="2">नागरिकता न</th>
                <th colspan="4">स्थायी ठेगाना</th>
                <th rowspan="2">शिक्षकको वावुको नाम</th>
                <th rowspan="2">शिक्षक कार्यरत रहेको विद्यालयको नाम</th>
                <th rowspan="2">जिल्ला</th>
                <th rowspan="2">स्थानीय तह</th>
                <th rowspan="2">वडा</th>
                <th rowspan="2"> हालको पदको नियुक्ती मिति</th>
                <th colspan="2">तालिम सञ्चालन भएको मिति</th>
                <th rowspan="2">परियोजना प्रस्तुत गरेको मिति</th>
                <th rowspan="2">तालिम लिएको तह</th>
                <th rowspan="2">तालिमको नम</th>
                <th rowspan="2"> विषय</th>
                <th rowspan="2">माध्यम</th>
                <th rowspan="2">शिक्षक मोवाइल न</th>
                <th rowspan="2">तालिम सयोजकको नाम</th>
                </tr>
                <tr>
                <th>प्रदेश</th>
                <th>जिल्ला</th>
                <th>स्थानीय तह</th>
                <th>वडा</th>
                <th>देखि</th>
                <th>सम्म</th>
                </tr>';
             $n=1;
   $schooldistrict="";
            $schoolmunvdc="";
            $schoolwardno="";
            $traininglevel="";
            $trainingname="";
            $trainingsubject="";
            $trainingmedium="";
            $trainingcoordinatior="";
            $i = 1;
            $sql = "SELECT t.tname, t.gender,t.citizenship, t.dob,t.fathername,t.district, t.munvdc, t.wardno,t.tcontact, t.workinglevel, t.scode,t.schoolname,t.province,t.teachinglevel, t.qualification, t.teachingsubject,tt.sdate,tt.edate,tt.trainingid
            FROM tblttraining tt
            JOIN tblteacher t ON tt.teacherid = t.teachercode
            WHERE tt.sdate BETWEEN '".$_SESSION['syear']."-".$_SESSION['smonth']."-".$_SESSION['sday']."' 
                  AND '".$_SESSION['eyear']."-".$_SESSION['emonth']."-".$_SESSION['eday']."' 
            ORDER BY t.tname";
            $stmt = $conn->prepare($sql);
            //$stmt->bind_param("s", $district);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) 
                {      
        $output .='
                <tr>
                <td align=center>' . $i . '</td>
                <td>' . $row["tname"] . '</td>
                <td align=center>' . $row["gender"] . '</td>
                <td align=center>'.$row["dob"].'</td>
                <td align=center>'.$row["qualification"].'</td>
                <td align=center>'.$row["teachinglevel"].'</td>
                <td align=center>'.$row["teachingsubject"].'</td>
                <td align=center>'.$row["citizenship"].'</td>
                <td align=center>'.$row["province"].'</td>
                <td align=center>'.$row["district"].'</td>
                <td align=center>'.$row["munvdc"].'</td>
                <td align=center>'.$row["wardno"].'</td>
                <td align=center>'.$row["fathername"].'</td>
                <td align=center>'.$row["schoolname"].'</td>';
                $sql2 = "SELECT district,munvdc,wardno FROM tblschool where schoolcode='".$row["scode"]."'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0)
            {
                if($row2 = $result2->fetch_assoc()) 
                    {
                    $schooldistrict=$row2["district"];
                        $schoolmunvdc=$row2["munvdc"];
                        $schoolwardno=$row2["wardno"];
                }
                }
        $output .='
                <td align=center>'.$schooldistrict.'</td>
                <td align=center>'.$schoolmunvdc.'</td>
                <td align=center>'.$schoolwardno.'</td>
                <td align=center></td>
                <td align=center>'.$row["sdate"].'</td>
                <td align=center>'.$row["edate"].'</td>';
                $sql3 = "SELECT level,trainingname,subject,coordinator FROM tblruntraining where id='".$row["trainingid"]."'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0)
            {
                if($row3 = $result3->fetch_assoc()) 
                    {
                    $traininglevel=$row3["level"];
                        $trainingname=$row3["trainingname"];
                        $trainingsubject=$row3["subject"];
                        $trainingcoordinatior=$row3["coordinator"];
                }
                }
            $output .='
                <td align=center></td>
                <td align=center>'.$traininglevel.'</td>
                <td align=center>'.$trainingname.'</td>
                <td align=center>'.$trainingsubject.'</td>
                <td align=center>'.$trainingmedium.'</td>
                <td align=center>'.$row["tcontact"].'</td>
                <td align=center>'.$trainingcoordinatior.'</td>
                </tr>';
                $i++;
                }
    $output .='</table>';
   header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=teacher_details_daterange.xls");
    echo $output;
 }
?>
</BODY>
</HTML>
