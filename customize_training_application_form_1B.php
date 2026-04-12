<?php
if(isset($_SESSION['mobileno']))
    {
$mobileno=$_SESSION['mobileno'];
include("Processing/db_connection.php");
$sql1 = "SELECT needid,needname FROM tbltrainingneed where mobileno='".$mobileno."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
    {
    if($row = mysqli_fetch_array($result))
        {
            $needid=$row["needid"];
            $tname=$row["needname"];


?>

<form method="Post" Action="Object/save_training_for_schoolteacher.php" enctype="multipart/form-data">
<div>
     <h2 class="">Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम</h2>
     <p class="icon">कृपया तलका विवरणहरू ध्यानपूर्वक भर्नुहोस्।</p>
</div>
  <h2>B विद्यालयतहका शिक्षकका लागि</h2>
    <div>प्रत्येक खण्डमा प्राथमिकता अनुसार छान्नुहोस् (१, २, ३...)</div>
<p align="left" style="background-color:blue; color:#FFFFFF; padding:5px; font-weight: bold;"> Registered ID: <?php echo $needid;?><input type="hidden" value="<?php echo $needid;?>" name="txtneedid">
&nbsp;&nbsp;&nbsp; नाम : <?php echo $tname;?> &nbsp;&nbsp;&nbsp; माेबाइल नम्बर : <?php echo $mobileno;?></p>

<div align="left">
    <h3>१ शैक्षिक तथा पेडागोजिकल तालिम</h3>
</div>
<div class="custom-grid_2">
 <div class="box">
        <input type="checkbox" value="48" name="checkoption[]">Competency-Based Teaching Training        
</div>
<div class="box">
        <input type="checkbox" value="49" name="checkoption[]">Student-Centered Learning Strategies
</div>
  <div class="box">
        <input type="checkbox" value="50" name="checkoption[]">Project-Based Learning (PBL) Training
    </div>
    <div class="box">
        <input type="checkbox" value="51" name="checkoption[]">Differentiated Instruction Training
    </div>
<div class="box">
        <input type="checkbox" value="52" name="checkoption[]">Continuous Assessment & Formative Evaluation Training
</div>
  <div class="box">
        <input type="checkbox" value="53" name="checkoption[]">Multilingual Classroom Management Training
    </div>
    <div class="box">
        <input type="checkbox" value="54" name="checkoption[]">Remedial Teaching Techniques Training
    </div>
    <div class="box">
        <input type="checkbox" value="55" name="checkoption[]">Early Grade Reading & Numeracy Training
    </div>
<
</div>
<div align="left">
     <h3>२ प्रविधि तथा डिजिटल तालिम</h3>
</div>
<div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="56" name="checkoption[]">ICT Integration in Classroom Training
    </div>
    <div class="box">
        <input type="checkbox" value="57" name="checkoption[]">Digital Content Creation (Video, PPT, e-content) Training
    </div>
    <div class="box">
        <input type="checkbox" value="58" name="checkoption[]">Learning Management System (LMS) Training
    </div>
    <div class="box">
        <input type="checkbox" value="59" name="checkoption[]">AI Tools in Education (ChatGPT, AI Teaching Assistants) Training
    
    </div>
    <div class="box">
        <input type="checkbox" value="60" name="checkoption[]">Smart Board / Smart Classroom Operation Training
    </div>
    <div class="box">
        <input type="checkbox" value="61" name="checkoption[]">Cyber Safety & Digital Ethics Training
    </div>
    <div class="box">
        <input type="checkbox" value="62" name="checkoption[]">Online Assessment Tools (Google Forms, Kahoot) Training
    </div>
    
</div>
<div align="left">
<h3>३ शिक्षक पेशागत विकास तालिम</h3>
</div>
<div class="custom-grid_2">
        <div class="box">
        <input type="checkbox" value="63" name="checkoption[]">Classroom Management & Discipline Training
        </div>
        <div class="box">
        <input type="checkbox" value="64" name="checkoption[]">Reflective Teaching & Self-Evaluation Training
        </div>
        <div class="box">
        <input type="checkbox" value="65" name="checkoption[]">Reflective Teaching & Self-Evaluation Training
        </div>
        <div class="box">
        <input type="checkbox" value="66" name="checkoption[]">Teacher Professional Ethics Training
    </div>
    <div class="box">
        <input type="checkbox" value="67" name="checkoption[]">Communication & Presentation Skills Training
        </div>
        <div class="box">
        <input type="checkbox" value="68" name="checkoption[]">Stress Management & Well-being Training
        </div>
        <div class="box">
        <input type="checkbox" value="69" name="checkoption[]">Time Management Training
        </div>
        <div class="box">
        <input type="checkbox" value="70" name="checkoption[]">Life Skills Education Training
        </div>
        
</div>
<div align="left">
<h3>४ समसामयिक तथा क्रस-कटिङ विषयहरू</h3>
</div>
<div class="custom-grid_3">
        <div class="box">
        <input type="checkbox" value="71" name="checkoption[]">Gender Equality & Social Inclusion (GESI) Training
        </div>
        <div class="box">
        <input type="checkbox" value="72" name="checkoption[]">Climate Change & Environmental Education Training
        </div>
        <div class="box">
        <input type="checkbox" value="73" name="checkoption[]">Disaster Risk Reduction (DRR) in Schools Training
        </div>
        <div class="box">
        <input type="checkbox" value="74" name="checkoption[]">Mental Health & Psychosocial Support Training
        </div>
        <div class="box">
        <input type="checkbox" value="75" name="checkoption[]">Child Protection & Safeguarding Training
        </div>
        <div class="box">
        <input type="checkbox" value="76" name="checkoption[]">Sexual & Reproductive Health Education Training
        </div>
        <div class="box">
        <input type="checkbox" value="77" name="checkoption[]">Peace Education & Conflict Management Training
        </div>
        <div class="box">
        <input type="checkbox" value="78" name="checkoption[]">Financial Literacy Education Training
        </div>
        <div class="box">
        <input type="checkbox" value="79" name="checkoption[]">Career Guidance & Counseling Training
        </div>
        <div class="box">
        <input type="checkbox" value="80" name="checkoption[]">Global Citizenship Education (GCED) Training
        </div>
        
</div>
<div align="left">
<h3>५ विषयगत (Subject-Specific) तालिम</h3>
</div>
<div class="custom-grid_2">
        <div class="box">
        <input type="checkbox" value="81" name="checkoption[]">गणित
        </div>
        <div class="box">
        <input type="checkbox" value="82" name="checkoption[]">विज्ञान तथा प्रविधि
        </div>
        <div class="box">
        <input type="checkbox" value="83" name="checkoption[]">नेपाली
        </div>
        <div class="box">
        <input type="checkbox" value="84" name="checkoption[]">अंग्रेजी
        </div>
        <div class="box">
        <input type="checkbox" value="85" name="checkoption[]">सामाजिक अध्ययन
        </div>
        <div class="box">
        <input type="checkbox" value="86" name="checkoption[]">Optional / Technical Subjects
        </div>
        
</div>
<div align="left">
<h3>६ नवप्रवर्तन तथा विशेष तालिम</h3>
</div>
<div class="custom-grid_2">
        <div class="box">
        <input type="checkbox" value="87" name="checkoption[]">21st Century Skills Training (Critical Thinking, Creativity)
        </div>
        <div class="box">
        <input type="checkbox" value="88" name="checkoption[]">Innovation in Teaching & Learning Training
        </div>
        <div class="box">
        <input type="checkbox" value="99" name="checkoption[]">Educational Technology Innovation Training
        </div>
        <div class="box">
        <input type="checkbox" value="90" name="checkoption[]">Blended Learning Design Training
        </div>
        <div class="box">
        <input type="checkbox" value="91" name="checkoption[]">Inclusive Technology Training (Special Needs Students)
        </div>
        
</div>
<div align="left">
<h3>७. माथि वाहेक अरु तालिम आवश्यकता भए</h3>
</div>
    <div>
        <textarea cols="100" rows="5" name="txtothers" placeholder="यहाँ लेख्नुहाेस"></textarea>
    </div>
</div>
<input type="hidden" name="txtcategory" value="विद्यालयतहका शिक्षकका लागि">
<br><br>
<div style="background-color: blue; padding: 10px; width:400px;">
<a href="index.php?accountid=customize_training"><b>पछाडि जानुहाेस</b></a> &nbsp;&nbsp;&nbsp;
<input type="Submit" value="सेभ गर्नुहाेस" name="btnasave">
</div>
<?php
        }
    }
}
else
    {
         $_SESSION['response']="तालिमकाे खण्ड छनाेट भएकाे छैन ।";
        header('Location: ../index.php?accountid=customize_training');   
    }
?>