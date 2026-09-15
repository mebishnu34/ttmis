<?php
//include("object_include.php");
include("../Processing/db_connection.php");
if(isset($_GET['linkid']))
   {
   $traid=$_GET['linkid'];
   $sql1 = "SELECT ID,teacherid FROM tblttraining where ID='$traid'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
	if($row = $result->fetch_assoc())
    {
	   $appid=$row["teacherid"];
    }
   }
     $sql = "delete from tblttraining where ID='$traid'";

      if (mysqli_query($conn, $sql))
         {
           //header('Location: ../Admin/create.php?msg= "Saved Successfully"');
         $sql = "UPDATE tblapplication SET remark = 'Out'	WHERE appid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $appid);
			$stmt->execute();
		   		  ?>
          
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'छनोट',
        text: 'तालिमबाट हटाइयो ',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.close();
        }
    });
});
</script>
          <?php
		  
          }
      else
          {
          $message= "Remove_training" . $sql . "<br>" . mysqli_error($conn);
		  $mobileno="9851001482";
		  include("sms_code.php");
		  echo "Sorry, Try Again";
          }
  }
mysqli_close($conn);
?>
