<script src="script/nepdistrict_1.js"></script>
<form method="Post" Action="Object/save_customize_training_needs.php" enctype="multipart/form-data">
<div>
     <h2 class="">Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम-<?php echo $_SESSION['financial_year'];?></h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
<div align="left">
   <label class="label_text"> क परिचय खण्ड</label>
</div>

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
        <label class="label_text">विषय:<span class="star">*</span></label>
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
                         </select>
        </div>
     <div class="label_column"> <label class="label_text">स्थानीय तह: </label></div>
        <div>
            <!--<div id="txtHintschool">Municipality/Rural</div>-->
            <select class="custom-combo" name="cmbmunbagamati_1" id="cmbmunbagamati_1" required>
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
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">प्रत्यक्ष (Face-to-Face)<span class="star">*</span></label>
    </div>
  <div>
    <select name="cmbmode1" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
  <option value="">प्राथमिकता छान्नुहोस्</option>
  <option value="पहिलो प्राथमिकता">1 (पहिलो प्राथमिकता)</option>
  <option value="दोस्रो प्राथमिकता">2 (दोस्रो प्राथमिकता)</option>
  </select>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="label_column">
        <label class="label_text">अनलाइन (Online)<span class="star">*</span></label>
    </div>
   <div>
        <select name="cmbmode2" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
  <option value="">प्राथमिकता छान्नुहोस्</option>
  <option value="पहिलो प्राथमिकता">1 (पहिलो प्राथमिकता)</option>
  <option value="दोस्रो प्राथमिकता">2 (दोस्रो प्राथमिकता)</option>
  </select>
    </div>
    
</div>
<br>
<div class="custom-grid">
     <div class="label_column"><label class="label_text">तालिम अवधि (Preferred Duration) <span class="star">*</span></label></div>

      <div>
        <input type="Radio" name="optduration" value="१–३ दिन"> १–३ दिन &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="optduration" value="४–७ दिन"> ४–७ दिन&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="optduration" value="१ हप्ता भन्दा बढी"> १ हप्ता भन्दा बढी
    </div>
</div>
<br>
<div align="left">
    <label class="label_text">अपेक्षित उपलब्धि (Expected Outcomes): <span class="star">*</span></label>
</div>
<br>
<div class="custom-grid">
        <div>
        <textarea cols="100" rows="5" name="txtexpected" placeholder="तपाईंका अपेक्षाहरू लेख्नुहोस्"></textarea>
        </div>
</div>
<br>
<div align="left">
    <label class="label_text">अतिरिक्त सुझाव (Additional Suggestions) <span class="star">*</span></label>
</div>
<br>
<div class="custom-grid">
        <textarea cols="100" rows="5" name="txtsuggestion" placeholder="थप केही सुझाव भए लेख्नुहोस्"></textarea>
</div>

<h2>ख. Customized (क्षमता विकास ) तालिम आवश्यकता खण्ड</h2>
<p>(कृपया आफूलाई आवश्यकता पर्ने एक विकल्प छान्नुहोस्। अन्य विकल्पहरू स्वतः हट्नेछन्।)</p>
<div class="box_1">
<div class="box">
  <input type="radio" value="ecd" name="selectedCategory" onclick="updateLink()" Required> &nbsp;&nbsp;&nbsp; ECD शिक्षकका लागि 
</div>
<div class="box">
  <input type="radio" value="teacher" name="selectedCategory" onclick="updateLink()" Required>&nbsp;&nbsp;&nbsp; विद्यालयतहका शिक्षकका लागि <br>
</div>
<div class="box">
  <input type="radio" value="principal" name="selectedCategory" onclick="updateLink()" Required>&nbsp;&nbsp;&nbsp; प्रअ तथा कर्मचारीहरुका लागि
</div>
<input type="hidden" name="txtcategory" size="40" id="categoryid">
</div>
<br>
<!--<a href="#" id="myLink"><b>अर्काे खण्ड</b></a>--> <input type="Submit" value="अर्काे खण्ड" name="btnsave">
</form>
<form method="Post" Action="Object/save_customize_training_needs.php" enctype="multipart/form-data">
    <p style="color:red;font-weight:bold;">माथिको परिचय खण्ड भरिसक्नु हुनेले परिचय खण्डमा राखिएको मोबाइल नम्बर तलको बक्समा टाइप गरेर अर्को खण्डमा जानुहोस् ।</p>
    <h2>ख. Customized (क्षमता विकास ) तालिम आवश्यकता खण्ड</h2>
<p>(कृपया आफूलाई आवश्यकता पर्ने एक विकल्प छान्नुहोस्। अन्य विकल्पहरू स्वतः हट्नेछन्।)</p>
<div class="box_1">
<div class="box">
  <input type="radio" value="ecd" name="selectedCategory" onclick="updateLink()" Required> &nbsp;&nbsp;&nbsp; ECD शिक्षकका लागि 
</div>
<div class="box">
  <input type="radio" value="teacher" name="selectedCategory" onclick="updateLink()" Required>&nbsp;&nbsp;&nbsp; विद्यालयतहका शिक्षकका लागि <br>
</div>
<div class="box">
  <input type="radio" value="principal" name="selectedCategory" onclick="updateLink()" Required>&nbsp;&nbsp;&nbsp; प्रअ तथा कर्मचारीहरुका लागि
</div>
<input type="hidden" name="txtcategory" size="40" id="categoryid">
</div>
<br>
    <div class="custom-grid">
    <div class="label_column">
        <label class="label_text">माेबाइल नम्बर <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="माेबाइल नम्बर लेख्नुहोस्" name="txtpremobileno" required>
    </div>
</div>
    <input type="Submit" value="अर्काे खण्ड" name="btnnext">
</form>
<script>
        function updateLink()
        {
            const radios = document.getElementsByName('selectedCategory');
            let selectedValue = "";
            for (let radio of radios)
            {
                if(radio.checked)
                {
                    selectedValue = radio.value;
                    break;
                }
            }
            const link = document.getElementById("myLink");
            
            if(selectedValue === "ecd")
            {
                document.getElementById("categoryid").value="ECD शिक्षकका लागि";
                link.href="index.php?accountid=application_form_1";
                
            }
            else if(selectedValue ==="teacher")
            {
                document.getElementById("categoryid").value="विद्यालयतहका शिक्षकका लागि";
                link.href="index.php?accountid=application_form_1B";
                
            }
            else if(selectedValue ==="principal")
            {
                document.getElementById("categoryid").value="प्रअ तथा कर्मचारीहरुका लागि";
              link.href="index.php?accountid=application_form_1C";
                
            }
            
        }
</script>
<br>

      