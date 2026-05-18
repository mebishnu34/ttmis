<?php
   include("../Processing/db_connection.php");
   $sqlid = "SELECT max(teacherid) FROM tblteacher";
   $resultid = $conn->query($sqlid);
         if ($resultid->num_rows > 0)
         {
    // output data of each row
	   if($row = $resultid->fetch_assoc())
               {
               $tcode=$row['max(teacherid)']+1;
                 }
   		}
    
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

<!-- Including our scripting file. -->
 <script src="../script/nepdistrict.js"></script>
<link rel="stylesheet" href="../CSS/main_table.css">
<link rel="stylesheet" href="../CSS/table_css.css">
<link rel="stylesheet" href="../CSS/div_column.css">
<link rel="stylesheet" href="../CSS/form.css">
<div style="background-color: #FFFFFF; align-items: left;">
<form method="Post" Action="../Object/save_teacher_for_certificate.php" enctype="multipart/form-data">
<div class="">
<h3>क) शिक्षकसँग सम्वन्धित विवरण</h3>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षक काेड <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" name="txtcode" value=<?php echo $tcode;?> readonly><input type="hidden" name="txtschoolcode" value=<?php echo $scode;?> readonly>
    </div>
    
</div>
<br>

<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="पूरा नाम लेख्नुहोस्" name="txtteacherName" required>
    </div>
    <div class="label_column">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="बाबुको नाम लेख्नुहोस्" name="txtfatherName" required>
    </div>
</div>
<br>
<p align="left"><h3>स्थाइ ठेगाना :</h></p>
<table width="90%" border="0" style="background-color:lightblue;">
  <tr>
    <td><label class="label_text">प्रदेश <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbprovince" id="cmbprovince" required></select></td>
    <td><label class="label_text">जिल्ला <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbdistrictnp" id="cmbdistrictnp" required>
    </select></td>
</tr>
<tr>
    <td><label class="label_text">स्थानीय तह <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbmunnp" id="cmbmunnp" required>
						</select></td>
    <td><label class="label_text">वडा <span class="star">*</span></label></td>
    <td><input class="custom-input_number" placeholder="वडा" name="txtward" required></td>
</tr>
</table>

  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं (In Eng)<span class="star">*</span></label>
      </div>
      <div>
          <input class="custom-input" placeholder="मोबाइल नं (१० अंक)" name="txtmobileNo" required>
      </div>
      <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">इमेल ठेगाना <span class="star">*</span></label>
      </div>
      <div>
      <input class="custom-input" size="50" placeholder="इमेल ठेगाना" name="txtemail" required>
      </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नागरिकता नं <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" placeholder="नागरिकता नं" name="txtcitizenshipNo" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <label class="label_text">नियुक्ति मिति <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" placeholder="नियुक्ति मिति" name="txtappointdate" required>
    </div>
  </div>
<br>
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">नियुक्ति भएको तह <span class="star">*</span></label>
    </div>
  <div>
  <select name="cmbappointlevel" class="custom-combo" required>
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
    <input class="custom-input" placeholder="विषय लेख्नुहोस्" name="cmbappointsubject" required>
  </div>
</div>
 <h3 class="text-xl font-bold text-slate-800">ख) हाल कार्यरत रहेकाे विद्यालयसगँ सम्वन्धित विवरण</h3>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">विद्यालयको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" placeholder="विद्यालयको पूरा नाम" name="txtschoolname" required>
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
                         </select>
    </div>

  <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">स्थानीय तह <span class="star">*</span></label>
  </div>
  <div>
    <!--<div id="txtHintschool">Municipality/Rural</div>-->
    <div>
    <select class="custom-combo" name="cmbmunbagamati" id="cmbmunbagamati" required>
                         </select>
</div>
  </div>
  <div class="label_column">
    <label class="label_text">वडा <span class="star">*</span></label>
  </div>
    <div class="label_column">
      <input class="custom-input_number" placeholder="वडा" name="txtschoolward" required>
    </div>
</div>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिएकाे वर्ष <span class="star">*</span></label>
   <select name="cmbyear" onchange="loadData(this.value)">
      <?php
        include("../educational_year.html");
      ?>  
    </select>
  </div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
<label class="label_text">तालिमकाे नाम <span class="star">*</span></label>
</div>
<div id="result"></div>
</div>
<div class="content">
  </div>
</div>
<script>
function loadData(value) {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../Input/training_year.php?id=" + value, true);

    xhr.onload = function () {
        document.getElementById("result").innerHTML = this.responseText;
    }

    xhr.send();
}
</script><br>
<div>
           <input type="submit" value="सेभ गर्नुहाेस" name="btnsave">
</div>
</form>
</div>
      



