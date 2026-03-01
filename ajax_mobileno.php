<?php
$count=0;
//Including Database configuration file.
include("Processing/db_connection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $mobile = $_POST['search'];
 if($mobile<>"")
 {
//Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
   $Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district,scode FROM tblteacher WHERE tcontact LIKE '$mobile%' LIMIT 20";
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
<td onclick='fill("<?php echo $Result['teachercode']; ?>")'><?php echo $Result['teachercode']; ?></td>
   <td onclick='fill("<?php echo $Result['teachercode']; ?>")'><?php echo $Result['tname']; ?></td>
<td onclick='fill("<?php echo $Result['teachercode']; ?>")'><?php echo $Result['tcontact']; ?> </td>
<td onclick='fill("<?php echo $Result['teachercode']; ?>")'><?php echo $schoolname; ?></td>
   <td onclick='fill("<?php echo $Result['teachercode']; ?>")'><?php echo $Result['munvdc']; ?></td>
<td onclick='fill("<?php echo $Result['teachercode']; ?>")'> <?php echo $Result['district']; ?></td>
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
