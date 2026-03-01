<?php
   include("title.htm")
?>
<form action="..\Object\save_document_1.php" name="save_document" method="post" enctype="multipart/form-data">
    <table class="subtable" cellpadding="10">
        <tr>
            <td align="right">Document</td>
            <td><input type="file" name="document1" id="file" required></td>
        </tr>
        <tr>
            <td align="right">Name of Document</td>
            <td><input type="Text" name="txtname" id="txtname" required></td>
        </tr>
        <tr>
            <td align="right" required>Document Access</td>
            <td>
               <Select name="cmbusefor">
               <Option>Administrator</option> 
               <Option>Staff</option>
               <Option>Trainer</option>
               <Option>Self Only</option>
               <Option>School</option>
               <Option>Palika</option>
               <Option>Common</option>
               
                </select>
            </td>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"> &nbsp;&nbsp;&nbsp;<input type="reset" name="btnreset" value="Cancel" class="button"></td>
        </tr>
    </table>
</form>

