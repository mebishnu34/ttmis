<?php
session_start();
   include("title.htm");
   $_SESSION['application']="";
   $_SESSION['csrf']="";
   $_SESSION['token']="Stop";
?>
<HTML>
<link rel="stylesheet" href="CSS/main_table.css">
<BODY class="bg">
<center>
<table width="100%", border=0 class="logintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td colspan="3" valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
</tr>

              <tr >
               <td align="Right" colspan="3"><a href="admin_login.php">Admin Login</a></td>
           </tr>
		    <tr >
               <td align="Right" colspan="3"><a href="admin_login.php">&nbsp;</a></td>
           </tr>
		   <tr >
               <td align="Right" colspan="3"><a href="admin_login.php">&nbsp;</a></td>
           </tr>
		   <tr >
               <td align="Right" colspan="3"><a href="admin_login.php">&nbsp;</a></td>
           </tr>
		   
               <tr >
                    <td align="Center" colspan="3"><a href="mun_login.php"><img src="Image/mun.jpg" alt="Municipality/Rural"></a>
                   &nbsp;&nbsp&nbsp; &nbsp;&nbsp&nbsp; <a href="school_login.php"><img src="Image/school.jpg" alt="School"></a>
                     &nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;<a href="teacher_login.php"><img src="Image/teacher.jpg" alt="Teacher"></a>
					  &nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;<a href="common_login.php"><img src="Image/report.jpg" alt="Common Report"></a>
					  				  </td>

           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
           <tr >
               <td align="Center" colspan="3" bgcolor="#0066FF"><font size="+2"><a href="Digital_Learning_Portal/index.php" target="_blank">DIGITAL LEARNING PORTAL</a></font> &nbsp&nbsp <font size="+2"><a href="https://cgs.mosd.bagamati.gov.np/" target="_blank">वृत्ति मार्गनिर्देशन</a></font></td>
           </tr>

            </table>
</center>
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
