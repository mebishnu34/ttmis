<?php
include("../Processing/db_connection.php");
$sql="SELECT subname FROM tblsubject ORDER BY subname";
$result = mysqli_query($conn,$sql);
echo "<Select name=cmbsubject>";
echo "<option>None</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['subname'] . "</option>";
     }
echo "</select>";
