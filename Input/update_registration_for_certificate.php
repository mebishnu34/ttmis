<?php
session_start();
   include("../Processing/db_connection.php");
$sid = "SELECT max(ID) FROM tblschool";
   $reid = $conn->query($sid);
         if ($reid->num_rows > 0)
         {
    // output data of each row
	   if($row1 = $reid->fetch_assoc())
               {
               $scode=$row1['max(ID)']+1;
                 }
   		}
?>
<!DOCTYPE html>
<html>
<head>
<title>TTMIS</title>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
	<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
  <script src="../script/nepdistrict.js"></script>
<link rel="stylesheet" href="../CSS/div_column.css">
<link rel="stylesheet" href="../CSS/form.css">

</head>
<body>
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" width="800" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF">&nbsp;</font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
if(isset($_GET['tid']))
{
	$tid=$_GET['tid'];
   $sql1 = "SELECT * FROM tblteacher where teacherid='$tid'";
   $result1 = $conn->query($sql1);

   if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
         $tname=$row['tname'];
         $gender=$row['gender'];
		 $cast=$row['cast'];
		 $mothertong=$row['mothertong'];
		 $citizen=$row['citizenship'];
		 $rollno=$row['sheetroll'];
		 $stream=$row['stream'];
		 $fathername=$row['fathername'];
         $dob=$row['dob'];
         $a=$row['address'];
         $email=$row['email'];
         $province=$row['province'];
         $district=$row['district'];
         $munvdc=$row['munvdc'];
         $ward=$row['wardno'];
         $tc=$row['tcontact'];
         $adate=$row['appointdate'];
         $atype=$row['appointtype'];
         $level=$row['workinglevel'];
         $scode=$row['scode'];
         $school=$row['schoolname'];
         $tlevel=$row['teachinglevel'];
         $qualification=$row['qualification'];
         $faculty=$row['faculty'];
         $msubject=$row['majorsubject'];
         $tsubject=$row['teachingsubject'];
		$apsubject=$row['subject'];
         }
      }
?>

<!-- Including our scripting file. -->
<div style="background-color: #FFFFFF; align-items: center; width:95%; text-align:center; display: flex; justif-content: center;">
<form method="Post" Action="../Object/update_teacher_for_certificate.php" enctype="multipart/form-data">
<div class="">
<h3>क) शिक्षकसँग सम्वन्धित विवरण</h3>
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षक काेड <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" name="txtid" value=<?php echo $tid;?> readonly><input type="hidden" name="txtschoolcode" value=<?php echo $scode;?> readonly>
    </div>
    
</div>
<br>

<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" value="<?php echo $tname;?>" name="txtteacherName" required>
    </div>
    <div class="label_column">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" value="<?php echo $fathername;?>" name="txtfatherName" required>
    </div>
</div>
<br>
<p align="left"><h3>स्थाइ ठेगाना :</h></p>
<table width="90%" border="0" style="background-color:lightblue;">
  <tr>
    <td><label class="label_text">प्रदेश <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbprovince" id="cmbprovince" required>
      <option value="<?php echo $province;?>"><?php echo $province;?></option>
    </select></td>
    <td><label class="label_text">जिल्ला <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbdistrictnp" id="cmbdistrictnp" required>
      <option value="<?php echo $district;?>"><?php echo $district;?></option>
    </select></td>
</tr>
<tr>
    <td><label class="label_text">स्थानीय तह <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbmunnp" id="cmbmunnp" required>
            <option value="<?php echo $munvdc;?>"><?php echo $munvdc;?></option>
						</select></td>
    <td><label class="label_text">वडा <span class="star">*</span></label></td>
    <td><input class="custom-input_number" value="<?php echo $ward;?>" name="txtward" required></td>
</tr>
</table>

  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं <span class="star">*</span></label>
      </div>
      <div>
          <input class="custom-input" value="<?php echo $tc;?>" name="txtmobileNo" required>
      </div>
      <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">इमेल ठेगाना <span class="star">*</span></label>
      </div>
      <div>
      <input class="custom-input" size="50" value="<?php echo $email;?>" name="txtemail" required>
      </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नागरिकता नं <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" value="<?php echo $citizen;?>" name="txtcitizenshipNo" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <label class="label_text">नियुक्ति मिति <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" value="<?php echo $adate;?>" name="txtappointdate" required>
    </div>
  </div>
<br>
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">नियुक्ति भएको तह <span class="star">*</span></label>
    </div>
  <div>
  <select name="cmbappointlevel" class="custom-combo" required>
    <option value="<?php echo $level;?>"><?php echo $level;?></option>
    <option value="ECD">प्रारम्भिक बालविकास तथा शिक्षा</option>
    <option value="Primary">प्राथमिक तह</option>
    <option value="LowerSecondary">निम्न माध्यमिक तह</option>
    <option value="Secondary">माध्यमिक तह</option>
    <option value="HigherSecondary">साविक उमावि</option>
  </select>
  </div>
  <div class="label_column">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <label class="label_text">नियुक्ति भएको विषय <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" value="<?php echo $apsubject;?>" name="cmbappointsubject" required>
  </div>
</div>
 <h3 class="text-xl font-bold text-slate-800">ख) हाल कार्यरत रहेकाे विद्यालयसगँ सम्वन्धित विवरण</h3>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">विद्यालयको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" value="<?php echo $school;?>" name="txtschoolname" required>
  </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">प्रदेश <span class="star">*</span></label>
    </div>
    <div>
    <select name="cmbschoolprovince" class="custom-combo" required>
    <option value="बागमती">बागमती</option>
    </select>
  </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">जिल्ला <span class="star">*</span></label>
  </div>
  <div>
    <?php //include("school_district_list_1.htm");?>
    <select class="custom-combo" name="cmbdistrictbagamati" id="cmbdistrictbagamati" required>
  <option value="<?php echo $district;?>"><?php echo $district;?></option>                       
  </select>
    </div>

  <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">स्थानीय तह <span class="star">*</span></label>
  </div>
  <div>
    <!--<div id="txtHintschool">Municipality/Rural</div>-->
    <div>
    <select class="custom-combo" name="cmbmunbagamati" id="cmbmunbagamati" required>
      <option value="<?php echo $munvdc;?>"><?php echo $munvdc;?></option>
                         </select>
</div>
  </div>
  <div class="label_column">
    <label class="label_text">वडा <span class="star">*</span></label>
  </div>
    <div class="label_column">
      <input class="custom-input_number" value="<?php echo $ward;?>" name="txtschoolward" required>
    </div>
</div>

<br>
<div>
           <input type="submit" value="सेभ गर्नुहाेस" name="btnsave">
</div>
</form>
</div>
<?php
}
?>
</body>
</html>      



