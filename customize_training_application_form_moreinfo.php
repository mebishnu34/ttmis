<form method="Post" Action="index.php" enctype="multipart/form-data">
<div>
     <h2 class="">Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
   <label class="label_text"> थप विवरण</label>
<div  style="width: 1000px; border: 2px solid black;">
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
<br><br>
<div align="left">
     <label class="label_text">तालिम अवधि (Preferred Duration) <span class="star">*</span></label>
</div>
      <div><input type="Radio" name="optduration" value="१–३ दिन"> १–३ दिन &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="optduration" value="४–७ दिन"> ४–७ दिन&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="optduration" value="१ हप्ता भन्दा बढी"> १ हप्ता भन्दा बढी
    </div>
 <br><br>
<div align="left">
    <label class="label_text">अपेक्षित उपलब्धि (Expected Outcomes): <span class="star">*</span></label>
</div>
<div>
        <textarea cols="100" rows="5" name="txtexpected" placeholder="तपाईंका अपेक्षाहरू लेख्नुहोस्"></textarea>
</div>
<br><br>
<div align="left">
    <label class="label_text">अतिरिक्त सुझाव (Additional Suggestions) <span class="star">*</span></label>
</div>
<div>
        <textarea cols="100" rows="5" name="txtsuggestion" placeholder="थप केही सुझाव भए लेख्नुहोस्"></textarea>
</div>
</div>
</div>
<br><br>
<div style="background-color: blue; padding: 10px">
<a href="index.php"><b>आवेदन पेश गर्नुहोस्</b></a>
</div>

</form>
      