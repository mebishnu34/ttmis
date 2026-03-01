<HTML>
<?php
   include("../title.htm");
?>
<BODY>
<form method="Post" Action="../Display/login_report.php" target="_blank">
    <table class="subtable" cellpadding="10">
               <tr>
               <td align="right">User Type</td>
               <td>
               <select name="cmbtype">
			   		   <option>All</option>
					   <option>Teacher</option>
					   <option>School</option>
					   <option>LGovt</option>
                       <option>Normal</option>
                       <option>Other</option>
                       <option>Administrator</option>
                       
               </select>
               </td>
           </tr>
            <tr>
            <td colspan="2">
            <div id="txtHint" align="center"></div>
            </td>
             </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Display" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
