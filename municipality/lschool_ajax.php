<?php
session_start();
$count=0;
//Including Database configuration file.
include("../Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
 if($Name<>"")
 {
//Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
   $Query = "SELECT ID,schoolname, schoolcode, munvdc,district,authorizeperson,mobileno FROM tblschool WHERE schoolname LIKE '$Name%' LIMIT 50";
//Query execution
   $ExecQuery = MySQLi_query($conn, $Query);
//Creating unordered list to display result.
   echo '
 <table width="100%">
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
	
	      <a>
	<tr>
	<td><?php echo $Result['schoolname']; ?></td>
	<td><?php echo $Result['schoolcode']; ?> </td>
	<td><?php echo $Result['munvdc']; ?></td>
		<td><?php echo $Result['district']; ?></td>
	<td><?php echo $Result['authorizeperson']; ?></td>
	<td><?php echo $Result['mobileno']; ?></td>
	<td bgcolor="#0000FF"><a href="municipality/update_school_palika_1.php?tlinkid=<?php echo $Result['schoolcode'];?>" target="blank"> Change Palika</a></td>
  </tr>
   <?php
   $count++;
}}
}
echo "Found: " . $count;
?>
<!-- </ul> -->
