<form method="post" action="../Display/display_sms.php">
<?php
include("../Processing/db_connection.php");
$sql="SELECT * FROM tbluser ORDER BY uname";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbuser>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['loginname'] . "</option>";
     }
	 echo "<option>All</option>";
echo "</select>";
mysqli_close($conn);
?>
<center>
<br>
Date From : <input type="text" size="10" name="txtdfrom"> To : <input type="text" size="10" name="txtdto"><br>
<input type="submit" name="btndisplay" value="Display">
</center>
</form>
