<HTML>
<?php
include("../Processing/db_connection.php");
   include("title.htm");
   if($_GET['uid'])
  {
  $id=$_GET['uid'];
  
   $sql="SELECT uname, ugender, mobileno, loginname, upass, utype,remark FROM tbluser where userid='$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
      {
         $un=$row['uname'];
      $g=$row['ugender'];
        $mobileno=$row['mobileno'];
    $ln=$row['loginname'];
    $up=$row['upass'];
    $ut=$row['utype'];
    $remark=$row['remark'];
    
	  }

?>
   

</script>

<BODY>
<form method="Post" Action="../Object/update_user.php">
    <table class="subtable" cellpadding="10">
           <tr>
           <td colspan="2" align="center">Update User</td>
           </tr>
           <tr>
               <td align="right">User ID</td>
               <td><input type="text" name="txtid" value="<?php echo $id; ?>" size="5"></td>
           </tr>
           <tr>
               <td align="right">Name of User</td>
               <td><input type="text" name="txtuser" value="<?php echo $un; ?>" size="50"></td>
           </tr>
           <tr>
               <td align="right">Gender</td>
               <td><input type="Radio" name="optgender" Value="Male">Male<input type="Radio" name="optgender" Value="Female">Female <input type="Radio" name="optgender" Value="Other">Other</td>
           </tr>
           <tr>
               <td align="right">Mobile No.</td>
               <td><input type="Text" name="txtmobile" value="<?php echo $mobileno; ?>" size="20"></td>
           </tr>
           <tr>
               <td align="right">Login Name</td>
               <td><input type="text" value="<?php echo $ln; ?>" name="txtloginname"></td>
           </tr>
           <tr>
               <td align="right">Password</td>
               <td><input type="Password" value="<?php echo $up; ?>" name="txtpass"></td>
           </tr>
           <tr>
               <td align="right">Confirm Password</td>
               <td><input type="Password" value="<?php echo $up; ?>" name="txtconfirm"></td>
           </tr>
           <tr>
               <td align="right">Type</td>
               <td>
               <select name="utype">
                <option><?php echo $ut; ?></option>
               <option>Administrator</option>
                <option>Normal</option>
                <option>Staff</option>
                <option>Trainer</option>
                       <option>Municipality/Rural</option>
               </select>
               </td>
           </tr>
           <tr>
               <td align="right">Remark</td>
               <td>
               <select name="cmbrem">
                <option><?php echo $remark; ?></option>
               <option>Active</option>
                <option>Inactive</option>
                </select>
               </td>
           </tr>
            <tr>
               <td colspan="2" align="center"><input type="submit" value="Update" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
<?php
  }
?>