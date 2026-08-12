<HTML>
<?php
   include("title.htm");
?>
<BODY>
<form method="Post" Action="../Object/Save_User.php">
    <table class="subtable" cellpadding="10">
           <tr>
           <td colspan="2" align="center">New User</td>
           </tr>
           <tr>
               <td align="right">Name of User</td>
               <td><input type="text" name="txtuser" size="50"></td>
           </tr>
           <tr>
               <td align="right">Gender</td>
               <td><input type="Radio" name="optgender" Value="Male">Male<input type="Radio" name="optgender" Value="Female">Female <input type="Radio" name="optgender" Value="Other">Other</td>
           </tr>
           <tr>
               <td align="right">Mobile No.</td>
               <td><input type="Text" name="txtmobile" size="20"></td>
           </tr>
           <tr>
               <td align="right">Login Name</td>
               <td><input type="text" name="txtloginname"></td>
           </tr>
           <tr>
               <td align="right">Password</td>
               <td><input type="Password" name="txtpass"></td>
           </tr>
           <tr>
               <td align="right">Confirm Password</td>
               <td><input type="Password" name="txtconfirm"></td>
           </tr>
           <tr>
               <td align="right">Type</td>
               <td>
               <select name="utype">
               <option>Administrator</option>
                <option>Normal</option>
                <option>Staff</option>
                <option>Trainer</option>
                       <option>Municipality/Rural</option>
               </select>
               </td>
           </tr>
            <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
