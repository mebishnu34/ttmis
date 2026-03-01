<HTML>
<?php
   include("title.htm")
?>
<BODY>
<form action="../Object/Save_Mark.php" method="Post">
    <table>
           <tr>
               <td>Name of Training</td>
               <td><select name="cmbtraining">
               <?php
			$data=mysql_query("Select trainingname from tbltraining",$con);
			$rownum=mysql_num_rows($data);
			$i=0;
			while($i<$rownum)
				{
				?>
				<option>
				<?php
				 	echo mysql_result($data, $i, "trainingname");
					$i++;
				?>
				</option>
				<?php
				}
				?>
               </select>
               </td>
           </tr>
           <tr>
               <td>Training Number</td>
               <td><input type="text" name="txtnumber"></td>
           </tr>
           <tr>
               <td colspan="2">
               <table width="800" border="1" align="center" bgcolor="#FFFFFF">
<tr>
<td align="center">S.No</td>
<td align="center">Teacher ID</td>
<td align="center">Name of Teacher</td>
<td align="center">Attendance</td>
</tr>
<?php
while($i<$rownum)
	{
 ?>
<tr>
<td align="center"><?php echo $i+1; ?><input type="hidden" name="id" value="<?php echo $i+1; ?>" readonly="true" size="5"></td>
<td align="center"><?php echo mysql_result($data, $i, "teacherid");?><input size="10" readonly="True" type="hidden" name="stucode[]" value="<?php echo mysql_result($data, $i, "stucode");?>"></td>
<td><?php echo mysql_result($data, $i, "tname");?><input type="hidden" name="tname[]" value="<?php echo mysql_result($data, $i, "stuname");?>" readonly="True"></td>
</td>
<td>
<input type="checkbox" name="rem[]" value="P">P <input type="checkbox" name="rem[]" value="A">A <input type="checkbox" name="rem[]" value="L">L
</td>
<?php
		$i++;
	echo "</tr>";
	}
?>
</div>
<tr>
<td colspan="4" align="center"><input type="submit" name="btnsave" value="Save"> &nbsp;&nbsp;&nbsp;<input type="reset" name="btnreset" value="Cancel"</td>

</tr>

</table>


               </td>
           </tr>
           <tr>
               <td colspan="2"><input type="submit" value="Save"></td>
           </tr>
    </table>                                                     \
</form>
</BODY>
</HTML>
