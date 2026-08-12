<?php
include("Processing/db_connection.php");
$letter="";$citizenship="";$recomand="";

$province=""; $month="";$ayear="";$amonth="";$aday="";$bank="";$acno="";$pan="";$schoolname="";
$schooldistrict="";$schoolpalika="";$schoolward="";$mode="";$letter="";
$citizenship="";$recomand="";$category="";$training="";
   $sql1 = "SELECT * FROM tblteacher where teacherid='$_SESSION[tid]'";
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0)
      {
      while($row = $result1->fetch_assoc())
         {
            $tname=$row['tname'];
            $tcode=$row['teachercode'];
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
            $d=$row['district'];
            $vdc=$row['munvdc'];
            $ward=$row['wardno'];
            $tc=$row['tcontact'];
            $adate=$row['appointdate'];
            $atype=$row['appointtype'];
            $level=$row['workinglevel'];
            $scode=$row['scode'];
            $tlevel=$row['teachinglevel'];
            $qualification=$row['qualification'];
            $faculty=$row['faculty'];
            $msubject=$row['majorsubject'];
            $tsubject=$row['teachingsubject'];
           $apsubject=$row['subject'];
        $sql2 = "SELECT tname, mobileno, citizenshipno, bankname, bankacno, panno, schoolname,province,schooldistrict, schoollocallevel,schoolward, appointdate,appointsubject,appointletter,citizenship,schoolrecommend,trainingcategory,trainingsubject,appointlocallevel,district, munvdc,priority1model,appointdate, appointmonth, appointday FROM tblapplication where teachercode='".$tcode ."'";
        $result2 = $conn->query($sql2);
       if ($result2->num_rows > 0)
            {
            if($row2 = $result2->fetch_assoc())
              {
                $schoolname= $row2["schoolname"];
                $schooldistrict= $row2["schooldistrict"];
                $schoolpalika=$row2["schoollocallevel"];
                $schoolward=$row2["schoolward"];
                $mode= $row2["priority1model"];
                $letter=$row2["appointletter"];
                $citizenship=$row2["citizenship"];
                $recomand=$row2["schoolrecommend"];
                $province=$row2["province"];
                $ayear=$row2["appointdate"];
                $amonth=$row2["appointmonth"];
                $aday=$row2["appointday"];
                $bank=$row2["bankname"];
                $acno=$row2["bankacno"];
                $pan=$row2["panno"];
                $category=$row2["trainingcategory"];
                $training=$row2["trainingsubject"];
              }
            }
      }
    }
  mysqli_close($conn);
?>
<!-- Including our scripting file. -->
 <script src="script/nepdistrict.js"></script>
<table width="95%" border="1" cellpadding="10" bgcolor="#FFFFFF">
  <tr>
    <td align="center">
<form method="Post" Action="Object/update_teacher_application.php" enctype="multipart/form-data">
<div>
     <h2 class="">शिक्षक तालिम आवेदन फाराम-<?php echo $_SESSION['financial_year'];?></h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
</td>
</tr>
<tr>
  <td>
<form class="">
<div class="">
<h3>क) शिक्षकसँग सम्वन्धित विवरण</h3>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षक काेड <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" size="20"  value="<?php echo $tcode;?>" name="txtcode" readonly="True" required>
    </div>
  </div>
<br>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" size="40" placeholder="पूरा नाम लेख्नुहोस्" value="<?php echo $tname;?>" name="txtteacherName" required>
    </div>
    <div class="label_column">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input type="text" class="custom-input" value="<?php echo $fathername;?>" size="40" placeholder="बाबुको नाम लेख्नुहोस्" name="txtfatherName" required>
    </div>
</div>
<br>
<p align="left"><h3>स्थाइ ठेगाना :</h></p>
<table width="90%" border="0" style="background-color:lightblue;">
  <tr>
    <td><label class="label_text">प्रदेश <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbprovince" id="cmbprovince" required>
        <option value="<?php echo $province;?>"><?php echo $province ;?></option>

    </select></td>
    <td><label class="label_text">जिल्ला <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbdistrictnp" id="cmbdistrictnp" required>
      <option value="<?php echo $d;?>"><?php echo $d ;?></option>
                         </select></td>
</tr>
<tr>
    <td><label class="label_text">स्थानीय तह <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbmunnp" id="cmbmunnp" required>
      <option value="<?php echo $vdc;?>"><?php echo $vdc ;?></option>
						</select></td>
    <td><label class="label_text">वडा <span class="star">*</span></label></td>
    <td><input type="text"  value="<?php echo $ward;?>" placeholder="वडा" size="5" name="txtward" required></td>
</tr>
</table>
  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं <span class="star">*</span></label>
      </div>
      <div>
          <input type="text" class="custom-input" value="<?php echo $tc;?>" placeholder="मोबाइल नं (१० अंक)" name="txtmobileNo" required>
      </div>
      <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">इमेल ठेगाना <span class="star">*</span></label>
      </div>
      <div>
      <input type="text" class="custom-input" size="50" value="<?php echo $email;?>" placeholder="इमेल ठेगाना" name="txtemail" required>
      </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नागरिकता नं <span class="star">*</span></label>
    </div>
    <div>
      <input type="text" class="custom-input" value="<?php echo $citizen;?>" readonly="True" placeholder="नागरिकता नं" name="txtcitizenshipNo" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">जारी गर्ने जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbctzissuedistrict">
      <?php include("nepali_district.htm");?>
      </select>
       </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको साल <span class="star">*</span></label>
    </div>
    <div>
      <input maxlength="4" type="text" placeholder="नियुक्ति साल" value="<?php echo $ayear;?>" size="10" type="text" name="txtappointdate" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text"> महिना <span class="star">*</span></label>
    </div>
    
    <div>
    <select class="custom-combo" name="cmbappointmonth" required>
      <option value="<?php echo $amonth;?>"><?php echo $amonth;?></option>
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
      <label class="label_text"> दिन <span class="star">*</span></label><input type="text" name="txtday" value="<?php echo $aday;?>" size="5" placeholder="दिन" >
    </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbappointdistrict">
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
    <label class="label_text">नियुक्ति भएको विषय <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" type="text" placeholder="विषय लेख्नुहोस्" value="<?php echo $apsubject;?>" name="cmbappointsubject" required>
  </div>
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">बैंकको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" type="text" size="50" value="<?php echo $bank;?>" placeholder="बैंकको नाम" name="txtbankname" required>
  </div>
  <div class="label_column">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">खाता नं <span class="star">*</span></label>
</div>
  <div>
   <input class="custom-input" type="text" value="<?php echo $acno;?>" placeholder="खाता नं" name="txtbankacno" required>
  </div>
</div>
<br>
<div class="custom-grid">
<div class="label_column">  
<label class="label_text">पान नं <span class="star">*</span></label>
</div>
<div>
  <input class="custom-input" type="text" placeholder="पान नं" value="<?php echo $pan;?>" name="txtpanNo" required>
</div>
</div>
 <h3 class="text-xl font-bold text-slate-800">ख) हाल कार्यरत रहेकाे विद्यालयसगँ सम्वन्धित विवरण</h3>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">विद्यालयको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input"  type="text" value="<?php echo $schoolname;?>" size="50" placeholder="विद्यालयको पूरा नाम" name="txtschoolname" required>
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
      <option value="<?php echo $schooldistrict;?>"><?php echo $schooldistrict;?></option>
                         </select>
    </div>

  <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">स्थानीय तह <span class="star">*</span></label>
  </div>
  <div>
    <!--<div id="txtHintschool">Municipality/Rural</div>-->
    <div>
    <select class="custom-combo" name="cmbmunbagamati" id="cmbmunbagamati" required>
      <option value="<?php echo $schoolpalika;?>"><?php echo $schoolpalika;?></option>
                         </select>
</div>
  </div>
  <div class="label_column">
    <label class="label_text">वडा <span class="star">*</span></label>
  </div>
    <div class="label_column">
      <input class="custom-input" type="text" placeholder="वडा" value="<?php echo $schoolward;?>" name="txtschoolward" required>
    </div>
</div>
<h3>ग) तालिम आवश्यकता सम्वन्धी विवरण</h3>
<h4><label style="display:none;" id="tpdlabel">कक्षा तीन सम्म अध्यापन गर्नु हुनेले एकीकृत पाठ्यक्रम (कक्षा १-३) छान्नुहाेस र कक्षा चार देखि माथि अध्यापन गर्नु हुनेले  विषय छान्नु हाेस ।</label></h4>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिन चाहेको विषयक्षेत्र <span class="star">*</span></label>
  </div>
  <div class="content">
    <select id="trainingcategory" name="cmbtrainingcategory" class="custom-combo" required onchange="handleChange()">
      <option value="<?php echo $category;?>"><?php echo $category;?></option>
  <?php
    include("training_category.html");
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
    <select id="trainingsubject" name="cmbsubject" class="custom-combo">
      <option value="<?php echo $training;?>"><?php echo $training;?></option>
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
        let tpdlabel1 = document.getElementById("tpdlabel");
      if(category === "एक महिने प्रमाणीकरण तालिम (TPD)")
        {
          //subject.disabled=false; // enable
            subject.style.display="block";
            subject1.style.display="none";
            tpdlabel1.style.display="block";

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
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता १) <span class="star">*</span></label>
</div>
<div class="content">
  <select name="cmbprioritymode" class="custom-combo" id="txtmode1" required onchange="updatetextbox()">
    <option value="<?php echo $mode;?>"><?php echo $mode;?></option>
  <option value="">छनौट गर्नुहोस्</option>
  <option value="अनलाइन">अनलाइन</option>
  <option value="आमनेसामने">आमनेसामने</option>
  </select>
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
  <label class="label_text">तालिम लिने मोड (प्राथमिकता २) <span class="star">*</span></label>
  </div>
  <div class="content">
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
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">नियुक्ति पत्र <span class="star">*</span></label>
  </div>
  <div class="content">
    <input type="file" name="fileletter">
    <?php
    if($letter<>"")
      {
        ?>
        <a href="application_document\<?php echo $letter;?>" target="_blank"><img src="image/eye.png" width="20" height="15"></a>
      <?php
      }
    ?>
  </div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">नागरिकता प्रमाणपत्र <span class="star">*</span></label>
  </div>
  <div class="content">
    <input  type="file" name="filecitizenship">
    <?php
    if($citizenship<>"")
      {
        ?>
        <a href="application_document\<?php echo $citizenship;?>" target="_blank"><img src="image/eye.png" width="20" height="15"></a>
      <?php
      }
    ?>
</div>
</div>
<br>
<div class="custom-twocolumn">
  <div class="label_column_1">
    <label class="label_text">विद्यालयको सिफारिस पत्र <span class="star">*</span></label>
  </div>
  <div class="content">
    <input  type="file" name="fileschoolrecommend">
    <?php
    if($recomand<>"")
      {
        ?>
        <a href="application_document\<?php echo $recomand;?>" target="_blank"><img src="image/eye.png" width="20" height="15"></a>
      <?php
      }
    ?>
</div>
</div>
</td>
</tr>
<tr>
  <td align="center">
<div>
  <h4>घोषणा</h4>
    <p><!-- <input type="checkbox" value="Verify" name="accept" id="accept" onclick="checkfunction()"> --> मैले यस फाराममा भरेका सबै विवरणहरू सत्य छन्। यदि कुनै विवरण गलत ठहरिएमा मेरो आवेदन रद्द हुने कुरामा म मञ्जुर छु।</p></div></div></section>
              <!-- <input type="button" value="आवेदन पेश गर्नुहोस्" name="btnclientsubmit" disabled="disabled" id="btnclientsubmit" onClick="confSubmit(this.form);">-->
              <input type="submit" value="अपडेट गर्नुहोस्" name="btnsave">
</form>
</td>
</tr>
</table>      
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



