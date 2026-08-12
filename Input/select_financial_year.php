<form action="../Input/add_participate_in_training.php" method="Post" target="_blank">
<select name="cmbyear" required>
        <?php
        include("../financialyear.htm");
        ?>
</select>
<p><input type="submit" name="btnsubmit" value="Select Year"></p>
</form>