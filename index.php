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
<link rel="stylesheet" href="CSS/div_column.css">
<link rel="stylesheet" href="CSS/form.css">
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
                    
                        <?php
                        if(isset($_GET['accountid']))
                            {
                                echo "<td align=Center width=70% valign=top>";
                                if($_GET['accountid']=="newteacher")
                                    {
                                include("school/teacher_reg_request_outer.php");
                                    }
                                elseif($_GET['accountid']=="newschool")
                                    {
                                        include("municipality/school_registration_1_outer.php");
                                    }
                                elseif($_GET['accountid']=="application_form")
                                    {
                                        include("training_application_form.php");
                                    }
                                elseif($_GET['accountid']=="roster_form")
                                    {
                                        include("trainer_application_form.php");
                                    }
                                elseif($_GET['accountid']=="customize_training")
                                    {
                                        include("customize_training_application_form.php");
                                    }
                                elseif($_GET['accountid']=="application_form_1")
                                    {
                                        include("customize_training_application_form_1.php");
                                    }
                                elseif($_GET['accountid']=="application_form_2")
                                    {
                                        include("customize_training_application_form_2.php");
                                    }
                                elseif($_GET['accountid']=="application_form_1B")
                                    {
                                        include("customize_training_application_form_1B.php");
                                    }
                                elseif($_GET['accountid']=="application_form_1C")
                                    {
                                        include("customize_training_application_form_1C.php");
                                    }
                                elseif($_GET['accountid']=="application_formmoreinfo")
                                    {
                                        include("customize_training_application_form_moreinfo.php");
                                    }
                            echo "</td>";
                            }

                        else
                            {
                        ?>
                        <td align="Center" width="30%" valign="top">
                        <table width="100%", border="0" class="logintable" cellpadding="5s">
                            <tr >
                                <td bgcolor="#FFFFFF" align="center"><font size="+1" face="Kantipur" color="#000000">
                            <p align="justify"><b>तालिम लिन इच्छुक शिक्षकहरुले तलको आवेदन फाराम लिंकमा क्लिक गरेर आफ्नो सहि विवरणहरु भरेर आवेदन दिनु होला । प्राप्त आवेदकहरुबाट तालिमको लागि छनोट गरिने छ।</b></p><br>
                                </td>   
                            </tr>
                            <tr>
                            <td bgcolor="#920808" align="center">
                                <a href="index.php?accountid=application_form"><b>आवेदन फाराम</b></a>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr >
                                <td bgcolor="#FFFFFF" align="center"><font size="+1" face="Kantipur" color="#000000">
            
<p align="justify"><b>शिक्षा तालिम केन्द्र धुलिखेल वा विस्तारित शिक्षा तालिम इकाइ वा स्थानीय तहसगको सहकार्यमा सञ्चालन हुने विभिन्न प्रकृतिको तालिम क्षमता विकास कार्यक्रममा तपाइकाे योग्यता र अनुभव वमोजिम रोष्टर प्रशिक्षक/ विज्ञको सूचिमा सूचिकृत हुन इच्छुक हुनेहरूले तलकाे आवेदन फाराममा क्लिक गरि  फाराम भर्न अनुरोध छ ।</b></p><br>

                                </td>   
                            </tr>
                            <tr>
                            <td bgcolor="#920808" align="center">
                                <a href="index.php?accountid=roster_form"><b>आवेदन फाराम</b></a>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr >
                                <td bgcolor="#FFFFFF" align="center"><font size="+1" face="Kantipur" color="#000000">
            
<p align="justify"><b>Customized (क्षमता विकास ) तालिम आवश्यकता माग फाराम ।</b></p><br>

                                </td>   
                            </tr>
                            <tr>
                            <td bgcolor="#920808" align="center">
                                <a href="index.php?accountid=customize_training"><b>आवेदन फाराम</b></a>
                                </td>
                            </tr>
                            <tr>
                            <td bgcolor="#FFFFFF" align="center">
                                &nbsp;
                                </td>
                            </tr>
                            
                        </table>
                        </td>
                        <td align="center" valign="Top" width="40%">
                        <img src="Image/working_staff.jpg" width="600" height="400" class="imagestyle">
                        </td>
                    <?php
                            }
                        ?>
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
