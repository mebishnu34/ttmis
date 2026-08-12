<?php
include("../Processing/db_connection.php");
?>
<form method="POST" Action="../Object/save_content_remark.php">
<table class="subtable" cellpadding="10">
    <tr>
    <td align="Right">Application For Training</td>
    <td align="Left">
        <?php
        $sql = "SELECT remark FROM tblcontents where contenttitle='Training Application' and remark='Enable'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
        ?>
        <input type="Radio" name="optapplication" value="Enable" Checked>Enable &nbsp;&nbsp; 
        <input type="Radio" name="optapplication" value="Disable">Disable
        <?php
        }
        else
            {
        ?>

        <input type="Radio" name="optapplication" value="Enable">Enable &nbsp;&nbsp; 
        <input type="Radio" name="optapplication" value="Disable" checked>Disable
        <?php
            }
            ?>
    </td>
    </tr>
        <tr>
    <td align="right">Specialist/Roster</td>
    <td>
        <?php
        $sql = "SELECT remark FROM tblcontents where contenttitle='Roster' and remark='Enable'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
        ?>
        <input type="Radio" name="optroster" value="Enable" Checked>Enable &nbsp;&nbsp; 
        <input type="Radio" name="optroster" value="Disable">Disable
        <?php
        }
        else
            {
        ?>

        <input type="Radio" name="optroster" value="Enable">Enable &nbsp;&nbsp; 
        <input type="Radio" name="optroster" value="Disable" checked>Disable
        <?php
            }
            ?>
            


    </td>
    </tr>
    <tr>
    <td align="right">Customize Training Needs</td>
    <td>
        <?php
        $sql = "SELECT remark FROM tblcontents where contenttitle='Customize Training' and remark='Enable'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
        ?>
        <input type="Radio" name="optcustomize" value="Enable" Checked>Enable &nbsp;&nbsp; 
        <input type="Radio" name="optcustomize" value="Disable">Disable
        <?php
        }
        else
            {
        ?>

        <input type="Radio" name="optcustomize" value="Enable">Enable &nbsp;&nbsp; 
        <input type="Radio" name="optcustomize" value="Disable" checked>Disable
        <?php
            }
            ?>
           </td>
    </tr>
    <tr>
    <td align="right">AI Training</td>
    <td>
        <?php
        $sql = "SELECT remark FROM tblcontents where contenttitle='AI Training' and remark='Enable'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
        ?>
        <input type="Radio" name="optai" value="Enable" Checked>Enable &nbsp;&nbsp; 
        <input type="Radio" name="optai" value="Disable">Disable
        <?php
        }
        else
            {
        ?>

        <input type="Radio" name="optai" value="Enable">Enable &nbsp;&nbsp; 
        <input type="Radio" name="optai" value="Disable" checked>Disable
        <?php
            }
            ?>
        
    </td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="btnupdate" value="Update" class="button"></td>
    </tr>
    </table>
    </form>
