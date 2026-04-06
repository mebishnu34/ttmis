<form method="Post" Action="index.php" enctype="multipart/form-data">
<div>
     <h2 class="">Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
<div class="custom-grid">
   <label class="label_text"> क परिचय खण्ड</label>
</div>

<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">नाम<span class="star">*</span></label>
    </div>

    <div>
        <input type="text" class="custom-input" placeholder="नाम लेख्नुहोस्" name="txtname" required>
    </div>
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
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">नियुक्ति भएको तह: <span class="star">*</span></label>
      </div>
      <div>
          <select name="appointmentLevel">
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
 <div class="label_column">
        <label class="label_text">विषय:<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="तपाईंको विषय" name="txtsubject" required>
    </div>
</div>

<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">अनुभव (वर्ष): <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="वर्षमा" name="txtexperence" required>
      </div>
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">माेबाइल नम्बर <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="माेबाइल नम्बर लेख्नुहोस्" name="txtmobileno" required>
    </div>
    <div class="label_column">
        <label class="label_text"> इमेल<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="इमाेल ठेगाना लेख्नुहोस्" name="txtemail" required>
    </div>
</div>

<div class="custom-grid">
       <label class="label_text">विद्यालय/ सस्थाको विवरण</label>
      
</div>
<div class="custom-grid">
<div class="label_column"><label >कार्यालय/विद्यालयको नाम: </label></div>
<div>
<input placeholder="कार्यालय वा विद्यालयको नाम लेख्नुहोस्" type="text" value="" name="officeSchoolDetails">
</div
><div ><label >जिल्ला: </label></div>
<div>
<input type="text" value="" name="cmbdistrict"></div>
<div>
  <label>स्थानीय तह: </label>
  <input type="text" value="" name="localLevel"></div>
  <div ><label>वडा न: </label>
  <input type="text" value="" name="wardNo">
</div>
</div>
<h2>ख. Customized (क्षमता विकास ) तालिम आवश्यकता खण्ड</h2>
<p>(कृपया आफूलाई आवश्यकता पर्ने एक विकल्प छान्नुहोस्। अन्य विकल्पहरू स्वतः हट्नेछन्।)</p>
<div >

  <input type="radio" value="ecd" checked="" name="selectedCategory" onclick="updateLink()"><span>A ECD शिक्षकका लागि</span><br>
  <input type="radio" value="teacher" name="selectedCategory" onclick="updateLink()"><span>B विद्यालयतहका शिक्षकका लागि</span><br>
  <input type="radio" value="principal" name="selectedCategory" onclick="updateLink()"><span >C प्रअ तथा कर्मचारीहरुका लागि</span>

</div>
<br>
<br>

<br><br>
<div style="background-color: blue; padding: 10px">
<a href="#" id="myLink"><b>अर्काे खण्ड</b></a>
</div>
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
                link.href="index.php?accountid=application_form_1";
            }
            else if(selectedValue ==="teacher")
            {
                link.href="index.php?accountid=application_form_1B";
            }
            else if(selectedValue ==="principal")
            {
                link.href="index.php?accountid=application_form_1C";
            }
            
        }
</script>
<br>

      