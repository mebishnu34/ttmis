<script src="script/nepdistrict_1.js"></script>
<form method="Post" Action="Object/save_customize_training_needs_extra.php" enctype="multipart/form-data">
<div>
     <h2 class="">Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम-<?php echo $_SESSION['financial_year'];?></h2>
     
</div>
नाम :- <?php echo $_SESSION['trainername'];?> &nbsp;&nbsp;
माेबाइल नम्बर :- <?php echo $_SESSION['mobileno'];?>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">

<div align="left">
   <label class="label_text"> थप विवरण</label>
</div>
<br>
तालिम प्राप्त गर्ने माध्यम (Training Modality) को प्राथमिकता
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">प्रत्यक्ष (Face-to-Face)<span class="star">*</span></label>
    </div>
  <div>
    <select name="txtmode1" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
  <option value="">प्राथमिकता छान्नुहोस्</option>
  <option value="पहिलो प्राथमिकता">पहिलो प्राथमिकता </option>
  <option value="दोस्रो प्राथमिकता">दोस्रो प्राथमिकता</option>
  </select>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="label_column">
        <label class="label_text">अनलाइन (Online)<span class="star">*</span></label>
    </div>
   <div>
    <input type="text" name="txtmode2" id="txtmode2" readonly>
        

  <script>
        function updatetextbox()
        {
          //alert("Hello");
          var mode1=document.getElementById("txtmode1").value;
          if(mode1 === "दोस्रो प्राथमिकता")
            {
              document.getElementById("txtmode2").value="पहिलो प्राथमिकता";
            }
          else if(mode1 === "पहिलो प्राथमिकता")
            {
              document.getElementById("txtmode2").value="दोस्रो प्राथमिकता";
            }
          else
          {
            document.getElementById("txtmode2").value="";
          }
        }
    </script>
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
<center>    <input type="Submit" value="सेभ गर्नुहाेस" name="btnnext"></center>
</form>
      