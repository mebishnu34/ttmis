<?php
$sql="delete from tblstuans";
if(!mysqli_query($conn,$sql))
		{
			header('Location: index.php?msg'. mysqli_error($conn));
		}
?>