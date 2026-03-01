<HTML>
<?php
   include("title.htm")
?>
<BODY>
    <form method="POST" Action="../Object/Save_District.php">
    <table class="subtable" cellpadding="10">
    <tr>
    <td colspan="2" align="center">Local Government</td>
    </tr>
    <tr>
    <td align="right">Name of District</td>
    <td><?php include("../district_list_1.htm");?>
</td>
    </tr>
        <tr>
    <td align="right">Municipality/VDC Name</td>
    <td><input type="text" name="txtmunvdc" size="60"> </td>
    </tr>
    <tr>
    <td align="right">Number of Ward</td>
    <td><input type="text" name="txtward" size="5"> </td>
    </tr>
	<tr>
    <td align="right">Authorize Person</td>
    <td><input type="text" name="txtperson"> </td>
    </tr>
    <tr>
    <td align="right">Mobile No.*</td>
    <td><input type="text" name="txtmobile" size="20"> </td>
    </tr>
    <tr>
    <td align="right">Password*</td>
    <td><input type="Password" name="txtpass" size="30"> </td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
