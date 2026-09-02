<?php
session_start();
$_SESSION['financial_year']="2083/084";
?>
<HTML>
    <Head>
        <title>TTMIS</title>
         <script src="script/nepdistrict.js"></script>
         <link rel="stylesheet" href="CSS/main_table.css">
<link rel="stylesheet" href="CSS/table_css.css">
<link rel="stylesheet" href="CSS/div_column.css">
<link rel="stylesheet" href="CSS/form.css">
    </head>

<BODY>
<!-- Including our scripting file. -->
<center>
<?php
include("Processing/db_connection.php");
if(isset($_GET['tid']))
{
$appid = $_GET['tid'];
$sql1 = "SELECT tname,
                teachercode,
		            runtrainingid,
		            groupnumber,
                gender,
                teacherdob,
                fathername,
                province,
                district,
                munvdc,
                wardno,
                mobileno,
                email,
                citizenshipno,
                issuedistrict,
                appointdate,
                appointmonth,
                appointday,
                praappointdate,
                appointdistrict,
                appointlocallevel,
                appointsubject,
                bankname,
                acholdername,
                bankacno,
                panno,
                teacherclass,
                schoolname,
                schoolprovince,
                schooldistrict,
                schoollocallevel,
                schoolward,
                trainingcategory,
                trainingsubject,
                priority1model,
                priority2model,
                appointletter,
                citizenship,
                schoolrecommend,
                passportphoto,
                financialyear,
                remark FROM tblapplication where appid='".$appid."'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0)
    {
      if($row = $result1->fetch_assoc())
            {
            $tname=$row["tname"];
            $dob=$row["teacherdob"];
            $optgender=$row["gender"];
            $fathername=$row["fathername"];
            $mobileno=$row["mobileno"];
            $citizen=$row["citizenshipno"];
            $issuedistrict=$row["issuedistrict"];
            $appointdate=$row["appointdate"];
            $appointmonth=$row["appointmonth"];
            $appointday=$row["appointday"];
            $appointdistrict=$row["appointdistrict"];
            $appointlocallevel=$row["appointlocallevel"];
            $appointsubject=$row["appointsubject"];
            $bankname=$row["bankname"];
            $accountholder=$row["acholdername"];
            $bankacno=$row["bankacno"];
            $panno=$row["panno"];
            $province=$row["province"];
            $district=$row["district"];
            $munvdc=$row["munvdc"];
            $wardno=$row["wardno"];
            $email=$row["email"];
            $class=$row["teacherclass"];
            $category= $row["trainingcategory"];
            $subject=$row["trainingsubject"];
            $applevel=$row["appointlocallevel"];
            $sdistrict=$row["schooldistrict"];
            $slevel=$row["schoollocallevel"];
            $model= $row["priority1model"];
            $sname=$row["schoolname"];
            $schoolward=$row["schoolward"];
            $ayear=$row["appointdate"];
            $amonth=$row["appointmonth"];
            $aday=$row["appointday"];
            $apsubject=$row["appointsubject"];
            $letter=$row["appointletter"];
            $citizenship=$row["citizenship"];
            $recomend=$row["schoolrecommend"];
            $photo=$row["passportphoto"];
           }
    }
?>
 <form method="Post" Action="Object/update_teacher_application.php" enctype="multipart/form-data">
<div>
     <h2 class="">शिक्षक तालिम आवेदन फाराम ( <?php echo $_SESSION['financial_year'];?> )</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
     
</div>
<form class="">
<div class="">
<h3>खण्ड - क ) शिक्षकसँग सम्वन्धित विवरण</h3>
<input type="hidden" value="<?php echo $_SESSION['financial_year'];?>" name="txtfyear">
</div>
<div class="custom-grid">
    <div class="label_column">
        <label class="label_text">शिक्षकको नाम <span class="star">*</span></label>
    </div>
    <div>
      <input type="hidden" value="<?php echo $appid;?>" name="txtapplicationid" required>
        <input class="custom-input" size="40" value="<?php echo $tname;?>" name="txtteacherName" required>
    </div>
    <div class="label_column">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <label class="label_text">लिङ्ग<span class="star">*</span></label>
    </div>
    <div>
      <?php
        if($optgender=="पुरुष")
          {
            echo '<input type="Radio" value="पुरुष" name="optgender" checked>पुरुष&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          }
        else
          {
            echo '<input type="Radio" value="पुरुष" name="optgender">पुरुष&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          }
        if($optgender=="महिला")
          {
            echo '<input type="Radio" value="महिला" name="optgender" checked>महिला &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          }
        else
          {
            echo '<input type="Radio" value="महिला" name="optgender">महिला &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          }
        if($optgender=="अन्य")
          {
            echo '<input type="Radio" value="अन्य" name="optgender" checked>अन्य';
          }
        else
          {
            echo '<input type="Radio" value="अन्य" name="optgender">अन्य';
          }
      ?>
    </div>
</div>
<br>
<div class="custom-grid">
     <div class="label_column">
   <label class="label_text">जन्ममिति<span class="star">*</span></label>
    </div>
    <div>

<input type="text" name="txtdob" id="date" maxlength="10" value="<?php echo $dob;?>" required>

</div>
</div>

<br>
<div class="custom-grid">
     <div class="label_column">
   <label class="label_text">बाबुको नाम थर<span class="star">*</span></label>
    </div>
    <div>
        <input class="custom-input" size="40" value="<?php echo $fathername;?>" name="txtfatherName" required>
    </div>
</div>
<br>
<p align="left"><h3>स्थायी ठेगाना :</h></p>
<table width="90%" border="0" style="background-color:lightblue;">
  <tr>
    <td><label class="label_text">प्रदेश <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbprovince" id="cmbprovince" required>
              <option value="<?php echo $province; ?>" selected><?php echo $province; ?></option>
    </select></td>
    <td><label class="label_text">जिल्ला <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbdistrictnp" id="cmbdistrictnp" required>
      <option value="<?php echo $district; ?>" selected><?php echo $district; ?></option>
                         </select></td>
</tr>
<tr>
    <td><label class="label_text">स्थानीय तह <span class="star">*</span></label></td>
    <td><select class="custom-combo" name="cmbmunnp" id="cmbmunnp" required>
      <option value="<?php echo $munvdc; ?>" selected><?php echo $munvdc; ?></option>
						</select></td>
    <td><label class="label_text">वडा <span class="star">*</span></label></td>
    <td><input class="custom-input_number" placeholder="वडा" size="5" name="txtward" value="<?php echo $wardno;?>" required></td>
</tr>
</table>

  <br>
<div class="custom-grid">
      <div class="label_column">
        <label class="label_text">मोबाइल नं <span class="star">*</span></label>
      </div>
      <div>
          <input class="custom-input" value="<?php echo $mobileno;?>" name="txtmobileNo" required>
      </div>
      <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">इमेल ठेगाना <span class="star">*</span></label>
      </div>
      <div>
      <input class="custom-input" size="50" value="<?php echo $email;?>" name="txtemail" required>
      </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नागरिकता नं <span class="star">*</span></label>
    </div>
    <div>
      <input class="custom-input" value="<?php echo $citizen;?>" name="txtcitizenshipNo" required>
    </div>
    <div class="label_column">
      <label class="label_text">नागरिकता जारी गर्ने जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbctzissuedistrict">
        <option value="<?php echo $issuedistrict; ?>" selected><?php echo $issuedistrict; ?></option>
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
      <input maxlength="4" value="<?php echo $appointdate;?>" size="10" type="text" name="txtappointdate" required>
    </div>
    <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text"> महिना <span class="star">*</span></label>
    </div>
    
    <div>
    <select class="custom-combo" name="cmbappointmonth" required>
        <option value="<?php echo $appointmonth;?>"><?php echo $appointmonth;?></option>
        <option value="१">१</option>
        <option value="२">२</option>
        <option value="३">३</option>
        <option value="४">४</option>
        <option value="५">५</option>
        <option value="६">६</option>
        <option value="७">७</option>
        <option value="८">८</option>
        <option value="९">९</option>
        <option value="१०">१०</option>
        <option value="११">११</option>
        <option value="१२">१२</option>
      </select>
      &nbsp;&nbsp;&nbsp;<label class="label_text"> गते <span class="star">*</span></label><input class="custom-input_number" type="text" name="txtday" size="5" value="<?php echo $aday;?>" required>
    </div>
  </div>
  <br>
<div class="custom-grid">
    <div class="label_column">
      <label class="label_text">नियुक्ति भएको जिल्ला <span class="star">*</span></label>
    </div>
    <div>
      <select class="custom-combo" name="cmbappointdistrict">
        <option value="<?php echo $appointdistrict; ?>" selected><?php echo $appointdistrict; ?></option>
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
      <option value="<?php echo $appointlocallevel; ?>" selected><?php echo $appointlocallevel; ?></option>
      
         <?php
            include("level.htm");
        ?>
  </select>
  </div>
  <div class="label_column">
    <label class="label_text" style="display:none;" id="appointsublevelid">नियुक्ति भएको विषय <span class="star">*</span></label>
  </div>
  <div>
    <select name="cmbappointsubject" id="appointsubjectid" style="display:none;" class="custom-combo">
      <option value="<?php echo $appointsubject; ?>" selected><?php echo $appointsubject; ?></option>
        <option value="सामाजिक अध्ययन">सामाजिक अध्ययन</option>
         <option value="विज्ञान तथा प्रविधि">विज्ञान तथा प्रविधि</option>
         <option value="ऐच्छिक विषय">ऐच्छिक विषय</option>
          <option value="अंग्रेजी">अंग्रेजी</option>
         <option value="नेपाली">नेपाली</option>
         <option value="गणित">गणित</option>
         <option value="स्वास्थ्य शारिरीक">स्वास्थ्य शारिरीक</option>
         <option value="लेखा">लेखा</option>
             </select>
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
    <input class="custom-input" size="50" value="<?php echo $bankname;?>" name="txtbankname" required oninput="this.value = this.value.replace(/[^A-Za-z ]/g, ''">
  </div>
  
</div>
<br>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">तपाईको बैंक खातामा भएको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" value="<?php echo $accountholder;?>" name="txtaccountholder" required oninput="this.value = this.value.replace(/[^A-Za-z ]/g, ''">
  </div>
  <div class="label_column">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">खाता नं <span class="star">*</span></label>
</div>
  <div>
   <input class="custom-input" value="<?php echo $bankacno;?>" name="txtbankacno" required  oninput="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, ''">
  </div>
</div>
<br>

<div class="custom-grid">
<div class="label_column">  
<label class="label_text">पान नं <span class="star">*</span></label>
</div>
<div>
  <input class="custom-input"  name="txtpanNo" value="<?php echo $panno;?>" required oninput="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, ''">
</div>
</div>
 <h3 class="text-xl font-bold text-slate-800">खण्ड -ख) हाल कार्यरत रहेकाे विद्यालयसगँ सम्वन्धित विवरण</h3>
<div class="custom-grid">
  <div class="label_column">
    <label class="label_text">विद्यालयको नाम <span class="star">*</span></label>
  </div>
  <div>
    <input class="custom-input" size="50" value="<?php echo $sname;?>" name="txtschoolname" required>
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
      <option value="<?php echo $sdistrict; ?>" selected><?php echo $sdistrict; ?></option>
                         </select>
    </div>

  <div class="label_column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="label_text">स्थानीय तह <span class="star">*</span></label>
  </div>
  <div>
    <!--<div id="txtHintschool">Municipality/Rural</div>-->
    <div>
    <select class="custom-combo" name="cmbmunbagamati" id="cmbmunbagamati" required>
      <option value="<?php echo $slevel; ?>" selected><?php echo $slevel; ?></option>
                         </select>
</div>
  </div>
  <div class="label_column">
    <label class="label_text">वडा <span class="star">*</span></label>
  </div>
    <div class="label_column">
      <input class="custom-input_number"  name="txtschoolward" value="<?php echo $schoolward;?>" required>
    </div>
</div>
<div>
   <input type="submit" value="अपडेट गर्नुहोस्" name="btnsave">
</form>
</center>
</body>
</html>      
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
<?php
}
?>


