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
            
            <?php
                if(isset($_GET['subject_id']))
                {
                $_SESSION['subject']=$_GET['subject_id'];
                }
                    //echo $_SESSION['subject'];
                if($_SESSION['subject']=="TPD")
                    {
                    ?>
                 <font size="3" color="yellow"><b><u>   Teacher Professional Development </u> </b></font>
                <div class="droplist">
                    <?php
                    $sql="Select subjectid, subject from tblsubject ORDER BY subject";
                    $result=$conn->query($sql);
                    while($data=$result->fetch_assoc())
                        {
                        $id=$data["subjectid"];
                    ?>
                        <li><?php echo $data["subject"];?></li>
                        <ul class="list-categories">
                            <?php
                            $sql1="Select id, levelid,content_topic from tbltopic where subjectid='$id' and categoryid=3";
                            $topicresult=$conn->query($sql1);
                            while($topicdata=$topicresult->fetch_assoc())
		                        {
			                     echo "<li><a href=subject_audio_reference.php?topic_id=". $topicdata["id"] .">". $topicdata["content_topic"]."</a></li>";
                                }
                            ?>
                        </ul>
                <?php
                        }
                    ?>
                </div>
                <?php
                    }
                    elseif($_SESSION['subject']=="ROT")
                    {
                    ?>
                    <font size="3" color="yellow"><b><u>   Resources of Teaching </u> </b></font>
                    
                    <div class="droplist">
                    <?php
                    $sql="Select subjectid, subject from tblsubject ORDER BY subject";
                    $result=$conn->query($sql);
                    while($data=$result->fetch_assoc())
                        {
                        $id=$data["subjectid"];
                    ?>
                        <li><?php echo $data["subject"];?></li>
                        <ul class="list-categories">
                            <?php
                            $sql1="Select id, levelid,content_topic from tbltopic where subjectid='$id' and categoryid=4";
                            $topicresult=$conn->query($sql1);
                            while($topicdata=$topicresult->fetch_assoc())
		                        {
			                     echo "<li><a href=subject_audio_reference.php?topic_id=". $topicdata["id"] .">". $topicdata["content_topic"]."</a></li>";
                                }
                            ?>
                        </ul>
                <?php
                        }
                    ?>
                </div>
                <?php
                    }
                    elseif($_SESSION['subject']=="SLR")
                    {
                    ?> 
                    <font size="3" color="yellow"><b><u>   Student Learning Resources </u> </b></font>
                
                <div class="droplist">
                    <?php
                    $sql="Select subjectid, subject from tblsubject ORDER BY subject";
                    $result=$conn->query($sql);
                    while($data=$result->fetch_assoc())
                        {
                        $id=$data["subjectid"];
                    ?>
                        <li><?php echo $data["subject"];?></li>
                        <ul class="list-categories">
                            <?php
                            $sql1="Select id, levelid,content_topic from tbltopic where subjectid='$id' and categoryid=5";
                            $topicresult=$conn->query($sql1);
                            while($topicdata=$topicresult->fetch_assoc())
		                        {
			                     echo "<li><a href=subject_audio_reference.php?topic_id=". $topicdata["id"] .">". $topicdata["content_topic"]."</a></li>";
                                }
                            ?>
                        </ul>
                <?php
                        }
                    ?>
                </div>
                <?php
                    }
                
                ?>
        </header>
        </div>
        <div class="user_details_column_1">
            <p style="text-align:center;">
            <?php
            if(isset($_GET['topic_id']))
                {
                    $id=$_GET['topic_id'];
                    include("display_audio.php");
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