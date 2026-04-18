<HTML>
<head>
<?php
   include("title.htm")
?>
</head>
<BODY>
    <form method="Post" Action="../Object/Save_Training.php">
    <table class="subtable" cellpadding="10">
    <tr>
    <td colspan="2" align="center">Training</td>
    </tr>
    <tr>
    <td align="right">Name of Training</td>
    <td><select name="cmbtraining">
        <?php
                         include("../training_category.html");
                ?>
                </select>
    </td>
    </tr>
        <tr>
    <td align="right">Level</td>
    <td><select name="cmblevel">
        <?php
        include("..//level.htm");
        ?>
</select>
     </td>
    </tr>
    <td align="right">Subject</td>
    <td>
    <input type="text" name="txtsubject" size="50">
     </td>
    </tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
