<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
</head>
</html>
 <form action="../Display/trainer_details_subject.php" method="Post" target="_blank">
  <table>
<tr>
    <td align="right">Subject</td>
    <td>&nbsp;</td>
	<td>
<?php
    include("../Processing/db_connection.php");
    $sql="SELECT DISTINCT subject FROM tbltraining ORDER BY subject";
    $result = mysqli_query($conn,$sql);
    ?>
    <select name="cmbsubject">
        <?php
        echo "<option value=''>Select Subject</option>";
while($row = mysqli_fetch_array($result))
      {
        ?>
      <option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?></option>
      <?php
     }
echo "</select>";
?>
</td>
</tr>
<tr>
    <td align="right">Education Year</td>
    <td>&nbsp;</td>
	<td>
<?php
    include("../education_year.php");
    
?>
</td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Display" class="button"></td>
</tr>
  </table>
  </form>

