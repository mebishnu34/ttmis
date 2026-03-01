<HTML>
<head>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<BODY>
<form method="Post" Action="../Object/Save_civil_training.php">
    <table class="maintable">
           <tr>
          <td colspan="2" align="center">Civil Training</td>
        </tr>
           <tr>
               <td>Name of Civil</td>
               <td><select name="cmbcivil">
               <?php
               $query = mysqli_query($conn,"SELECT * FROM tblteacher where category='Civil'");
               while($row=mysqli_fetch_array($query))
               {
               echo "<option value='". $row['teacherid']."'>".$row['tname'] .'</option>';
               }
               echo '</select>';
               ?>
               </td>
           </tr>
           <tr>
               <td>Name of Training</td>
               <td>
               <?php
              echo "<Select name=cmbtraining>";
               $query = mysqli_query($conn,"SELECT trainingname, trainingid, level, leveloption FROM tbltraining");
               while($row=mysqli_fetch_array($query))
               {
               echo "<option value='". $row['trainingid']."'>".$row['trainingname'].' - '. $row['level'].' -' . $row['leveloption'] .'</option>';
               }
               echo '</select>';
               ?>
                </td>
           </tr>
             <tr>
               <td>Training Number</td>
               <td><input type="text" name="txtnumber" size="5"></td>
           </tr>
           <tr>
               <td>Remark</td>
               <td><input type="text" name="txtremark"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
