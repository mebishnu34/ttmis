<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
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
<?php
include("../Processing/db_connection.php");
include("../print_function.php");
?>
<form action="#" method="POST">
<table width="100%" bgcolor="lightblue" border="1">
      
      <tr>
            <th><?php include("../district_list.htm");?></th>
            <th id="txtHint">
            Municipality
            </th>
            <th><select name="cmblevel" class="custom-combo" id="cmblevel" onchange="checkBoxAuto()">
                 <option value="">तह छान्नुहोस्</option>
            <option value="प्रारम्भिक वालविकास र शिक्षा">प्रारम्भिक वालविकास र शिक्षा</option>
            <option value="आधारभूत तह कक्षा १-५">आधारभूत तह कक्षा १-५</option>
            <option value="आधारभूत तह कक्षा ६-८">आधारभूत तह कक्षा ६-८</option>
            <option value="माध्यमिक तह कक्षा ९-१०">माध्यमिक तह कक्षा ९-१०</option>
            <option value="माध्यमिक तह कक्षा ११-१२">माध्यमिक तह कक्षा ११-१२</option>
            <option value="५ औं तह">५ औं तह</option>
            <option value="६ औं तह">६ औं तह</option>
            <option value="७ औं तह">७ औं तह</option>
            <option value="८ औं तह">८ औं तह</option>
  </select></th>
            <script>
                  function checkBoxAuto()
                  {
                        const select = document.getElementById("cmblevel");
                        const checkbox = document.getElementById("chklevel");
                        if(select.value !=="")
                        {
                              checkbox.checked = true;
                        }
                        else
                        {
                              checkbox.checked = false;
                        }
                  }
            </script>
            <th><?php include("training_category.html");?></th>
            <script>
                  function checktraining()
                  {
                        const select = document.getElementById("trainingcategory");
                        const checkbox = document.getElementById("chkcategory");
                        if(select.value !=="")
                        {
                              checkbox.checked = true;
                        }
                        else
                        {
                              checkbox.checked = false;
                        }
                  }
            </script>
            <th>
		<input type="Button" name="btnprint" value="Print" onClick="javascript:CallPrint('pdata');">
            </th>
</tr>
<tr>
           <th><input type="Checkbox" name="chkdistrict" value="district"> District</div>
            <th><input type="Checkbox" name="chkpalika" value="palika"> Palika</div>
            <th><input type="Checkbox"  id="chklevel" name="chklevel" value="level"> Level</div>
            <th><input type="Checkbox" id="chkcategory" name="chksubject" value="subject"> Subject</div>
            <th>
		<input type="Submit" value="Display" name="btndisplay">
</th>
</tr>
</table>
</form>
<?php
if(isset($_POST["btndisplay"]))
      {
      $district="";$palika="";$level="";$subject="";$districtcheck="";$palikacheck="";$levelcheck="";$subjectcheck="";
      if(isset($_POST["cmbdistrict"]))
            {
      $district=$_POST["cmbdistrict"];
            }
      if(isset($_POST["cmbmv"]))
            {
      $palika=$_POST["cmbmv"];
            }
      if(isset($_POST["cmblevel"]))
            {
      $level=$_POST["cmblevel"];
            }
      if(isset($_POST["cmbtrainingcategory"]))
            {
      $subject=$_POST["cmbtrainingcategory"];
            }
if(isset($_POST["chkdistrict"]))
      {
      $districtcheck=$_POST["chkdistrict"];
      }
      if(isset($_POST["chkpalika"]))
            {
      $palikacheck=$_POST["chkpalika"];
            }
      if(isset($_POST["chklevel"]))
            {
      $levelcheck=$_POST["chklevel"];
            }
      if(isset($_POST["chksubject"]))
            {
      $subjectcheck=$_POST["chksubject"];
            }

$ecd="";
$teacher="";
$principal="";
?>
<form method="post" action="../export/export_training_need_details.php">
<div id="pdata">
      <font size="+2"><b>Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम</b></font>
 <table width="800%" border="1" bgcolor="#FFFFFF" cellpadding="5" cellspacing="0">
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
<th>तालिमहरु</th>
<th>थप तालिमहरु</th>
<th>तालिम माेडालिटी(face-to-face) प्राथमिकता</th>
<th>तालिम माेडालिटी(online) प्राथमिकता</th>
<th>अवधि</th>
<th>थप सुझावहरु</th>
<th>पेश गरिएकाे मिति</th>
</tr>
<?php
$i=1;
if($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level" and $subjectcheck="subject")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' and district='".$district."' and munvdc='".$palika."' and needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($districtcheck=="district")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' and district='".$district."' and munvdc='".$palika."' and needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($districtcheck=="district" and $palikacheck=="palika")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' and district='".$district."' and munvdc='".$palika."' and needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($districtcheck=="district" and $palikacheck=="palika" and $levelcheck=="level")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' and district='".$district."' and munvdc='".$palika."' and needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($levelcheck=="level")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' ORDER BY regdate DESC";

        }
elseif($subjectcheck=="subject")
        {
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($levelcheck=="level" and $subjectcheck="subject")
        {
            
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where appointlevel='".$level."' and  needsubject='".$subject."' ORDER BY regdate DESC";

        }
elseif($districtcheck=="district" and $levelcheck=="level" and $subjectcheck="subject")
        {
            
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed where district='".$district."' and needsubject='".$subject."' ORDER BY regdate DESC";

        }

else
        {
            
            $sql = "SELECT needid, needname,needpost,appointlevel,needsubject,experenceyear,mobileno,email,schoolname,district,munvdc,wardno,trainingmode1,trainingmode2,trainingduration,expectedoutcome,suggestion,regdate,remark FROM tbltrainingneed ORDER BY regdate DESC";
           
        }
      
$i = 1;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td align=center>" . $i . "</td>";
    echo "<td>" . $row["needname"] . "</td>";
    echo "<td>" . $row["needpost"] . "</td>";
    echo "<td>" . $row["appointlevel"] . "</td>";
    echo "<td>" . $row["needsubject"] . "</td>";
    echo "<td>" . $row["experenceyear"] . "</td>";
    echo "<td>" . $row["mobileno"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["schoolname"] . "</td>";
    echo "<td>" . $row["district"] . "</td>";
    echo "<td>" . $row["munvdc"] . "</td>";
    echo "<td>" . $row["wardno"] . "</td>";
    echo "<td>" . $row["trainingmode1"] . "</td>";
    echo "<td>" . $row["trainingmode2"] . "</td>";
    echo "<td>" . $row["trainingduration"] . "</td>";
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
    $sql6 = "SELECT topicid,selectionid,optindexno,submitdate,ondate,remark FROM tbltopicselectiondetails where needid='".$row["needid"]."' and category='प्रअ तथा कर्मचारीहरुका लागि'";
$result6 = $conn->query($sql6);
if ($result6->num_rows > 0)
   {
    while($row6 = $result6->fetch_assoc()) 
		{
		$selectionid=$row6["selectionid"];
         $sql7 = "SELECT selectoption FROM tbltopicselection where selectionid='".$selectionid."'";
        $result7 = $conn->query($sql7);
        if ($result7->num_rows > 0)
            {
                if($row7 = $result7->fetch_assoc()) 
		            {
                        $principal .= $row5["selectoption"];
                        $principal .= ", ";   
                    }
            }
	}
	}

echo "<td align=center>".$ecd.$teacher.$principal."</td>";
echo "<td align=center></td>";
   echo "<td>" . $row["trainingmode1"] . "</td>";
    echo "<td>" . $row["trainingmode2"] . "</td>";
    echo "<td>" . $row["trainingduration"] . "</td>";
    echo "<td>" . $row["suggestion"] . "</td>";
    echo "<td>" . $row["regdate"] . "</td>";
        echo "</tr>";
    $i++;
}
         mysqli_close($conn);

?>
</table>
</div>
<div><input type="submit" value="Export In Excel" name="teacherdistrict"></div>
</form>
<?php
      }
    ?>
</body>
</html>
