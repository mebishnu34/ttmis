<script src="script/nepdistrict_1.js"></script>
<form method="Post" Action="Object/save_ai_training.php" enctype="multipart/form-data">
<div>
     <h2 class="">अनलाइनमा आधारित AI Based Digital Learning Training का लागि आवेदन फाराम-<?php echo $_SESSION['financial_year'];?></h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">नाम<span class="star">*</span></label>
    </div>

    <div>
        <input type="text" class="custom-input" placeholder="नाम लेख्नुहोस्" size="40" name="txtname" required>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="label_column">
        <label class="label_text"> पद <span class="star">*</span></label>
    </div>
    <div>
        <select name="cmbpost">
                  <option value="">पद छान्नुहाेस </option>
                  <option value="शिक्षक">शिक्षक</option>
                  <option value="प्रधानाध्यापक">प्रधानाध्यापक</option>
                  <option value="बालशिक्षक">बालशिक्षक</option>
                  <option value="कर्मचारी">कर्मचारी</option>
        </select>
    </div>
</div>
<br>
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">नियुक्ति भएको तह: <span class="star">*</span></label>
      </div>
      <div>
          <select name="cmblevel">
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
          </select>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <div class="label_column">
        <label class="label_text">तपाइले पढाउने मुख्य विषय:<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="तपाईंको विषय" name="txtsubject" required>
    </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">अनुभव (वर्ष): <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="वर्षमा" name="txtexperence" required>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="label_column">
        <label class="label_text">माेबाइल नम्बर <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="माेबाइल नम्बर लेख्नुहोस्" name="txtmobileno" required>
    </div>
</div>
<br>
<div class="custom-grid">
    
    <div class="label_column">
        <label class="label_text"> इमेल<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" size="40" class="custom-input" placeholder="इमाेल ठेगाना लेख्नुहोस्" name="txtemail" required>
    </div>
</div>
<br>
<div align="left">
       <label class="label_text">विद्यालय/ सस्थाको विवरण</label>
      
</div>
<br>
<div class="custom-grid">
    <div class="label_column"><label class="label_text">विद्यालयको नाम: </label></div>
    <div>
        <input placeholder="कार्यालय वा विद्यालयको नाम लेख्नुहोस्" type="text" value="" name="txtschool" size="60">
    </div>
</div>
<br>
<div class="custom-grid">
        <div class="label_column"><label class="label_text">जिल्ला: </label></div>
        <div>
            <?php //include("school_district_list_1.htm");?>
             <select class="custom-combo" name="cmbdistrictbagamati_1" id="cmbdistrictbagamati_1" required>
                <option value="">--छान्नुहोस्--</option>
                         </select>
        </div>
     <div class="label_column"> <label class="label_text">स्थानीय तह: </label></div>
        <div>
            <!--<div id="txtHintschool">Municipality/Rural</div>-->
            <select class="custom-combo" name="cmbmunbagamati_1" id="cmbmunbagamati_1" required>
                <option value="">--छान्नुहोस्--</option>
                         </select>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="label_column"><label class="label_text">वडा न: </label></div>
        <div>
            <input type="text" value="" name="txtwardno" size="10">
        </div>
</div>

<br>
<input type="Submit" value="आवेदन पेश गर्नुहाेस्" name="btnsave">
</form>

      