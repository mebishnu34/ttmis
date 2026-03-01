<?php
session_start();
include("../Processing/db_connection.php");
if($_GET['tid'])
  {
  $id=$_GET['tid'];
   $sql = "delete from tblschoolinfo where ID='$id'";
    if (mysqli_query($conn, $sql))
     {
    	echo "<center>Remove Successfully</center>";  
     }
  }

?>
 <script>
 myWindow.close();
</script>