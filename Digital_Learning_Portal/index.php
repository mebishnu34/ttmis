<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="CSS\style_sheet.css"/>
    <link rel="stylesheet" href="CSS\grid.css"/>
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
                                <li><a href="index.php?click_id=home">Home</a></li>
                                <li><a href="#?click_id=reading">Reading</a></li>
                                <li><a href="#?click_id=audio">Audio</a></li>
                                <li><a href="#?click_id=video">Video</a></li>
                                <li><a href="#?click_id=reference">Reference</a></li>
                                <li><a href="#?click_id=contact">Contact</a></li>
                                <li><a href="gallery.php">Photo Gallery</a></li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
                <div class="column2">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="image\np_flag.gif" class="img-fluid main-logo" width="100" height="80" id="image_effect"/>
                    </a>
                </div>
            </div>
        </header>   
    
    <br>
    <div class="details_row">
        <div class="details_column">
            <p style="text-align:center;">
                <img src="image\office_image.jpg" width="800" height="300">
                <?php
                if(isset($_GET['click_id']))
                {
                    $category=$_GET['click_id'];
                    //echo $category;
                    if($category=='home')
                    {
                        
                    }
                    elseif($category=="video")
                    {
                        echo "Video";
                    }
                }
                ?>

            </p>
            <h1>Introduction</h1>
            <p class="text_style">
            Government of Province has linked education training of the teacher and also with their capacity development and has recognized development of education helps to consolidate national sprit, pride and integration among the students. For this, Government of province has developed policy and strategies to develop education facilities for all people.
            To achieve the goal and vision by Government of Province, Bagamati Province has allocated budget to develop 'Digital Learning Software' for teacher and students. It is required to develop various prospective of digital learning tools offer a wealth of learning resources in a variety of formats like e-books, videos, audio files, animations, and more. This diversity allows learners to address different types of learners and develop their understanding and skills in different ways. This software enables the online delivery of educational material and provides an interactive learning experience for teacher and student.

            To materialize the planned development of Digital Learning Software , the Bagamati Province Government, Ministry of Social Development intends to prepare a Digital Learning Software.  In this context, Education Training center, Dhulikhel, Kavreplanchwok is seeking to hire separate consultancy firms for its consulting services for the preparation of said program. 
            </p>
            <div class="details_row1">
                <div class="picture_column"><img src="digital_image\class.jpg" width="180" height="200"></div>
                <br><br><br><br><br><br><br>
                <div class="picture_column_gap">&nbsp;</div>
                <div class="picture_column"><img src="digital_image\onlineexam.jpg" width="180" height="200"></div><br><br><br><br><br><br><br><br>
                <div class="picture_column_gap">&nbsp;</div>
                <div class="text_scroll">Government of Province has linked education training of the teacher and also with their capacity development and has recognized development of education helps to consolidate national sprit, pride and integration among the students. For this, Government of province has developed policy and strategies to develop education facilities for all people.
            To achieve the goal and vision by Government of Province, Bagamati Province has allocated budget to develop 'Digital Learning Software' for teacher and students. It is required to develop various prospective of digital learning tools offer a wealth of learning resources in a variety of formats like e-books, videos, audio files, animations, and more. This diversity allows learners to address different types of learners and develop their understanding and skills in different ways. This software enables the online delivery of educational material and provides an interactive learning experience for teacher and student.
                </div>
            </div>
        </div>
        <div class="list_column">
        <header class="header_list">
        <ul id="hyperlink">
                <li><a href="teacher_professional_development.php">Teacher Professional Development</a></li>
                <li><a href="teaching_resources.php">Resources of Teaching</a></li>
                <li><a href="student_learning_resources.php">Student Learning resources</a></li>
            </ul>
            
            <div class="round_corner">
           
            <form action="php_processing/do_login.php" method="post" ID="login_form">
                <table id="login_table">
                <tr>
                    <td>User</td>
                    <td><input type="text" name="txtlname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="txtpass"></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" value="Login">&nbsp;&nbsp;<a href="new_user.php" class="alink1">New User?</a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                            if(isset($_GET['msg']))
	                            {
		                            echo $_GET['msg'];
	                            }
                            ?>
                    </td>
                </tr>
                </table>
            </form>
            <p class="text_style1">                   
            <img src="image\training_chief.jpeg" width="180" height="230" style="border-radius: 10%;"><br>
                                Rudrahari Bhandari<br>Head of Training</p>
            </div>
            </header>
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