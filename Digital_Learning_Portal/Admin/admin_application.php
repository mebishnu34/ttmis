<?php
session_start();
if($_SESSION['memlname']<>"")
{
?>
<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="..\CSS\style_sheet.css"/>
    <link rel="stylesheet" href="..\CSS\grid.css"/>
    <link rel="stylesheet" href="..\CSS\gallary.css"/>
    <link rel="stylesheet" href="..\CSS\slider.css"/>
</head>
<body class="content">
       <header class="header">
            <div class="row">
                <div class="column">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="..\image\logo.jpg" class="img-fluid main-logo" width="100" height="80"/>
                        <img src="..\image\banner.jpg" class="img-fluid main-logo" width="300" height="80"/>
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
                                <li><?php echo $_SESSION['username'];?></li>
                                <li><a href="admin_application.php?user=userout">Sign Out</a></li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
                <div class="column2">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="..\image\np_flag.gif" class="img-fluid main-logo" width="100" height="80"/>
                    </a>
                </div>
            </div>
        </header>   
    
    <br>
    <div class="details_row">
         <div class="user_list_column_1">
         <header class="user_header_list">   
            <ul id="userhyperlink">
                <li><a href="admin_application.php?category_id=level">New Level</a></li>
                <li><a href="admin_application.php?category_id=category">New Category</a></li>
                <li><a href="admin_application.php?category_id=subject">New Subject</a></li>
                <li><a href="admin_application.php?category_id=topic">New Topic</a></li>
                <li><a href="admin_application.php?category_id=video">Add Video</a></li>
                <li><a href="admin_application.php?category_id=audio">Add Audio</a></li>
                <li><a href="admin_application.php?category_id=reference">Add Reference</a></li>
                <li><a href="admin_application.php?category_id=reading">Add Reading Reference</a></li>
                <li><a href="admin_application.php?category_id=question">Add Question</a></li>
                <li><a href="admin_application.php?category_id=new_user">New User</a></li>
                <li><a href="admin_application.php?category_id=display_subject">Display Subject</a></li>
                <li><a href="admin_application.php?category_id=display_user">Display User</a></li>
                <li><a href="admin_application.php?category_id=admin_user">Display Admin User</a></li>
                <li><a href="admin_application.php?category_id=display_level">Display Level</a></li>
                <li><a href="admin_application.php?category_id=display_catagory">Display Catagory</a></li>
            </ul>
                
        </header>
        </div>
        <div class="user_details_column_1">
        <div class="user_details_row3">
            <p style="text-align:center;">
            <?php
	if(isset($_GET['category_id']))
		{
			$id=$_GET['category_id'];
				if($id=="level")
					{
						include("level_entry.php");
					}
                elseif($id=="category")
					{
						include("category.php");
					}
				elseif($id=="subject")
					{
						include("subject.php");
					}
                elseif($id=="topic")
					{
						include("content_topic.php");
					}
				elseif($id=="video")
					{
						include("video.php");
					}
				elseif($id=="audio")
					{
						include("audio.php");
					}
				elseif($id=="reference")
					{
						include("hyperlink.php");
					}
				elseif($id=="display_subject")
					{
						include("displaysubject.php");
					}
				elseif($id=="display_user")
					{
						include("display_user.php");
					}
                elseif($id=="admin_user")
					{
						include("display_admin_user.php");
					}
				elseif($id=="new_user")
					{
						include("new_user.php");
					}
				elseif($id=="question")
					{
						include("display_question.php");
					}
                elseif($id=="reading")
					{
						include("add_details.php");
					}
                elseif($id=="display_level")
					{
						include("display_level.php");
					}
                elseif($id=="display_catagory")
					{
						include("display_catagory.php");
					}
			}
		if(isset($_GET['msg']))
			{
				echo $_GET['msg'];
			}
		if(isset($_GET['elink']))
			{
				$id=$_GET['elink'];
				include("edu_news_action.php");
			}
		if(isset($_GET['intlink']))
			{
				$id=$_GET['intlink'];
				include("intnews_action.php");
			}
		?>

            </p>
            </div>
            </div>
        </div>
                            
    </div>
    <?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
<!--
    <footer class="footer">
            Bigyabigesh Gyan Software Solution
    </footer>
                            -->
</body>
</html>
<?php
}
else
{
    header('Location: ..\admin_login.php');
}
if(isset($_GET['user'])=='userout')
{
    $_SESSION['username']="";
    header('Location:../admin_login.php');
    
}

?>