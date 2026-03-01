<?php
session_start();
?>
<HTML>
<head>
<link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<?php
   include("../Processing/db_connection.php");
   include("../title.htm");
   $mid = $_GET['tid'];
	$sql= "SELECT districtname, munvdc, noofward,aperson, mobileno,mpass,email FROM tbldistrict where ID='$mid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
    while($row = $result->fetch_assoc()) 
		{
         $district=$row['districtname'];
		 $mun=$row['munvdc'];
		 $nw=$row['noofward'];
		 $person=$row['aperson'];
		 $mobile=$row['mobileno'];
		 $pass=$row['mpass'];
		 		 $email=$row['email'];
		 }
	 }

?>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.jpg" width="150" height="150"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius" colspan="center"><img src="..\Image\banner.jpg" height="150"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>

    <form method="POST" Action="../Object/Update_District.php">
    <table class="table_design" cellpadding="5" align="center" width="90%" cellspacing="0">
    <tr>
    <td colspan="2" align="center">Local Government Update</td>
    </tr>
	<tr>
    <td align="right">ID</td>
    <td><?php echo $mid;?><input type="hidden" name="txtid" size="5" value="<?php echo $mid;?>"> </td>
    </tr>
    <tr>
    <td align="right">Name of District</td>
    <td><?php echo $district;?></td>
    </tr>
        <tr>
    <td align="right">Municipality/VDC Name</td>
    <td>
	<input type="hidden" name="txtpremunvdc" size="60" value="<?php echo $mun;?>">
	<input type="text" name="txtmunvdc" size="60" value="<?php echo $mun;?>"></td>
    </tr>
    <tr>
    <td align="right">Number of Ward</td>
    <td><input type="text" name="txtward" size="5" value="<?php echo $nw;?>"> </td>
    </tr>
	<tr>
    <td align="right">Authorize Person</td>
    <td><input type="text" name="txtperson" value="<?php echo $person;?>"> </td>
    </tr>
    <tr>
    <td align="right">Mobile No.*</td>
    <td><input type="text" name="txtmobile" size="20" value="<?php echo $mobile;?>"> </td>
    </tr>
	<tr>
    <td align="right">Email Addrress</td>
    <td><input type="text" name="txtemail" size="60" value="<?php echo $email;?>"> </td>
    </tr>
   <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Update" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
