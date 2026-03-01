<?php
session_start();
include("../Processing/db_connection.php");
if($_GET['tid'])
  {
  $id=$_GET['tid'];
   $sql1 = "SELECT * FROM tblteacher where teacherid='$id'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         while($row1 = $result1->fetch_assoc())
         {
           $mobileno=$row1["tcontact"];
		 }
	}
  $sql = "UPDATE tblttraining set remark='Cancel' where teacherid='$id'";
  if (mysqli_query($conn, $sql))
     {
      $mobileno=$mobileno;
      $message="TTMIS::Sorry Your name withdraw from Training";
      include("../Object/sms_code.php");
      //header('Location: ../Admin/create.php?msg= "Saved Successfully"');
     }
}

?>
 <script>
 myWindow.close();
</script>