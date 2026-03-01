<?php
session_start();
$_SESSION['pn']=$_POST['txtnumber'];
$_SESSION['trainingid']=$_POST['tid'];

?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Admin</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<table class="maintable">
    <tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\Admin\create.php">Back</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form action="send_message_to_lgov.php" method="Post"> 
<table align="center" class="maintable" border="0">
<tr>
<td width="200" align="right">भक्तपुर</td>
<td width="200"><input type="checkbox" name="d1[]" value="भक्तपुर"></td>
</tr>
<tr>
<td width="200" align="right">चितवन</td>
<td width="200"><input type="checkbox" name="d1[]" value="चितवन"></td>
</tr>
<tr>
<td width="200" align="right">धादिङ</td>
<td width="200"><input type="checkbox" name="d1[]" value="धादिंग"></td>
</tr>
<tr>
<td width="200" align="right">दोलखा</td>
<td width="200"><input type="checkbox" name="d1[]" value="दोलखा"></td>
</tr>
<tr>
<td width="200" align="right">काठमाण्डौ</td>
<td width="200"><input type="checkbox" name="d1[]" value="काठमाण्डौ"></td>
</tr>
<tr>
<td width="200" align="right">काभ्रेपलाञ्चोक</td>
<td width="200"><input type="checkbox" name="d1[]" value="काभ्रेपलाञ्चोक"></td>
</tr>
<tr>
<td width="200" align="right">ललितपुर</td>
<td width="200"><input type="checkbox" name="d1[]" value="ललितपुर"></td>
</tr>
<tr>
<td width="200" align="right">मकवानपुर</td>
<td width="200"><input type="checkbox" name="d1[]" value="मकवानपुर"></td>
</tr>
<tr>
<td width="200" align="right">नुवाकोट</td>
<td width="200"><input type="checkbox" name="d1[]" value="नुवाकोट"></td>
</tr>
<tr>
<td width="200" align="right">रामेछाप</td>
<td width="200"><input type="checkbox" name="d1[]" value="रामेछाप"></td>
</tr>
<tr>
<td width="200" align="right">रसुवा</td>
<td width="200"><input type="checkbox" name="d1[]" value="रसुवा"></td>
</tr>
<tr>
<td width="200" align="right">सिन्धुली</td>
<td width="200"><input type="checkbox" name="d1[]" value="सिन्धुली"></td>
</tr>
<tr>
<td width="200" align="right">सिन्धुपाल्चोक</td>
<td width="200"><input type="checkbox" name="d1[]" value="सिन्धुपाल्चोक"></td>
</tr>

<tr>
<td colspan="2" align="center">
<select name="option">
<option>All</option>
<option>Select</option>
</select>  
  </td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="Submit" value="Select Palika" class="button" name="btndisplay">
</td>
</tr>

  </table>
  </form>
  </BODY>

</HTML>
