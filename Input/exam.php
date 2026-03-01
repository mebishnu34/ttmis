<HTML>
<?php
   include("title.htm")
?>
<BODY>
<form method="Post" Action="../Object/Save_Exam.php">
    <table class="maintable">
               <tr>
               <td colspan="2" align="center">Exam</td>
               </tr>
           <tr>
               <td>Exam Name</td>
               <td><input type="text" name="txtexam"></td>
           </tr>
           <tr>
               <td>Exam Type</td>
               <td>
               <select name="examtype">
                        <option>Internal</option>
                        <Option>External</option>
               </select>
               </td>
           </tr>
           <tr>
               <td>Mark Of</td>
               <td><input type="text" name="txtmarkof" size="10"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
