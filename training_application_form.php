<script>
function district1(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","dropdistrict_1.php?q="+str,true);
        xmlhttp.send();
    }
}
function schooldistrict(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintschool").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","dropdistrict_school.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>

<form method="Post" Action="Object/save_teacher_application.php" enctype="multipart/form-data">
<div>
     <h2 class="">शिक्षक तालिम आवेदन फाराम</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
<form class="">
<div class="">
<h3>क) शिक्षकसँग सम्वन्धित विवरण</h3>
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="पूरा नाम लेख्नुहोस्" name="txtteacherName" required>
    </div>
    <div class="label_column">
        <label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="बाबुको नाम लेख्नुहोस्" name="txtfatherName" required>
    </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">प्रदेश <span class="star">*</span></label>
    </div>
    <div>
        <select name="cmbprovince" class="custom-combo" required>
          <option value="">प्रदेश छनौट गर्नुहोस्</option>
          <option value="कोशी">कोशी</option>
          <option value="मधेश">मधेश</option>
          <option value="बागमती">बागमती</option>
          <option value="गण्डकी">गण्डकी</option>
          <option value="लुम्बिनी">लुम्बिनी</option>
          <option value="कर्णाली">कर्णाली</option>
          <option value="सुदूरपश्चिम">सुदूरपश्चिम</option>
        </select>
      </div>
</div>
<br>
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">जिल्ला <span class="star">*</span></label>
      </div>
      <div>
      <?php include("district_list_1.htm");?>
          
      </div>
      <div class="label_column">
        <label class="label_text">स्थानीय तह <span class="star">*</span></label>
      </div>
      
        <div id="txtHint">Municipality/Rural</div>
          <div class="label_column">
          <label class="label_text">वडा <span class="star">*</span></label>
      </div>
      <div>
          <input class="custom-input" placeholder="वडा" name="txtward" required>
      </div>
    </div>
  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं <span class="star">*</span></label>
      </div>
      <div>
          <input class="custom-input" placeholder="मोबाइल नं (१० अंक)" name="txtmobileNo" required>
      </div>
      <div class="label_column">
      <label class="label_text">इमेल ठेगाना <span class="star">*</span></label>
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
      <label class="label_text">नागरिकता जारी गर्ने जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" placeholder="जिल्लाको नाम लेख्नुहोस्" name="citizenshipIssuedDistrict" required>
    </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको साल <span class="star">*</span></label>
    </div>
    <div>
      <input maxlength="4" class="custom-input" placeholder="नियुक्ति साल लेख्नुहोस" type="text" name="txtappointdate" required>
    </div>
    <div class="label_column">
      <label class="label_text"> महिना <span class="star">*</span></label>
    </div>
    <div>
    <select name="cmbappointmonth" required>
        <option value="">महिना</option>
        <option value="बैशाख">बैशाख</option>
        <option value="जेठ">जेठ</option>
        <option value="असार">असार</option>
        <option value="साउन">साउन</option>
        <option value="भदौ">भदौ</option>
        <option value="असोज">असोज</option>
        <option value="कात्तिक">कात्तिक</option>
        <option value="मंसिर">मंसिर</option>
        <option value="पुष">पुष</option>
        <option value="माघ">माघ</option>
        <option value="फागुन">फागुन</option>
        <option value="चैत">चैत</option>
      </select>
      <label class="label_text"> दिन <span class="star">*</span></label><input type="text" name="txtday" size="5" placeholder="दिन">
    </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <?php
          include("normal_district.htm");?>
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
    <label class="label_text">नियुक्ति भएको विषय <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" placeholder="विषय लेख्नुहोस्" name="cmbappointsubject" required>
  </div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">बैंकको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" placeholder="बैंकको नाम" name="txtbankname" required>
  </div>
  <div class="label_column">
    <label class="label_text">खाता नं <span class="star">*</span></label>
</div>
  <div>
   <input class="custom-input" placeholder="खाता नं" name="txtbankacno" required>
  </div>
</div>
<br>
<div class="custom-grid">
<div class="label_column">  
<label class="label_text">पान नं <span class="star">*</span></label>
</div>
<div>
  <input class="custom-input" placeholder="पान नं" name="txtpanNo" required>
</div>
</div>
 <h3 class="text-xl font-bold text-slate-800">ख) विद्यालयसगँ सम्वन्धित विवरण</h3>
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
    <option value="">प्रदेश छनौट गर्नुहोस्</option>
    <option value="कोशी">कोशी</option>
    <option value="मधेश">मधेश</option>
    <option value="बागमती">बागमती</option>
    <option value="गण्डकी">गण्डकी</option>
    <option value="लुम्बिनी">लुम्बिनी</option>
    <option value="कर्णाली">कर्णाली</option>
    <option value="सुदूरपश्चिम">सुदूरपश्चिम</option>
    </select>
  </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">जिल्ला <span class="star">*</span></label>
  </div>
  <div>
    <?php include("school_district_list_1.htm");?>
    
  </div>

  <div class="label_column">
      <label class="label_text">स्थानीय तह <span class="star">*</span></label>
  </div>
  <div>
    <div id="txtHintschool">Municipality/Rural</div>
      
  </div>
  <div class="label_column">
    <label class="label_text">वडा <span class="star">*</span></label>
  </div>
    <div class="label_column">
      <input class="custom-input" placeholder="वडा" name="txtschoolward" required>
    </div>
</div>
<h3>ग) तालिम आवश्यकता सम्वन्धी विवरण</h3>
<div class="custom-grid">
  <div class="label_column">
  <label class="label_text">तालिम लिन चाहेको विषयक्षेत्र <span class="star">*</span></label>
</div>
<div>
  <?php
    include("training_category.html");
  ?>  
</div>
</div>
<br>
<div class="custom-grid">
<div class="label_column">
<label class="label_text">कुन विषयको तालिम लिने हो <span class="star">*</span></label>
</div>
<div>
    <select id="trainingsubject" name="cmbsubject" class="custom-combo">
    <option value="प्रारम्भिक बालविकास र शिक्षा">प्रारम्भिक बालविकास र शिक्षा</option>
    <option value="एकीकृत पाठ्यक्रम (कक्षा १-३)">एकीकृत पाठ्यक्रम (कक्षा १-३)</option>
    <option value="नेपाली">नेपाली</option>
    <option value="अङ्ग्रेजी">अङ्ग्रेजी</option>
    <option value="गणित">गणित</option>
    <option value="विज्ञान तथा प्रविधि">विज्ञान तथा प्रविधि</option>
    <option value="सामाजिक अध्ययन">सामाजिक अध्ययन</option>
    <option value="ऐच्छिक विषय">ऐच्छिक विषय</option>
    <option value="ICT मा आधारित तालिम">ICT मा आधारित तालिम</option>
    </select>
    <input type="text" name="cmbsubject" placeholder="विषय" id="trainingsubject1" style="display:none;">
    <script>
      function handleChange()
      {
        //alert("Check");
        let category = document.getElementById("trainingcategory").value;
        let subject = document.getElementById("trainingsubject");
        let subject1 = document.getElementById("trainingsubject1");
      if(category === "एक महिने प्रमाणीकरण तालिम (TPD)")
        {
          //subject.disabled=false; // enable
            subject.style.display="block";
            subject1.style.display="none";
        }
        else
        {
          //subject.disabled=true; // disable
          subject.style.display="none";
          subject1.style.display="block";
        }
      }
    </script>
</div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता १) <span class="star">*</span></label>
</div>
<div>
  <select name="cmbprioritymode" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
  <option value="">छनौट गर्नुहोस्</option>
  <option value="अनलाइन">अनलाइन</option>
  <option value="आमनेसामने">आमनेसामने</option>
  </select>
</div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता २) <span class="star">*</span></label>
  </div>
  <div >
    <input type="Text" name="cmbpriority2mode" id="txtmode2" disabled>
    </div>
    <script>
        function updatetextbox()
        {
          //alert("Hello");
          var mode1=document.getElementById("txtmode1").value;
          if(mode1 === "अनलाइन")
            {
              document.getElementById("txtmode2").value="आमनेसामने";
            }
          else if(mode1 === "आमनेसामने")
            {
              document.getElementById("txtmode2").value="अनलाइन";
            }
          else
          {
            document.getElementById("txtmode2").value="";
          }
        }
    </script>

</div>
</div>
<h3>अपलोड गर्नुपर्ने कागजातहरू(PDF, JPG वा PNG (Max 5MB)</h3>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">नियुक्ति पत्र <span class="star">*</span></label>
  </div>
  <div>
    <input type="file" name="fileletter" required>
  </div>
  <div class="label_column">
    <label class="label_text">नागरिकता प्रमाणपत्र <span class="star">*</span></label>
  </div>
  <div>
    <input  type="file" name="filecitizenship" required>
</div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">विद्यालयको सिफारिस पत्र <span class="star">*</span></label>
  </div>
  <div>
    <input  type="file" name="fileschoolrecommend" required>
</div>
</div>
<div>
  <h4>घोषणा</h4>
    <p><!-- <input type="checkbox" value="Verify" name="accept" id="accept" onclick="checkfunction()"> --> मैले यस फाराममा भरेका सबै विवरणहरू सत्य छन्। यदि कुनै विवरण गलत ठहरिएमा मेरो आवेदन रद्द हुने कुरामा म मञ्जुर छु।</p></div></div></section>
              <!-- <input type="button" value="आवेदन पेश गर्नुहोस्" name="btnclientsubmit" disabled="disabled" id="btnclientsubmit" onClick="confSubmit(this.form);">-->
              <input type="submit" value="आवेदन पेश गर्नुहोस्" name="btnsave">
</form>
      
<script type="text/javascript">
function confSubmit(form) 
	{
	if (confirm("Are you sure you want to submit the form?")) 
		{
			form.submit();
		}
	else
		{
			alert("You decided to not submit the form!");
		}
	}

function checkfunction() 
{
 var check = document.getElementById('accept');
 var subbutton = document.getElementById('btnclientsubmit');
  if (check.checked == true)
  {
   subbutton.disabled=false;
  }
 else 
 {
	subbutton.disabled=true;
  }
}

</script>



