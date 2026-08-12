<?php
  include("../Processing/db_connection.php");
  include("title.htm")
?>
<form action="..\Object\Save_download_document.php" method="Post">
    <table class="subtable" cellpadding="10">
        <tr>
            <td align="right">Document</td>
            <td><input type="Text" name="txtdate" value=<?php echo $_SESSION['$tdate'];?>></td>
        </tr>
        <tr>
            <td align="right">Document For</td>
            <td>
               <Select name="cmbusefor">
               <Option>Administrator</option> 
               <Option>All Staff</option>
               <Option>All School</option>
               <Option>All Teacher</option>
               <Option>Self Only</option>
                </select>
            </td>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"> &nbsp;&nbsp;&nbsp;<input type="reset" name="btnreset" value="Cancel" class="button"></td>
        </tr>
    </table>
</form>

