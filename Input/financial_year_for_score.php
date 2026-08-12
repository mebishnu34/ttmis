<form action="../Input/participate_in_training.php" method="Post" target="_blank">
<select name="cmbyear" required>
        <?php
        include("../financialyear.htm");
        ?>
</select>
<p><input type="submit" name="btnsubmit" value="Display"></p>
</form>