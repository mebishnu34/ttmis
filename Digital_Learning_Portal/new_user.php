<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="CSS\style_sheet.css"/>
    <link rel="stylesheet" href="CSS\grid.css"/>

</head>
<?php
include("collect_script.htm");
?>
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
                        <img src="image\np_flag.gif" class="img-fluid main-logo" width="100" height="80"/>
                    </a>
                </div>
            </div>
        </header>
    
    <br>
       <p style="text-align:center; font-size:20;"> Create New User</p>
        <form action="php_processing/create_new_user.php" method="post" ID="entry_form">
                <table id="entry_table">
                <tr>
                <th>Full Name*</th>
                <td><input type="text" name="username" require></td>
                </tr>
                <tr>
                <th>E-Mail</th>
                <td><input type="text" name="useremail"></td>
                </tr>
                <tr>
                <th>Mobile No.*</th>
                <td><input type="text" name="usermobile" require></td>
                </tr>
            <!--
                <tr>
                <th>Province</th>
                <td><select name="province">
                            <option>Select Province</option>
                            <option>Bagamati</option>
                            <option>Gandaki</option>
                            <option>Koshi</option>
                            <option>Lumbini</option>
                            <option>Madhesh</option>
                            <option>Karnali</option>
                            <option>Sudur Pashchim</option>
                        </select>
                        			
                    
                    </td>
                </tr>
-->
                <tr>
                <th>District</th>
                <td><select name="cmbdistrict" id="cmbdistrict" required>
					    <option value="" selected="selected">Select District</option>
						</select>
                    </td>
                </tr>
                <tr>
                <th>Municipality/VDC</th>
                <td><select name="cmbmun" id="cmbmun" required>
						    <option value="" selected="selected">Select Local Government</option>
						</select>
                    </td>
                </tr>
                <tr>
                <th>Ward No.</th>
                <td><select name="cmbward" id="cmbward" required>
    							<option value="" selected="selected">Ward No.</option>
								</select></td>
                </tr>
                <tr>
                <th>Address</th>
                <td><input type="text" name="useraddress" require></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td>
                        <select name="usertype">
                            <option>Select  User Type</option>
                            <option>Teacher</option>
                            <option>Student</option>
                            <option>Parent</option>
                            <option>Other</option>
                            <option>Resource Person</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" value="Create New User"></td>
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

    
</div>
</body>
</html>