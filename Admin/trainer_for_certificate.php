<?php
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
   $Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district,scode FROM tblteacher WHERE tname LIKE '$Name%' LIMIT 20";
   
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
	
	<tr>
   <!-- <li onclick='fill("<?php //echo $Result['Name']; ?>")'> -->
	<!-- <a> -->
      <?php
      
   $scode=$Result['scode'];
      $schoolname="";
      $sql1 = "SELECT schoolname FROM tblschool where schoolcode='$scode'";
      $result = $conn->query($sql1);
      if ($result->num_rows > 0)
         {
          while($row = $result->fetch_assoc()) 
            {
            $schoolname=$row["schoolname"];
         }
         }
         
         ?>
<td><?php echo $Result['teachercode']; ?></td>
   <td><?php echo $Result['tname']; ?></td>
<td><?php echo $Result['tcontact']; ?> </td>
<td><?php echo $schoolname; ?></td>
<?php
echo "<td bgcolor=blue align=center><a href=../Display/trainee_training_completed.php?id=$Result[teachercode] target=_blank>Completed Training</a>";
?>
</tr>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
   $count++;
}}
}
echo $count;
?>
<!-- </ul> -->
