<?php
   include("Processing/db_connection.php");
   include("title.htm");
   $mid = $_SESSION['tid'];
	$sql= "SELECT districtname, munvdc, noofward,aperson, mobileno,mpass,email FROM tbldistrict where ID='$mid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
   		{
    while($row = $result->fetch_assoc()) 
		{
         $district=$row['districtname'];
		 $mun=$row['munvdc'];
		 $nw=$row['noofward'];
		 $person=$row['aperson'];
		 $mobile=$row['mobileno'];
		 $pass=$row['mpass'];
		 		 $email=$row['email'];
		 }
	 }

?>
    <form method="POST" Action="Object/update_district_municipality.php">
    <table class="subtable" cellpadding="10">
    <tr>
    <td align="right">ID</td>
    <td><?php echo $mid;?><input type="hidden" name="txtid" size="5" value="<?php echo $mid;?>"> </td>
    </tr>
    <tr>
    <td align="right">Name of District</td>
    <td><?php echo $district;?> </td>
    </tr>
        <tr>
    <td align="right">Municipality/VDC Name</td>
    <td><input type="text" name="txtmunvdc" size="60" value="<?php echo $mun;?>"><input type="hidden" name="txtmunvdcp" size="60" value="<?php echo $mun;?>"></td>
    </tr>
    <tr>
    <td align="right">Number of Ward</td>
    <td><input type="text" name="txtward" size="5" value="<?php echo $nw;?>"> </td>
    </tr>
	<tr>
    <td align="right">Authorize Person</td>
    <td><input type="text" name="txtperson" value="<?php echo $person;?>"> </td>
    </tr>
    <tr>
    <td align="right">Mobile No.*</td>
    <td><input type="text" name="txtmobile" size="20" value="<?php echo $mobile;?>"> </td>
    </tr>
	<tr>
    <td align="right">Password</td>
    <td><input type="Password" name="txtpass" size="60" value="<?php echo $pass;?>"> </td>
    </tr>
	<tr>
    <td align="right">Email Addrress</td>
    <td><input type="text" name="txtemail" size="60" value="<?php echo $email;?>"> </td>
    </tr>
   <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Update" class="button"></td>
    </tr>
    </table>
    </form>
