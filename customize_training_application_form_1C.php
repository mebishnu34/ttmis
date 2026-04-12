<?php
session_start();
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
  <h2>C प्रअ तथा कर्मचारीहरुका लागि</h2>
    <div>प्रत्येक खण्डमा प्राथमिकता अनुसार छान्नुहोस् (१, २, ३...)</div>
<p align="left" style="background-color:blue; color:#FFFFFF; padding:5px; font-weight: bold;"> Registered ID: <?php echo $needid;?><input type="hidden" value="<?php echo $needid;?>" name="txtneedid">
&nbsp;&nbsp;&nbsp; नाम : <?php echo $tname;?> &nbsp;&nbsp;&nbsp; माेबाइल नम्बर : <?php echo $mobileno;?></p>

<div align="left">
    <h3>१ शैक्षिक नेतृत्व तथा व्यवस्थापन (Educational Leadership & Management)</h3>
</div>
<div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="92" name="checkoption[]">Instructional Leadership Training
    </div>
    <div class="box">
        <input type="checkbox" value="93" name="checkoption[]">Transformational Leadership Training
    </div>
    <div class="box">
        <input type="checkbox" value="94" name="checkoption[]">School Improvement Plan (SIP) Development Training
    </div>
    <div class="box">
        <input type="checkbox" value="95" name="checkoption[]">Strategic Planning & Vision Building Training
    </div>
    <div class="box">
        <input type="checkbox" value="96" name="checkoption[]">Change Management Training
    </div>
    
</div>
<div align="left">
     <h3>२ योजना, अनुगमन तथा मूल्याङ्कन (Planning, Monitoring & Evaluation)</h3>
</div>
<div class="custom-grid_2">
    <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="97" name="checkoption[]">Annual Work Plan (AWP/AIP) Preparation Training
    </div>
    <div class="box">
        <input type="checkbox" value="98" name="checkoption[]">Monitoring & Supervision Skills Training
    </div>
    <div class="box">
        <input type="checkbox" value="99" name="checkoption[]">Result-Based Management (RBM) Training
    </div>
    <div class="box">
        <input type="checkbox" value="100" name="checkoption[]">School Self-Evaluation (SSE) Training
    </div>
    <div class="box">
        <input type="checkbox" value="101" name="checkoption[]">Data Analysis & Evidence-Based Decision Making Training
    </div>
    
</div>
</div>
<div align="left">
<h3>३ वित्तीय तथा प्रशासनिक व्यवस्थापन (Financial & Administrative Management)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="102" name="checkoption[]">School Financial Management Training
    </div>
    <div class="box">
        <input type="checkbox" value="103" name="checkoption[]">Budget Planning & Execution Training
    </div>
    <div class="box">
        <input type="checkbox" value="104" name="checkoption[]">Procurement & Public Financial Procedures Training
    </div>
    <div class="box">
        <input type="checkbox" value="105" name="checkoption[]">Record Keeping & Reporting Training
    </div>
    <div class="box">
        <input type="checkbox" value="106" name="checkoption[]">Audit & Compliance Training
    </div>
    
</div>
</div>
<div align="left">
<h3>४ मानव संसाधन व्यवस्थापन (Human Resource Management)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="107" name="checkoption[]">Teacher Performance Appraisal Training
    </div>
    <div class="box">
        <input type="checkbox" value="108" name="checkoption[]">Staff Motivation & Team Building Training
    </div>
    <div class="box">
        <input type="checkbox" value="109" name="checkoption[]">Conflict Management & Resolution Training
    </div>
    <div class="box">
        <input type="checkbox" value="110" name="checkoption[]">Professional Development Planning Training
    </div>
    <div class="box">
        <input type="checkbox" value="111" name="checkoption[]">Coaching & Mentoring Skills Training
    </div>
    
</div>
</div>
<div align="left">
<h3>५ प्रविधि तथा डिजिटल व्यवस्थापन (ICT & Digital Leadership)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="112" name="checkoption[]">EMIS (Education Management Information System) Training
    </div>
    <div class="box">
        <input type="checkbox" value="113" name="checkoption[]">Digital School Management System Training
    </div>
    <div class="box">
        <input type="checkbox" value="114" name="checkoption[]">ICT Integration in School Administration Training
    </div>
    <div class="box">
        <input type="checkbox" value="115" name="checkoption[]">Data Management & Reporting Tools Training
    </div>
    <div class="box">
        <input type="checkbox" value="116" name="checkoption[]">Cyber Security & Data Protection Training
    </div>
    
</div>
</div>
<div align="left">
<h3>६ समसामयिक तथा क्रस-कटिङ विषयहरू (Contemporary Issues)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_3">
    <div class="box">
        <input type="checkbox" value="117" name="checkoption[]">Gender Equality & Social Inclusion (GESI) Training
    </div>
    <div class="box">
        <input type="checkbox" value="118" name="checkoption[]">Inclusive Education Management Training
    </div>
    <div class="box">
        <input type="checkbox" value="119" name="checkoption[]">Disaster Risk Reduction (DRR) in School Training
    </div>
    <div class="box">
        <input type="checkbox" value="120" name="checkoption[]">Climate Change & Environmental Education Leadership
    </div>
    <div class="box">
        <input type="checkbox" value="121" name="checkoption[]">Child Protection & Safeguarding Training
    </div>
    <div class="box">
        <input type="checkbox" value="122" name="checkoption[]">Mental Health & Psychosocial Support Training
    </div>
    <div class="box">
        <input type="checkbox" value="123" name="checkoption[]">Life Skills & Citizenship Education Leadership
    </div>
    <div class="box">
        <input type="checkbox" value="124" name="checkoption[]">Anti-bullying & Safe School Environment Training
    </div>
    
</div>
</div>
<div align="left">
<h3>७ समुदाय तथा सरोकारवाला सहकार्य (Stakeholder Engagement)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="125" name="checkoption[]">Parent-Teacher Engagement Training
    </div>
    <div class="box">
        <input type="checkbox" value="126" name="checkoption[]">Community Mobilization Training
    </div>
    <div class="box">
        <input type="checkbox" value="127" name="checkoption[]">School-Community Partnership Training
    </div>
    <div class="box">
        <input type="checkbox" value="128" name="checkoption[]">Local Government Coordination Training
    </div>
    <div class="box">
        <input type="checkbox" value="129" name="checkoption[]">Communication & Public Relations Skills Training
    </div>
    
</div>
</div>
<div align="left">
<h3>८ नवप्रवर्तन तथा गुणस्तर सुधार (Innovation & Quality Improvement)</h3>
</div>
<div class="custom-grid_2">
        <div class="custom-grid_2">
    <div class="box">
        <input type="checkbox" value="130" name="checkoption[]">Quality Assurance in Education Training
    </div>
    <div class="box">
        <input type="checkbox" value="131" name="checkoption[]">Innovation in Teaching & Learning Leadership
    </div>
    <div class="box">
        <input type="checkbox" value="132" name="checkoption[]">21st Century Skills Integration Training
    </div>
    <div class="box">
        <input type="checkbox" value="133" name="checkoption[]">Blended Learning & Digital Transformation Training
    </div>
    <div class="box">
        <input type="checkbox" value="135" name="checkoption[]">School Branding & Institutional Development Training
    </div>
    
</div>
</div>
<div align="left">
    <h3>९. माथि वाहेक अरु तालिम आवश्यकता भए</h3>
</div>
    <div>
        <textarea cols="100" rows="5" name="txtothers" placeholder="यहाँ लेख्नुहाेस"></textarea>
    </div>
</div>
<input type="hidden" name="txtcategory" value="प्रअ तथा कर्मचारीहरुका लागि">
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
