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
  <h2>A ECD शिक्षकका लागि</h2>
    <div>प्रत्येक खण्डमा प्राथमिकता अनुसार छान्नुहोस् (१, २, ३...)</div>

<p align="left" style="background-color:blue; color:#FFFFFF; padding:5px; font-weight: bold;"> Registered ID: <?php echo $needid;?><input type="hidden" value="<?php echo $needid;?>" name="txtneedid">
&nbsp;&nbsp;&nbsp; नाम : <?php echo $tname;?> &nbsp;&nbsp;&nbsp; माेबाइल नम्बर : <?php echo $mobileno;?></p>
<div align="left">
    <h3>१ बाल विकास (Child Development)</h3>
</div>
<div class="custom-grid_1">
    <div class="box">
        <input type="checkbox" value="1" name="checkoption[]">ECD Classroom Setup & Management Training        
</div>
<div class="box">
        <input type="checkbox" value="2" name="checkoption[]">Early Childhood Development (ECD) Basics Training
</div>
  <div class="box">
        <input type="checkbox" value="3" name="checkoption[]">Child Growth & Development Stages Training
    </div>
    <div class="box">
        <input type="checkbox" value="4" name="checkoption[]">Developmental Milestones Assessment Training
    </div>
</div>
<div align="left">
     <h3>२ बालमैत्री शिक्षण विधि (Child-Friendly Pedagogy)</h3>
</div>
<div class="custom-grid_1">
    <div class="box">
        <input type="checkbox" value="5" name="checkoption[]">Play-way Method Training
    </div>
    <div class="box">
        <input type="checkbox" value="6" name="checkoption[]">Activity-Based Learning Training
    </div>
    <div class="box">
        <input type="checkbox" value="7" name="checkoption[]">Montessori Method Training
    </div>
    <div class="box">
        <input type="checkbox" value="8" name="checkoption[]">Storytelling &amp; Creative Teaching Training
    
    </div>
</div>
<div align="left">
३ कक्षा व्यवस्थापन (Classroom Management)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="9" name="checkoption[]">ECD Classroom Setup & Management Training
        </div>
        <div class="box">
        <input type="checkbox" value="10" name="checkoption[]">Positive Discipline Training
        </div>
        <div class="box">
        <input type="checkbox" value="11" name="checkoption[]">Behavior Management Training
        </div>
        <div class="box">
        <input type="checkbox" value="12" name="checkoption[]">Routine & Daily Schedule Planning Training
    </div>
</div>
<div align="left">
<h3>४ भाषा तथा साक्षरता विकास (Language & Literacy)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="13" name="checkoption[]">Early Grade Reading (EGR) Training
        </div>
        <div class="box">
        <input type="checkbox" value="14" name="checkoption[]">Phonics & Pre-literacy Skills Training
        </div>
        <div class="box">
        <input type="checkbox" value="15" name="checkoption[]">Multilingual Education Training
        </div>
        <div class="box">
        <input type="checkbox" value="16" name="checkoption[]">Listening & Speaking Skills Development
    </div>
</div>
<div align="left">
<h3>५ प्रारम्भिक गणित (Early Numeracy)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="17" name="checkoption[]">Pre-Math Concepts Training
        </div>
        <div class="box">
        <input type="checkbox" value="18" name="checkoption[]">Counting & Number Recognition Training
        </div>
        <div class="box">
        <input type="checkbox" value="19" name="checkoption[]">Hands-on Math Activities Training
    </div>
</div>
<div align="left">
<h3>६ सिर्जनशीलता तथा खेलकुद (Creativity & Play)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="20" name="checkoption[]">Art & Craft Activities Training
        </div>
        <div class="box">
        <input type="checkbox" value="21" name="checkoption[]">Music, Dance & Movement Training
        </div>
        <div class="box">
        <input type="checkbox" value="22" name="checkoption[]">Indoor & Outdoor Play Activities Training
    </div>
</div>
<div align="left">
<h3>७ सामाजिक–भावनात्मक विकास (Socio-Emotional Learning)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="23" name="checkoption[]">Social & Emotional Learning (SEL) Training
        </div>
        <div class="box">
        <input type="checkbox" value="24" name="checkoption[]">Child Behavior Understanding Training
        </div>
        <div class="box">
        <input type="checkbox" value="25" name="checkoption[]">Emotional Support & Care Training
    </div>
</div>
<div align="left">
<h3>८ बाल सुरक्षा तथा संरक्षण (Child Protection)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="26" name="checkoption[]">Child Safeguarding Training
        </div>
        <div class="box">
        <input type="checkbox" value="27" name="checkoption[]">Child Rights & Protection Training
        </div>
        <div class="box">
        <input type="checkbox" value="28" name="checkoption[]">Safe Learning Environment Training
    </div>
</div>
<div align="left">
    <h3>९ स्वास्थ्य, पोषण तथा सरसफाइ (Health, Nutrition & Hygiene)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="29" name="checkoption[]">Child Nutrition & Growth Monitoring Training
        </div>
        <div class="box">
        <input type="checkbox" value="30" name="checkoption[]">WASH (Water, Sanitation & Hygiene) Training
        </div>
        <div class="box">
        <input type="checkbox" value="31" name="checkoption[]">First Aid & Basic Health Care Training
    </div>
</div>
<div align="left">
<h3>१० अभिभावक तथा समुदाय सहकार्य (Parent Engagement)</h3>
</div>
<div class="custom-grid_1">
       <div class="box">
        <input type="checkbox" value="32" name="checkoption[]">Parent-Teacher Communication Training
        </div>
        <div class="box">
        <input type="checkbox" value="33" name="checkoption[]">Community Involvement Training
        </div>
        <div class="box">
        <input type="checkbox" value="34" name="checkoption[]">Parenting Education Support Training
    </div>
</div>
<div align="left">
<h3>११ प्रविधि प्रयोग (Technology in ECD)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="35" name="checkoption[]">Digital Learning Tools for ECD
        </div>
        <div class="box">
        <input type="checkbox" value="36" name="checkoption[]">Audio-Visual Teaching Materials Training
        </div>
        <div class="box">
        <input type="checkbox" value="37" name="checkoption[]">Simple ICT Integration Training
    </div>
</div>
<div align="left">
    <h3>१२ मूल्याङ्कन तथा अभिलेख (Assessment & Record Keeping)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="38" name="checkoption[]">Child Progress Assessment Training
        </div>
        <div class="box">
        <input type="checkbox" value="39" name="checkoption[]">Portfolio Development Training
        </div>
        <div class="box">
        <input type="checkbox" value="40" name="checkoption[]">Observation & Reporting Skills
    </div>
</div>
<div align="left">
<h3>१३ समावेशी शिक्षा (Inclusive Education)</h3>
</div>
<div class="custom-grid_1">
        <div class="box">
        <input type="checkbox" value="41" name="checkoption[]">Teaching Children with Disabilities
        </div>
        <div class="box">
        <input type="checkbox" value="42" name="checkoption[]">Inclusive Classroom Strategies
        </div>
        <div class="box">
        <input type="checkbox" value="43" name="checkoption[]">Individual Learning Support Training
    </div>
</div>
<div align="left">
    <h3>१४ समसामयिक तथा नवप्रवर्तन तालिम</h3>
</div>
<div class="custom-grid_1">
       <div class="box">
        <input type="checkbox" value="44" name="checkoption[]">21st Century Skills for Early Learners
        </div>
        <div class="box">
        <input type="checkbox" value="45" name="checkoption[]">Climate Change Awareness for Children
        </div>
        <div class="box">
        <input type="checkbox" value="46" name="checkoption[]">Life Skills Education for ECD
        </div>
        <div class="box">
        <input type="checkbox" value="47" name="checkoption[]">Mental Health & Well-being for Children
    </div>
</div>
<div align="left">
    <h3>१५. माथि वाहेक अरु तालिम आवश्यकता भए</h3>
</div>
    <div>
        <textarea cols="100" rows="5" name="txtothers" placeholder="यहाँ लेख्नुहाेस"></textarea>
    </div>
</div>
<input type="hidden" name="txtcategory" value="ECD शिक्षकका लागि">
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
</form>