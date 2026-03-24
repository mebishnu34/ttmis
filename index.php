<?php
session_start();
   $_SESSION['application']="";
   $_SESSION['csrf']="";
   $_SESSION['token']="Stop";
?>
<HTML>
    <Head>
        <title>TTMIS</title>
         <script>
                                    function teacher_login()
                                    {
                                        var div=document.getElementById("teacher");
                                        if(div.style.display=="none")
                                        {
                                            div.style.display="block";
                                            div.style.backgroundColor = "lightblue";
                                            div.style.fontWeight = "bold";   // make text bold
                                            div.style.color = "blue"; 
                                        }
                                        else
                                        {
                                            div.style.display="none";
                                        }
                                    }

                                    function school_login()
                                    {
                                        var div=document.getElementById("school");
                                        if(div.style.display=="none")
                                        {
                                            div.style.display="block";
                                            div.style.backgroundColor = "lightblue";
                                            div.style.fontWeight = "bold";   // make text bold
                                            div.style.color = "blue"; 
                                        }
                                        else
                                        {
                                            div.style.display="none";
                                        }
                                    }

                                    function palika_login()
                                    {
                                        var div=document.getElementById("palika");
                                        if(div.style.display=="none")
                                        {
                                            div.style.display="block";
                                            div.style.backgroundColor = "lightblue";
                                            div.style.fontWeight = "bold";   // make text bold
                                            div.style.color = "blue"; 
                                        }
                                        else
                                        {
                                            div.style.display="none";
                                        }
                                    }
                            </script>
    </head>
<link rel="stylesheet" href="CSS/main_table.css">
<link rel="stylesheet" href="CSS/table_css.css">
<BODY class="bg">
<center>
<table width="100%", border=0 class="logintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b><a href="index.php?home=home">Home</a></b></font></td>
<td colspan="2" valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
</tr>
</table>
<table width="100%", border="0" bgcolor="#FFFFFF">
          <tr >
                    <td align="Center" width="70%" valign="top">
                        <?php
                        if(isset($_GET['accountid']))
                            {
                                if($_GET['accountid']=="newteacher")
                                    {
                                include("school/teacher_reg_request_outer.php");
                                    }
                                if($_GET['accountid']=="newschool")
                                    {
                                        include("municipality/school_registration_1_outer.php");
                                    }
                            }
                        else
                            {
                        ?>
                        <table width="100%", border=0 class="logintable">
                            <tr >
                                <td bgcolor="#0066FF"><font size="+2">
                                <ul>
                                    <font size="+2">
                                    <li><a href="Digital_Learning_Portal/index.php" target="_blank">DIGITAL LEARNING PORTAL</a></li>
                                    <li><a href="https://cgs.mosd.bagamati.gov.np/" target="_blank">वृत्ति मार्गनिर्देशन</a></li>
                                </ul>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <table width="100%", border=0>
                            <tr >
                                <td align="center"><font size="+2"> Notice</td>
                            </tr>
                        </table>
                    <?php
                            }
                        ?>
        			</td>

                    <td align="Right" valign="Top" width="30%">
                       <table width="100%" class="combinelogintable">
                            <tr>
                            <td align="center"><P class="pevent" onclick="teacher_login()">TEACHER LOGIN</P>
                            <div id="teacher" style="display:none;">
                              <form method="Post" Action="Object/user_login.php">
                             <table width="100%" align="center">
                                <tr>
                                    <td align="Right">Login Name</td>
                                    <td><input type="text" name="txtloginname"></td>
                                </tr>
                                <tr>
                                    <td align="Right">Password</td>
                                    <td><input type="Password" name="txtpass"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <a href="index.php?accountid=newteacher">New Account </a><input type="submit" value="Login" class="button" name="btnteacher"> </td>
                                </tr>
                            </table>
                            </form>
                            </div>
                           

                       </td>
                    </tr> 
                    <tr>
                        <td align="center"> 
                           <P class="pevent" onclick="school_login()">SCHOOL LOGIN</P>
                           <div id="school" style="display:none;">
                           <form method="Post" Action="Object/user_login.php">
                           <table width="100%" align="center">
                                <tr>
                                <td align="Right">Login Name</td>
                                <td><input type="text" name="txtloginname"></td>
                                </tr>
                                <tr>
                                <td align="Right">Password</td>
                                <td><input type="Password" name="txtpass"></td>
                                </tr>
                                <tr>
                                <td colspan="2" align="center"><a href="index.php?accountid=newschool">New Account </a><input type="submit" value="Login" class="button" name="btnschool"></td>
                                </tr>
                            </table>
                            </form>
                            </div>
                            </td>
                            </tr>
                            <tr>
                                    <td align="center"><P class="pevent" onclick="palika_login()">PALIKA LOGIN</P>
                                            <div id="palika" style="display:none;">
                                        <form method="Post" Action="Object/user_login.php">
                                            <table width="100%" align="center">
                    <tr>
                    <td align="Right">Login Name</td>
                    <td><input type="text" name="txtloginname"></td>
                    </tr>
                    <tr>
                    <td align="Right">Password</td>
                    <td><input type="Password" name="txtpass"></td>
                    </tr>
                       <tr>
                    <td colspan="2" align="center"><input type="submit" value="Login" class="button" name="btnpalika"></td>
                    </tr>
                    </table>
                    </form>
                </div>
                </td>
                 </tr>
                </table>
               </td>
           </tr>
</table>
<center>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</center>

</BODY>
</HTML>
