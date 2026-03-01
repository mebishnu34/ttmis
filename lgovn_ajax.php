<?php
session_start();
$count=0;
//Including Database configuration file.
include("Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
 if($Name<>"")
 {
//Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
   $Query = "SELECT teacherid, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE munvdc='$_SESSION[uname]' and  tname LIKE '$Name%' LIMIT 50";
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
   <!-- <li onclick='fill("<?php //echo $Result['Name']; ?>")'> -->
	<!-- <a> -->
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'> 

   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php //echo $Result['teachercode']."  -  ".$Result['tname']. "  -  ".$Result['tcontact']. "  -  ".$Result['schoolname']. "  -  ".$Result['munvdc']. "  -  ".$Result['district']; ?>
   <!-- </li></a> -->
          <?php echo $Result['teacherid']; ?>
   </td>
   <td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tname']; ?></td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['tcontact']; ?> </td>
<td onclick='fill("<?php echo $Result['teacherid']; ?>")'><?php echo $Result['schoolname']; ?></td>
  </tr>
   </a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
   $count++;
}}
}
echo $count;
?>
<!-- </ul> -->
