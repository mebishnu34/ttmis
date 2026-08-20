<!-- Including our scripting file. -->
 <script src="script/nepdistrict.js"></script>
<script>
  /*
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
*/
</script>
<form method="Post" Action="Object/save_teacher_application.php" enctype="multipart/form-data">
<div>
     <h2 class="">शिक्षक तालिम आवेदन फाराम ( <?php echo $_SESSION['financial_year'];?> )</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
     
</div>
<form class="">
<div class="">
<h3>क) शिक्षकसँग सम्वन्धित विवरण</h3>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="पूरा नाम लेख्नुहोस्" name="txtteacherName" required>
    </div>
    <div class="label_column">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <label class="label_text">लिङ्ग<span class="star">*</span></label>
    </div>
    <div>
          <input type="Radio" value="पुरुष" name="optgender" checked>पुरुष&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="Radio" value="महिला" name="optgender">महिला &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="Radio" value="अन्य" name="optgender">अन्य
            
    </div>
</div>
<br>
<div class="custom-grid">
     <div class="label_column">
   <label class="label_text">जन्ममिति<span class="star">*</span></label>
    </div>
    <div>

<input type="text" name="txtdob" id="date" maxlength="10" placeholder="YYYY-MM-DD" required>

</div>
</div>

<br>
<div class="custom-grid">
     <div class="label_column">
   <label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" placeholder="बाबुको नाम लेख्नुहोस्" name="txtfatherName" required>
    </div>
</div>
<br>
<p align="left"><h3>स्थायी ठेगाना :</h></p>
<table width="90%" border="0" style="background-color:lightblue;">
  <tr>
    <td><label class="label_text">प्रदेश <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbprovince" id="cmbprovince" required>
              <option>प्रदेश छान्नुहोस</option>
    </select></td>
    <td><label class="label_text">जिल्ला <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbdistrictnp" id="cmbdistrictnp" required>
                         </select></td>
</tr>
<tr>
    <td><label class="label_text">स्थानीय तह <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbmunnp" id="cmbmunnp" required>
						</select></td>
    <td><label class="label_text">वडा <span class="star">*</span></label></td>
    <td><input class="custom-input_number" placeholder="वडा" size="5" name="txtward" required></td>
</tr>
</table>

  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं <span class="star">*</span></label>
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
      <label class="label_text">नागरिकता जारी गर्ने जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbctzissuedistrict">
        <option>जिल्ला छान्नुहोस</option>
      <?php include("nepali_district.htm");?>
      </select>
       </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">स्थायी नियुक्ति भएको साल <span class="star">*</span></label>
    </div>
    <div>
      <input maxlength="4" placeholder="नियुक्ति साल" size="10" type="text" name="txtappointdate" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text"> महिना <span class="star">*</span></label>
    </div>
    
    <div>
    <select class="custom-combo" name="cmbappointmonth" required>
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
      &nbsp;&nbsp;&nbsp;<label class="label_text"> गते <span class="star">*</span></label><input class="custom-input_number" type="text" name="txtday" size="5" placeholder="दिन" >
    </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbappointdistrict">
        <option>जिल्ला छान्नुहोस</option>
      <?php include("nepali_district.htm");?>
      </select>
      </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">नियुक्ति भएको तह <span class="star">*</span></label>
    </div>
  <div>
  <select name="cmbappointlevel" id="applintlevelid" class="custom-combo" required onchange="levelChange()">
         <?php
            include("level.htm");
        ?>
  </select>
  </div>
  <div class="label_column">
    <label class="label_text" style="display:none;" id="appointsublevelid">नियुक्ति भएको विषय <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" id="appointsubjectid" style="display:none;" placeholder="विषय लेख्नुहोस्" name="cmbappointsubject">
  </div>
</div>
<script>
      function levelChange()
      {
        //alert("Check");
        let appointlevel = document.getElementById("applintlevelid").value;
        let appointsubject = document.getElementById("appointsubjectid");
        let appointsublevel = document.getElementById("appointsublevelid");
        //alert("Check");
       // alert(appointlevel);
      if(appointlevel === "प्रारम्भिक बालविकास" || appointlevel === "प्राथमिक तह")
        {
          //subject.disabled=false; // enable
        //   alert(appointlevel);
            appointsubject.style.display="none";
            appointsublevel.style.display="none";
          }
        else
        {
          //subject.disabled=true; // disable
            //appointsubject.style.display="block";
            appointsubject.style.display= "block";
            appointsublevel.style.display="block";

        }
      }
</script>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">तपाईको खाता भएको बैंकको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" placeholder="Name of Bank in English" name="txtbankname" required oninput="this.value = this.value.replace(/[^A-Za-z ]/g, ''">
  </div>
  
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">तपाईको बैंक खातामा भएको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" placeholder="Your name in English" name="txtaccountholder" required oninput="this.value = this.value.replace(/[^A-Za-z ]/g, ''">
  </div>
  <div class="label_column">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">खाता नं <span class="star">*</span></label>
</div>
  <div>
   <input class="custom-input" placeholder="Account Number in English" name="txtbankacno" required  oninput="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, ''">
  </div>
</div>
<br>

<div class="custom-grid">
<div class="label_column">  
<label class="label_text">पान नं <span class="star">*</span></label>
</div>
<div>
  <input class="custom-input" placeholder="Pan Number in English" name="txtpanNo" required oninput="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, ''">
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
<div class="custom-grid">
    <div class="label_column">
    <label class="label_text">जिल्ला <span class="star">*</span></label>
  </div>
  <div>
    <?php //include("school_district_list_1.htm");?>
    <select class="custom-combo" name="cmbdistrictbagamati" id="cmbdistrictbagamati" required>
      <option>जिल्ला छान्नुहोस</option>
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
<h3>ग) तालिम आवश्यकता सम्वन्धी विवरण</h3>
<h4><label><i>TPD तालिम लिन कक्षा तीन सम्म अध्यापन गर्नु हुनेले एकीकृत पाठ्यक्रम (कक्षा १-३) छान्नुहाेस र कक्षा चार देखि माथि अध्यापन गर्नु हुनेले  विषय छान्नु हाेस ।</i></label></h4>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिन चाहेको विषयक्षेत्र <span class="star">*</span></label>
  </div>
  <div class="content">
    <select id="trainingcategory" name="cmbtrainingcategory" class="custom-combo" required onchange="handleChange()">
      <option>तालिम लिन चाहेको विषय छान्नुहोस</option>
  <?php
    include("training_category_1.html");
  ?>  
  </select>
  </div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
<label class="label_text">कुन विषयको तालिम लिने हो <span class="star">*</span></label>
</div>
<div class="content">
    <select id="trainingsubject" name="cmbsubject" class="custom-combo" onchange="subjectChange()">
    <option value="प्रारम्भिक बालविकास">प्रारम्भिक बालविकास</option>
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
</div>
</div>
<script>
      function handleChange()
      {
        //alert("Check");
         let category = document.getElementById("trainingcategory").value;
    let subject = document.getElementById("trainingsubject");
    let subject1 = document.getElementById("trainingsubject1");
    let tpdlabel1 = document.getElementById("tpdlabel");
      if (category === "एक महिने प्रमाणीकरण तालिम (TPD)")
    {
        subject.style.display = "block";
        subject1.style.display = "none";
        tpdlabel1.style.display = "block";

        }
      else
        {
          //subject.disabled=true; // disable
          subject.style.display="none";
          subject1.style.display="block";
          tpdlabel1.style.display="none";
          
        }
      }
      </script>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
<label class="label_text" id="rowclassid" style="display:none;" >कक्षा<span class="star">*</span></label>
</div>
<div class="content">
    <select name="cmbclass" class="custom-combo"  id="trainingclassid" style="display:none;">
    <option value="कक्षा ४ देखि ५">कक्षा ४ देखि ५</option>
    <option value="कक्षा ६ देखि ८">कक्षा ६ देखि ८</option>
    <option value="कक्षा ९ देखि १०">कक्षा ९ देखि १०</option>
    </select>
  </div>
</div>
<script>
      function subjectChange()
      {
        
        let subject = document.getElementById("trainingsubject").value;
        let teachingclass = document.getElementById("trainingclassid");
        let classrow = document.getElementById("rowclassid");
        if(subject==="प्रारम्भिक बालविकास" || subject==="एकीकृत पाठ्यक्रम (कक्षा १-३)")
          {
            classrow.style.display="none";
            teachingclass.style.display="none";
        }
      else
        {
          classrow.style.display="block";
            teachingclass.style.display="block";
          
        }
        
      }

    </script>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता १) <span class="star">*</span></label>
</div>
<div class="content">
  <select name="cmbprioritymode" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
  <option value="">छनौट गर्नुहोस्</option>
  <option value="अनलाइन (Online)">अनलाइन (Online)</option>
  <option value="आमनेसामने (Face To Face)">आमनेसामने (Face To Face)</option>
  </select>
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता २) <span class="star">*</span></label>
  </div>
  <div class="content">
    <input type="Text" name="cmbpriority2mode" id="txtmode2" readonly>
    </div>
    </div>
</div>
<h3>अपलोड गर्नुपर्ने कागजातहरू</h3>(२५० के.बी भन्दा कम साइजको फाइलमात्र अपलोड गर्नुहोला।)
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">नियुक्ति पत्र (प्र.अ.को तालिम लिने भएमा प्र.अ. नियुक्ति भएको पत्र)(pdf)<span class="star">*</span></label>
  </div>
  <div class="content">
    <input type="file" name="fileletter" class="big_file" required>
  </div>
</div>
   <script>
        function updatetextbox()
        {
          //alert("Hello");
          var mode1=document.getElementById("txtmode1").value;
          if(mode1 === "अनलाइन (Online)")
            {
              document.getElementById("txtmode2").value="आमनेसामने (Face To Face)";
            }
          else if(mode1 === "आमनेसामने (Face To Face)")
            {
              document.getElementById("txtmode2").value="अनलाइन (Online)";
            }
          else
          {
            document.getElementById("txtmode2").value="";
          }
        }
    </script>

<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">नागरिकता प्रमाणपत्र(pdf) <span class="star">*</span></label>
  </div>
  <div class="content">
    <input  type="file" name="filecitizenship" class="big_file" required>
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">विद्यालय/स्थानीय तहकाे सिफारिस पत्र (pdf)</label>
  </div>
  <div class="content">
    <input  type="file" name="fileschoolrecommend" class="big_file">
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">तपाईको पासपोर्ट साइजको फोटो(jpg, png) <span class="star">*</span></label>
  </div>
  <div class="content">
    <input  type="file" name="filephoto" class="big_file">
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



