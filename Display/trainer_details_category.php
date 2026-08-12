<?php
session_start();
include("../Processing/db_connection.php");
include("../print_function.php");
$category=$_POST['cmbtrainingcategory'];
$eduyear=$_POST['cmbyear'];
$_SESSION['category']=$category;
$_SESSION['eduyear']=$eduyear;
?>
<?php
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
   <link rel="stylesheet" href="../CSS/main_table.css">
   <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
</table>

<div align="right">
<form>
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
        </div>
</form>
<form method="post" action="../export/export_teacherdetails_category.php">
<div id="pdata">
      <font size="+2"><b>प्रशिक्षकको लागि प्राप्त आवेदनहरु - तालिमको नाम :- <?php echo $category;?>, शैक्षिक सत्र:- <?php echo $eduyear;?></b></font>
 <table width="300%" class="table_design">
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
</tr>

<?php
$schooldistrict="";
$schoolmunvdc="";
$schoolwardno="";
$traininglevel="";
$trainingname="";
$trainingsubject="";
$trainingmedium="";
$trainingcoordinatior="";
$oldcategory="";
$i = 1;
if($category=="एक महिने प्रमाणीकरण तालिम (TPD)")
      {
            $oldcategory="शिक्षक पेशागत विकास";
      }
if($category=="सेवा प्रवेश तालिम")
      {
            $oldcategory="सेवाकालिन";
      }
if($category=="कष्टमाइज (क्षमता विकास) ५ दिने")
      {
            $oldcategory="पुनर्ताजगी";
      }
if($category=="प्रधानाध्यापक नेतृत्व सम्बन्धि कस्तमाइज तालिम")
      {
            $oldcategory="नेतृत्व तथा व्यवस्थापन";
      }

$sql4 = "SELECT trainingid FROM tblruntraining where trainingname='".$category."' OR trainingname='".$oldcategory."'";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0)
   {
    while($row4 = $result4->fetch_assoc()) 
		{
		$trainingid=$row4["trainingid"];
            
$sql = "SELECT t.tname, t.gender,t.citizenship, t.dob,t.fathername,t.district, t.munvdc, t.wardno,t.tcontact, t.workinglevel, t.scode,t.schoolname,t.province,t.teachinglevel, t.qualification, t.teachingsubject,tt.sdate,tt.edate,tt.trainingid
FROM tblttraining tt
JOIN tblteacher t ON tt.teacherid = t.teachercode
WHERE tt.trainingid = '".$trainingid."' and SUBSTRING(tt.sdate,1,4)='".$eduyear."'
ORDER BY t.tname
";

$stmt = $conn->prepare($sql);
//$stmt->bind_param("s", $district);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td align=center>" . $i . "</td>";
    echo "<td>" . $row["tname"] . "</td>";
    echo "<td align=center>" . $row["gender"] . "</td>";
    echo "<td align=center>".$row["dob"]."</td>";
    echo "<td align=center>".$row["qualification"]."</td>";
    echo "<td align=center>".$row["teachinglevel"]."</td>";
    echo "<td align=center>".$row["teachingsubject"]."</td>";
    echo "<td align=center>".$row["citizenship"]."</td>";
    echo "<td align=center>".$row["province"]."</td>";
    echo "<td align=center>".$row["district"]."</td>";
    echo "<td align=center>".$row["munvdc"]."</td>";
    echo "<td align=center>".$row["wardno"]."</td>";
    echo "<td align=center>".$row["fathername"]."</td>";
    echo "<td align=center>".$row["schoolname"]."</td>";
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
            echo "<td align=center>".$schooldistrict."</td>";
            echo "<td align=center>".$schoolmunvdc."</td>";
            echo "<td align=center>".$schoolwardno."</td>";
            echo "<td align=center></td>";
            echo "<td align=center>".$row["sdate"]."</td>";
            echo "<td align=center>".$row["edate"]."</td>";
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
            echo "<td align=center></td>";
            echo "<td align=center>".$traininglevel."</td>";
            echo "<td align=center>".$trainingname."</td>";
            echo "<td align=center>".$trainingsubject."</td>";
            echo "<td align=center>".$trainingmedium."</td>";
            echo "<td align=center>".$row["tcontact"]."</td>";
            echo "<td align=center>".$trainingcoordinatior."</td>";
            echo "</tr>";
            $i++;
            }
      }
   }

         mysqli_close($conn);
?>
</table>
</div>
<div><input type="submit" value="Export In Excel" name="teacherdistrict"></div>
</body>
</html>
