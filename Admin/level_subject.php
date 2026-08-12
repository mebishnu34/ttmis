<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['l']))
{
$l = $_GET['l'];
$_SESSION['level']=$l;
$sql="SELECT DISTINCT subject FROM tbltraining where level='".$l."' ORDER BY subject";
$result = mysqli_query($conn,$sql);
?>
<select name="cmbsubject" onchange="subjects(this.value)" class="normaltext">
<?php
echo "<option>None</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['subject'] . "</option>";
     }
echo "</select>";
mysqli_close($conn);
}
?>
