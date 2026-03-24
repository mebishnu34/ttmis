<?php
session_start();
if(empty($_SESSION['key']))
//    $_SESSION['key']=bin2hex(random_bytes(32)); // for php 7
    $_SESSION['key']=bin2hex(openssl_random_pseudo_bytes(12));
    //echo $_SESSION['key'];
   $_SESSION['csrf']=hash_hmac('sha256','This is some String:admin_login.php',$_SESSION['key']);
   $_SESSION['token']="Stop";
//echo $_SESSION['csrf'];    
?>
<HTML>
<?php
   include("../title.htm")
?>
<link rel="stylesheet" href="../CSS/main_table.css">
<BODY class="bg">
<form method="Post" Action="../Object/do_login.php">
<center>
<table width="100%", border=0 height="100%" class="logintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="../Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="../Image/np_flag.gif" width="150" height="130"></td>
</tr
<tr>
<td colspan="3" valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
</tr>
             <tr>
             <td valign="top" colspan="3" align="center">
             <table width="50%" align="center">
                    <tr>
                    <td align="Right">Login Name</td>
                    <td><input type="text" name="txtloginname" class="logintext"></td>
                    </tr>
                    <tr>
                    <td align="Right">Password</td>
                    <td colspan="2"><input type="Password" name="txtpass"></td>
                    </tr>
                    <tr >
                    <td align="Right">Today's Date</td>
                    <td colspan="2"><input type="Text" name="txtdate" class="logintext"></td>
                    </tr>
                    <tr >
                    <td align="Right" colspan="3"><input type="hidden" name="csrf1" value="<?php echo $_SESSION['csrf'];?>"></td>
                    </tr>
                    <tr>
                    <td colspan="3" align="center"><input type="submit" value="Login" name="login" class="button"></td>
                    </tr>
             </table>
           </td>
           </tr>
           <tr >
               <td align="center" colspan="2"><?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</td>
           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
           <tr >
               <td align="Right" colspan="2">&nbsp;</td>
           </tr>
    </table>
</center>
</form>
</BODY>
</HTML>
