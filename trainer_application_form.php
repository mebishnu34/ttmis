<form method="Post" Action="Object/save_trainer_application.php" enctype="multipart/form-data">
<div>
     <h2 class="">रोष्टर/ विज्ञ सूचिमा सूचिकृतका लागि आवेदन फाराम-<?php echo $_SESSION['financial_year'];?></h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
     
</div>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">पूरा नाम (देवनागरीमा) <span class="star">*</span></label>
    </div>

    <div>
        <input type="text" size="40" class="custom-input" placeholder="नाम लेख्नुहोस्" name="txtname" required>
    </div>
    <div class="label_column">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text"> पूरा नाम (अंग्रेजीमा)<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" size="40" class="custom-input" placeholder="थर लेख्नुहोस्" name="txtengname" required>
    </div>
</div>
<br>
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">लिङ्ग <span class="star">*</span></label>
      </div>
      <div>
          <input type="Radio" class="custom-input" name="optgender" value="महिला" checked="true"> महिला &nbsp;&nbsp;&nbsp; <input type="Radio" class="custom-input" value="पुरुष" name="optgender">पुरुष &nbsp;&nbsp;&nbsp; <input type="Radio" class="custom-input" value="अन्य" name="optgender">अन्य
</div>
 <!--         <div class="label_column">
        <label class="label_text">नागरिकता नम्बर<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="नागरिकता नम्बर लेख्नुहोस्" name="txtcitizenshipno" required>
    </div>-->
</div>
<br>
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">हालको अवस्था <span class="star">*</span></label>
      </div>
      <div>
          <input type="Radio" class="custom-input" name="optcondition" id="optconitionid" value="कार्यरत"> कार्यरत &nbsp;&nbsp;&nbsp; <input type="Radio" class="custom-input" value="अवकासप्राप्त" name="optcondition" checked>अवकासप्राप्त 
</div>

 <!--         <div class="label_column">
        <label class="label_text">नागरिकता नम्बर<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="नागरिकता नम्बर लेख्नुहोस्" name="txtcitizenshipno" required>
    </div>-->
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">कार्यरत संस्थाको नाम<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" size="50" class="custom-input" placeholder="संस्थाको नाम लेख्नुहोस्" name="txtworkingoffice" id="txtworkingoffice" disabled>
      </div>
</div>
<script>
document.querySelectorAll('input[name="optcondition"]').forEach(function(radio) {
    radio.addEventListener('change', function() {

        const workoffice = document.getElementById('txtworkingoffice');

        if (document.getElementById('optconitionid').checked) {
            workoffice.disabled = false;
        } else {
            workoffice.disabled = true;
            workoffice.value = ""; 
        }
    });
});
</script>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">माेबाइल नम्बर <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="माेबाइल नम्बर लेख्नुहोस्" name="txtmobileno" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <label class="label_text"> इमेल<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" placeholder="इमाेल ठेगाना लेख्नुहोस्" name="txtemail" required>
    </div>
</div>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">स्थायी ठेगाना <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" size="50" class="custom-input" placeholder="पुरा ठेगाना लेख्नुहोस्" name="txtaddress" required>
      </div>
</div>
<br>
<div class="custom-grid">
      <div class="label_column">
          <label class="label_text">हालको वसोवासको ठेगाना <span class="star">*</span></label>
      </div>
      <div>
          <input type="text" size="50" class="custom-input" placeholder="हालकाे ठेगाना लेख्नुहोस्" name="txtcurrentaddress" required>
      </div>
</div>
<br>
<div>
      
        <label class="label_text">माथिल्लो शैक्षिक योग्यता <span class="star">*</span></label>
      
</div>
<div>
      <table class="table_design_trainer" id="tablequalification">
          <tr>
           <th>क्र.सं.</th>
            <th>योग्यता</th>
            <th>विषय</th>
            <th>विश्वविद्यालय/बोर्ड</th>
            <th>साल</th>
            <th>ग्रेड</th>
          </tr>
          <tr>
            <td align="center">1</td>
            <td align="center"><input type="text" name="txtqualification[]" size="30"></td>
            <td align="center"><input type="text" name="txtsubject[]" size="20"></td>
            <td align="center"><input type="text" name="txtboard[]" size="20"></td>
            <td align="center"><input type="text" name="txtyear[]" size="5"></td>
            <td align="center"><input type="text" name="txtgrade[]" size="5"></td>
        </tr>
        <tr>
            <td align="center">2</td>
            <td align="center"><input type="text" name="txtqualification[]" size="30"></td>
            <td align="center"><input type="text" name="txtsubject[]" size="20"></td>
            <td align="center"><input type="text" name="txtboard[]" size="20"></td>
            <td align="center"><input type="text" name="txtyear[]" size="5"></td>
            <td align="center"><input type="text" name="txtgrade[]" size="5"></td>
        </tr>
         
          </table>
    
</div>
<br>
<div>
    
        <label class="label_text"> तालिम तथा प्रशिक्षण लिएको विवरण <span class="star">*</span></label>
    
</div>
  <div>
    <div>
        <table class="table_design_trainer" id="trainingdetails">
          <tr>
           <th>क्र.सं.</th>
            <th>तालिम नाम</th>
            <th>अवधि</th>
            <th>तालिम दिने संस्था</th>
            <th>कहिले</th>
          </tr>
          <tr>
            <td align="center">1</td>
            <td align="center"><input type="text" name="txttraining[]" size="30"></td>
            <td align="center"><input type="text" name="txtperiod[]" size="10"></td>
            <td align="center"><input type="text" name="txttrainerorg[]" size="20"></td>
            <td align="center"><input type="text" name="txttraineryear[]" size="5"></td>
        </tr>
        <tr>
            <td align="center">2</td>
            <td align="center"><input type="text" name="txttraining[]" size="30"></td>
            <td align="center"><input type="text" name="txtperiod[]" size="10"></td>
            <td align="center"><input type="text" name="txttrainerorg[]" size="20"></td>
            <td align="center"><input type="text" name="txttraineryear[]" size="5"></td>
        </tr>
         <tr>
            <td align="center">3</td>
            <td align="center"><input type="text" name="txttraining[]" size="30"></td>
            <td align="center"><input type="text" name="txtperiod[]" size="10"></td>
            <td align="center"><input type="text" name="txttrainerorg[]" size="20"></td>
            <td align="center"><input type="text" name="txttraineryear[]" size="5"></td>
        </tr>
          </table>
                <script>
    function addRow()
    {
      let table=document.getElementById("trainingdetails")
      //create new row
      let row = table.insertRow();

      // create cells
      let cell1=row.insertCell(0);
      let cell2=row.insertCell(1);
      let cell3=row.insertCell(2);
      let cell4=row.insertCell(3);
      let cell5=row.insertCell(4);
       //Add content
      cell1.innerHTML="";
      cell2.innerHTML='<input type="text" name="txttraining[]" size="30">';
      cell3.innerHTML='<input type="text" name="txtperiod[]" size="10">';
      cell4.innerHTML='<input type="text" name="txttrainerorg[]" size="20">';
      cell5.innerHTML='<input type="text" name="txttraineryear[]" size="5">';
      

      // delete row
      let actioncell= row.insertCell(5);
      actioncell.innerHTML='<button onclick="deleteRow(this)">Delete</button>';
      
    }
    function deleteRow(btn)
    {
      let row = btn.parentNode.parentNode; //button-cell-row
      row.remove();
    }
</script>
          <button onclick="addRow()">Add</button>      
    </div>
    <br>
    <div>
        <label class="label_text">सहजीकरण / प्रशिक्षण गरेको विवरण ( मुख्य मुख्य कार्यक्रम )<span class="star">*</span></label>
    </div>
      <div>
        
        <table class="table_design_trainer" id="trainerprogram">
          <tr>
           <th>क्र.सं.</th>
            <th>कार्यक्रम</th>
            <th>भूमिका</th>
            <th>विषय</th>
            <th>संस्था</th>
            <th>कहिले</th>
          </tr>
          <tr>
            <td align="center">1</td>
            <td align="center"><input type="text" name="txtprogram[]" size="30"></td>
            <td align="center"><input type="text" name="txtroll[]" size="20"></td>
            <td align="center"><input type="text" name="txtprogramsubject[]" size="20"></td>
            <td align="center"><input type="text" name="txtorg[]" size="20"></td>
            <td align="center"><input type="text" name="txtprogramyear[]" size="5"></td>
        </tr>
        <tr>
          <td align="center">2</td>
            <td align="center"><input type="text" name="txtprogram[]" size="30"></td>
            <td align="center"><input type="text" name="txtroll[]" size="20"></td>
            <td align="center"><input type="text" name="txtprogramsubject[]" size="20"></td>
            <td align="center"><input type="text" name="txtorg[]" size="20"></td>
            <td align="center"><input type="text" name="txtprogramyear[]" size="5"></td>
        </tr>
        </table>
        <script>
  function addRowprogram()
    {
      let table=document.getElementById("trainerprogram")
      //create new row
      let row = table.insertRow();

      // create cells
      let cell1=row.insertCell(0);
      let cell2=row.insertCell(1);
      let cell3=row.insertCell(2);
      let cell4=row.insertCell(3);
      let cell5=row.insertCell(4);
      let cell6=row.insertCell(5);
       //Add content
      cell1.innerHTML="";
      cell2.innerHTML='<input type="text" name="txtprogram[]" size="30">';
      cell3.innerHTML='<input type="text" name="txtroll[]" size="30">';
      cell4.innerHTML='<input type="text" name="txtprogramsubject[]" size="30">';
      cell5.innerHTML='<input type="text" name="txtorg[]" size="20">';
      cell6.innerHTML='<input type="text" name="txtprogramyear[]" size="5">';
      

      // delete row
      let actioncell= row.insertCell(6);
      actioncell.innerHTML='<button onclick="deleteRow1(this)">Delete</button>';
      
    }
    function deleteRow1(btn)
    {
      let row = btn.parentNode.parentNode; //button-cell-row
      row.remove();
    }
</script>
          <button onclick="addRowprogram()">Add</button>      
      
      </div>
  
 <h3 class="text-xl font-bold text-slate-800">विज्ञता क्षेत्र ( &#9745; टिक लगाउनुहोस्) <span class="star">*</span></h3>
<div>
   <input type="checkbox" name="optspecialist[]" value="नेपाली"> नेपाली &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="अङ्ग्रेजी"> अङ्ग्रेजी &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="गणित"> गणित &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="विज्ञान"> विज्ञान &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="ICT"> ICT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="ECD"> ECD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="समावेशी शिक्षा"> समावेशी शिक्षा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="एकीकृत पाठ्यक्रम"> एकीकृत पाठ्यक्रम &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<br>
   <input type="checkbox" name="optspecialist[]" value="STEAM Education"> STEAM Education &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="सामाजिक"> सामाजिक &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="योग शिक्षा"> योग शिक्षा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="मनोसामाजिक परामर्श"> मनोसामाजिक परामर्श &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="करियर गाइडेन्स"> करियर गाइडेन्स &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="MGML"> MGML &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="शासन प्रशासन व्यवस्थापन"> शासन / प्रशासन / व्यवस्थापन &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="अनुसन्धान"> अनुसन्धान &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="checkbox" name="optspecialist[]" value="नेतृत्व"> नेतृत्व &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="खेलकुद"> खेलकुद &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="संगीत"> संगीत &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="मातृभाषा" id="mothertoung"> मातृभाषा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="Mentor"> Mentor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="checkbox" name="optspecialist[]" value="AI"> AI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="checkbox" name="optspecialist[]" value="Teacher Mentor"> Teacher Mentor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="Peer Mentor"> Peer Mentor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="Evaluation"> Evaluation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="अभिभावक शिक्षा"> अभिभावक शिक्षा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="optspecialist[]" value="Motivation"> Motivation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="checkbox" name="optspecialist[]" value="अन्य" id="specialistother">अन्य &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="text" size="100" name="optspecialist[]" placeholder="अन्य विज्ञता लेख्नुहाेस" id="txtspecialist" style="display:none;">
   <input type="text" size="100" name="optspecialist[]" placeholder="मातृभाषा लेख्नुहाेस" id="txtmothertoung" style="display:none;">

</div>
<script>
      const specialist = document.getElementById("specialistother");
      specialist.addEventListener("change", function()
      {
        if(this.checked)
        {
          txtspecialist.style.display="block";
        }
        else
        {
          txtspecialist.style.display="none";
        }
      });
      
      const mothertoung = document.getElementById("mothertoung");
      mothertoung.addEventListener("change", function()
      {
        if(this.checked)
        {
          txtmothertoung.style.display="block";
        }
        else
        {
          txtmothertoung.style.display="none";
        }
      }
    
    );
    </script>
<br>
<div align="left">
    
      <label class="label_text">प्रकाशन/अनुसन्धान (गरेको भए सो को क्षेत्र) शिर्षक र मिति </label>
    
</div>
<div>
        
        <table class="table_design_trainer" id="trainerpublish">
          <tr>
           <th>क्र.सं.</th>
            <th>शिर्षक</th>
            <th>प्रकाशन मिति</th>
          </tr>
          <tr>
            <td align="center">1</td>
            <td align="center"><input type="text" name="txttitle[]" size="30"></td>
            <td align="center"><input type="text" name="txtpublishdate[]" size="30"></td>
          </tr>
        <tr>
          <td align="center">2</td>
            <td align="center"><input type="text" name="txttitle[]" size="30"></td>
            <td align="center"><input type="text" name="txtpublishdate[]" size="30"></td>
        </tr>
        </table>
        <script>
  function addRowpublish()
    {
      let table=document.getElementById("trainerpublish")
      //create new row
      let row = table.insertRow();

      // create cells
      let cell1=row.insertCell(0);
      let cell2=row.insertCell(1);
      let cell3=row.insertCell(2);
        //Add content
      cell1.innerHTML="";
      cell2.innerHTML='<input type="text" name="txttitle[]" size="30">';
      cell3.innerHTML='<input type="text" name="txtpublishdate[]" size="30">';
            // delete row
      let actioncell= row.insertCell(3);
      actioncell.innerHTML='<button onclick="deleteRow2(this)">Delete</button>';
      
    }
    function deleteRow2(btn)
    {
      let row = btn.parentNode.parentNode; //button-cell-row
      row.remove();
    }
</script>
          <button onclick="addRowpublish()">Add</button>      
      
  </div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तपाई कुन माध्यमबाट सहजीकरण/प्रशिक्षण गर्नु हुन्छ ? <span class="star">*</span></label>
</div>
<div class="content">
  <select name="cmbtrainingmode" class="custom-combo" id="txtmode1" required>
    <option value="">--छान्नुहोस्--</option>
  <option value="आमनेसामने (Face To Face)">आमनेसामने (Face To Face)</option>
  <option value="अनलाइन (Online)">अनलाइन (Online)</option>
  <option value="दुवै (Both)">दुवै (Both)</option>
  </select>
</div>
</div>

<h3>अपलोड गर्नुपर्ने कागजातहरू</h3>(२५० के.बी भन्दा कम साइजको फाइलमात्र अपलोड गर्नुहोला।)
<div class="custom-grid">
  <div class="label_column">
    <label>नागरिकताको प्रमाण पत्र (pdf) <span class="star">*</span></label>
  </div>
  <div>
    <input type="file" name="filecitizenship" required class="big_file">
  </div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label>प्रमाणित बायोडाटा (pdf) <span class="star">*</span></label>
  </div>
  <div>
    <input type="file" name="filecv" required class="big_file" required>
  </div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label>माथिल्लो शैक्षिक योग्यताको प्रमाण पत्र (pdf)<span class="star">*</span></label>
  </div>
  <div>
    <input  type="file" name="filequalification" class="big_file" required>
</div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label>फोटो (jpg, png) <span class="star">*</span></label>
  </div>
  <div>
    <input  type="file" name="filephpto" required class="big_file" required>
</div>

</div>
<p align="center">    <input type="submit" value="आवेदन पेश गर्नुहोस्" name="btnsave"></p>
</form>
      