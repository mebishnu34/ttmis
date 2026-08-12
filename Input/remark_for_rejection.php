<HTML>
<head>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<BODY>
<form method="Post" Action="../Object/save_remark_for_rejection.php">
    <table class="maintable">
           <tr>
               <td align="right">Remark</td>
               <td><input type="text" name="txtremark" size="60"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Reject" name="btnreject" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
