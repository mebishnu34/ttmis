<?php
session_start();
$_SESSION['token']="Stop";
?>
<HTML>
<?php
   include("title.htm")

?>
<link rel="stylesheet" href="CSS/main_table.css">
<BODY class="bg">
<form method="Post" Action="Object/teacher_login.php">
<center>
<table width="100%", border=0 height="100%" class="logintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image/np_flag.gif" width="150" height="130"></td>
</tr
<tr>
<td colspan="3" valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
</tr>
             <tr>
             <td valign="top" colspan="3" align="center">
             <font face="Arial Black"> Teacher Login</font>
           </td>
           </tr>
             <tr>
             <td valign="top" colspan="3" align="center">
             <table width="50%" align="center">
                    <tr>
                    <td align="Right">Login Name</td>
                    <td><input type="text" name="txtloginname"></td>
                    </tr>
                    <tr>
                    <td align="Right">Password</td>
                    <td><input type="Password" name="txtpass"></td>
                    </tr>
                    <tr >
                    <td align="Right">Today's Date</td>
                    <td><input type="Text" name="txtdate"></td>
                    </tr>
                    <tr>
                    <td colspan="3" align="center"><input type="submit" value="Login" class="button"></td>
                    </tr>
             </table>
           </td>
           </tr>
           <tr >
               <td align="center" colspan="3"><font color="red"><?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?></font></td>
           </tr>
           <tr >
               <td align="Right" colspan="3">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="3">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="3">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="3">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="3">&nbsp;</td>
           </tr>
    </table>
</center>
</form>
</BODY>
</HTML>
