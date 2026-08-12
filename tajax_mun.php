<?php
session_start();
//Including Database configuration file.
include("Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
   $Query = "SELECT teachercode, tname, tcontact,schoolname,workinglevel,teachertype FROM tblteacher WHERE munvdc='$_SESSION[uname]' and tname LIKE '$Name%'";
//Query execution
   $ExecQuery = MySQLi_query($conn, $Query);
//Creating unordered list to display result.
   echo '
<table width="100%" bgcolor="#FFFFFF">
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   	<tr>
   <td> <?php echo $Result['teachercode']; ?></td>
   <td><?php echo $Result['tname']; ?></td>
<td><?php echo $Result['tcontact']; ?> </td>
<td><?php echo $Result['schoolname']; ?></td>
<td><?php echo $Result['workinglevel']; ?></td>
<td><?php echo $Result['teachertype']; ?></td>

   </tr>
      <?php
}}
?>
</ul>
