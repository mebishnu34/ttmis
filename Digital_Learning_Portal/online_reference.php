<?php
session_start();
include("php_processing/db_connection.php");
?>
<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="CSS\style_sheet.css"/>
    <link rel="stylesheet" href="CSS\grid.css"/>
    <link rel="stylesheet" href="CSS\gallary.css"/>
    <link rel="stylesheet" href="CSS\slider.css"/>
</head>
<body class="content">
       <header class="header">
            <div class="row">
                <div class="column">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="image\logo.jpg" class="img-fluid main-logo" width="100" height="80"/>
                        <img src="image\banner.jpg" class="img-fluid main-logo" width="300" height="80"/>
                    </a>
                </div>
                <div class="column1">
                    <div class="sub_row">
                        <div class="sub_column1">
                           <div class="title_text"> Digital Learning Portal</div>
                        </div>
                        <div class="sub_column1">
                        <nav class="navigation">   
                            <ul>
                            <li><a href="user_application.php">Home</a></li>
                                <li><a href="read_contents.php">Reading</a></li>
                                <li><a href="audio_reference.php">Audio</a></li>
                                <li><a href="video_reference.php">Video</a></li>
                                <li><a href="online_reference.php">Reference</a></li>
                                <li><a href="gallery.php">Photo Gallery</a></li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
                <div class="column2">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="image\np_flag.gif" class="img-fluid main-logo" width="100" height="80"/>
                    </a>
                </div>
            </div>
        </header>   
    
    <br>
    <div class="details_row">
         <div class="user_list_column_1">
         <div style="background-color:chocolate;font-weight: 900;">
                <br>
                <center>
                <font color="white">
            <?php
                echo $_SESSION['username'];
            ?>
                </font>
                </center>
            </div>
            <header class="user_header_list">   
            <ul id="userhyperlink">
                <li><a href="online_reference.php?subject_id=TPD">Teacher Professional Development</a></li>
                <li><a href="online_reference.php?subject_id=ROT">Resources of Teaching</a></li>
                <li><a href="online_reference.php?subject_id=SLR">Student Learning Resources</a></li>
            </ul>
        </header>
        </div>
        <div class="user_details_column_1">
            <p style="text-align:left;">
            <?php
            if(isset($_GET['subject_id']))
                {
                    $subject=$_GET['subject_id'];
                    //echo $category;
                    if($subject=='TPD')
                    {
                        ?>
                    
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://cehrd.gov.np/infocenter/29" target="_blank">CEHRD</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.oecd.org/berlin/43541636.pdf" target="_blank">OECD</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.britishcouncil.org.np/sites/default/files/continuing_professional_development_-_activities_for_teachers_guide_2.pdf" target="_blank">British Council</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.teachhub.com/professional-development/2019/11/15-professional-development-skills-for-modern-teachers/" target="_blank">15 Professional Development Skills for Modern Teachers</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://uis.unesco.org/en/glossary-term/teachers-professional-development" target="_blank">UNESCO</a><br>
                    <?php
                    include("display_reference.php");
                    ?>
                    
                    
                    <?php
                    }
                    elseif($subject=='ROT')
                    {
                    ?>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.teachingenglish.org.uk/professional-development/teacher-educators/knowing-subject/articles/what-are-learning-resources" target="_blank">Teaching English(British Council)</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.cambridgeenglish.org/teaching-english/resources-for-teachers/" target="_blank">Cambridge English</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.youtube.com/watch?v=6gKul_FuOkE" target="_blank">How to Create Your Own Classroom Resources!</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://teaching.pitt.edu/resources-for-teaching/" target="_blank">Teaching and Learning</a><br>
                    
                    <?php  
                    }
                    elseif($subject=='SLR')
                    {
                    ?>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://olenepal.org/digital-learning-solutions/" target="_blank">Digital Learning Solutions</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://edusanjal.com/blog/online-learning-softwares-in-nepal/" target="_blank">Learning Management System</a><br>
                    
                    <?php  
                    }
                    
                }
                else
                    {
                    ?>
                        &#127909; &nbsp;&nbsp;&nbsp;<a href="https://cehrd.gov.np/infocenter/29" target="_blank">CEHRD</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.oecd.org/berlin/43541636.pdf" target="_blank">OECD</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.britishcouncil.org.np/sites/default/files/continuing_professional_development_-_activities_for_teachers_guide_2.pdf" target="_blank">British Council</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.teachhub.com/professional-development/2019/11/15-professional-development-skills-for-modern-teachers/" target="_blank">15 Professional Development Skills for Modern Teachers</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://uis.unesco.org/en/glossary-term/teachers-professional-development" target="_blank">UNESCO</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.teachingenglish.org.uk/professional-development/teacher-educators/knowing-subject/articles/what-are-learning-resources" target="_blank">Teaching English(British Council)</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.cambridgeenglish.org/teaching-english/resources-for-teachers/" target="_blank">Cambridge English</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://www.youtube.com/watch?v=6gKul_FuOkE" target="_blank">How to Create Your Own Classroom Resources!</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://teaching.pitt.edu/resources-for-teaching/" target="_blank">Teaching and Learning</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://olenepal.org/digital-learning-solutions/" target="_blank">Digital Learning Solutions</a><br>
                    &#127909; &nbsp;&nbsp;&nbsp;<a href="https://edusanjal.com/blog/online-learning-softwares-in-nepal/" target="_blank">Learning Management 
                    <?php
                    }
                    ?>
            </p>
            
            </div>
        </div>
                            
    </div>
<br><br>
<div class="bottom_row">
    <div class="bottom_column">
        
        <u><b>Contact Details:</b></u><br><br>
        Address: Dhulikhel, Kavreplanchwok <br><br>
        Contact No. : +977-11-490353<br><br>
        Email: etckavrebp@gmail.com<br><br>
        Website:<a href="https://etc.mosd.bagamati.gov.np" target="blank"> etc.mosd.bagamati.gov.np</a><br><br>
        <a href="https://ttmis.bagamati.gov.np" target="blank">TTMIS(https://ttmis.bagamati.gov.np)</a><br>
                                
    </div>
    <div class="picture_column_gap"> </div>
    <div class="bottom_column">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3535.3945998488816!2d85.548561!3d27.612293!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2a360fd74f9021a!2sETC%20Kavre!5e0!3m2!1sen!2snp!4v1621760276831!5m2!1sen!2snp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<!--
    <footer class="footer">
            Bigyabigesh Gyan Software Solution
    </footer>
                            -->
</body>
</html>