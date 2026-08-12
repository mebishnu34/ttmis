<HTML>
<?php
include("../Processing/db_connection.php");
   include("title.htm");
   $sql="SELECT orgname,address,officehead, contact,level, post FROM tblorganization";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
      {
      $org=$row['orgname'];
	  $a=$row['address'];
	  $head=$row['officehead'];
	  $c=$row['contact'];
	  $level=$row['level'];
	  $post=$row['post'];
     }

?>
<BODY>
<form action="../Object/Save_Organization.php" method="Post">
    <table class="subtable" cellpadding="10">
           <tr>
           <td colspan="2" align="center">Organization</td>
         </tr>
           <tr>
               <td align="Right">Name of Organization</td>
               <td><input type="text" name="orgname" size="50" class="normaltext" value="<?php echo $org;?>"></td>
           </tr>
           <tr>
               <td align="Right">Address</td>
               <td><input type="text" name="orgaddress" size="50" class="normaltext" value= "<?php echo $a;?>"></td>
           </tr>
           <tr>
               <td align="Right">Contact</td>
               <td><input type="text" name="orgcontact" class="normaltext" value="<?php echo $c;?>"></td>
           </tr>
           <tr>
               <td align="Right">Head of Office</td>
               <td><input type="text" name="txthead" class="normaltext" value="<?php echo $head;?>"></td>
           </tr>
		   <tr>
               <td align="Right">Level</td>
               <td><input type="text" name="txtlevel" class="normaltext" value="<?php echo $level;?>"></td>
           </tr>
		   <tr>
               <td align="Right">Post</td>
               <td><input type="text" name="txtpost" class="normaltext" value="<?php echo $post;?>"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" class="button"></td>
           </tr>

    </table>
</form>
</BODY>                                                     
</HTML>
