<html>
<head>
    <title>Digital Learning Portal</title>
    <link rel="stylesheet" href="../CSS/style_sheet.css"/>
    <link rel="stylesheet" href="../CSS/grid.css"/>
</head>
<body class="content">
       <header class="header">
            <div class="row">
                <div class="column">
                    <a class="navbar-brand" href="../index.php" title="Digital Learning Software">
                        <img src="../image/logo.jpg" class="img-fluid main-logo" width="100" height="80"/>
                        <img src="../image/banner.jpg" class="img-fluid main-logo" width="300" height="80"/>
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
                         
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
                <div class="column2">
                    <a class="navbar-brand" href="index.php" title="Digital Learning Software">
                        <img src="../image/np_flag.gif" class="img-fluid main-logo" width="100" height="80" id="image_effect"/>
                    </a>
                </div>
            </div>
        </header>   
<form action="../php_processing/do_admin_login.php" method="post" ID="normal_form">
<table width="600" align="center" bgcolor="#FFFFFF">
<tr>
<td>&nbsp;</td>
<td rowspan="4" bgcolor="#000066">&nbsp;</td>
</td>
</tr>
<tr>
<td align="right">Login Name</td>
<td><input type="text" name="txtlname"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align="right">Password</td>
<td><input type="password" name="txtpass"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" value="Login" name="btnlogin"></td>
</tr>
</table>
</form>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</body>
</html>
