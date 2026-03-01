<?php
//Including Database configuration file.
include("../Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) 
{
$Name = $_POST['search'];
if($Name<>"")
{
$Query = "SELECT teacherid,teachercode, tname, tcontact,schoolname,munvdc,district,remark FROM tblteacher WHERE tname LIKE '$Name%' LIMIT 50";
$ExecQuery = MySQLi_query($conn, $Query);
 echo '
<table width="100%">
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   	<tr>
   
   <td><?php echo $Result['tname']; ?></td>
<td><?php echo $Result['tcontact']; ?> </td>
<td><?php echo $Result['schoolname']; ?></td>
   <td><?php echo $Result['munvdc']; ?></td>
<td><?php echo $Result['district']; ?></td>
<td> <?php echo $Result['remark']; ?></td>
<td bgcolor="#0000FF"><a href="school/teacher_school_update.php?tlinkid=<?php echo $Result['teacherid'];?>" target="blank">Add Teacher</a></td>
   </tr>
      <?php
}}
}
?>
</ul>
