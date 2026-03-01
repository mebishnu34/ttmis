<html>
<?php
   include("title.htm")
?>
<body>
<form method="Post" action="../Object/Save_Teacher.php">
<table>
<tr>
<td colspan="3">Teacher Registration</td>
</tr>
<tr><td>Name of Teacher</td>
<td>&nbsp;</td>
<td><input name="txtname" type="Text" size="20" /></td>
</tr>
<tr><td>Gender</td>
<td>&nbsp;</td>
<td><input name="gender" type="Radio" value="Male" />Male<input name="gender" type="radio" value="Female"/>Female</td>
</tr>
<tr><td>Date of Birth</td>
<td>&nbsp;</td>
<td><input name="txtdob" type="Text" size="20" /></td>
</tr>
<tr><td>VDC/Municipality</td>
<td>&nbsp;</td>
<td><input name="txtmuni" type="Text" size="20" /></td>
</tr>
<tr><td>Ward No.</td>
<td>&nbsp;</td>
<td><input name="txtward" type="Text" size="5" /></td>
</tr>
<tr><td>Full Address</td>
<td>&nbsp;</td>
<td><input name="txtfaddress" type="Text" size="20" /></td>
</tr>
<tr><td>Appointment Date</td>
<td>&nbsp;</td>
<td><input name="txtadate" type="Text" size="20" /></td>
</tr>
<tr><td>Level</td>
<td>&nbsp;</td>
<td><select name="optlevel">
<option>First</option>
<option>Second</option>
</select></td>
</tr>
<tr><td>Appointment Type</td>
<td>&nbsp;</td>
<td><input name="txtatype" type="Text" size="20" /></td>
</tr>
<tr><td>Name of School</td>
<td>&nbsp;</td>
<td><input name="txtschool" type="Text" size="20" /></td>
</tr>
<tr><td>School'S Address</td>
<td>&nbsp;</td>
<td><input name="txtschooladdress" type="Text" size="20" /></td>
</tr>

<tr>
<td colspan="3"><input name="btnsave" type="Submit" value="Save" /></td>
</tr>







</table>
</form>
</body>

</html>
