<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_error',1);
include("../Processing/db_connection.php");
$i=0;
$k=0;
$id=$_POST['txtid'];
$allowance=$_POST['txtallowance'];
//echo $rem;
//echo "hell4o";    
foreach($id as $ids)
	{
	$trainingid[$k]=$ids;
  	$k++;
	}
$i=0;
foreach($allowance as $allowances)
	{
	$allowance[$i]=$allowances;
  	$i++;
	}
for($d=0; $d<$k;$d++)
	{
			$sql = "UPDATE tblttraining SET allowance = '". $allowance[$d] . "'  WHERE ID = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $trainingid[$d]);
			$stmt->execute();
			$conn->commit();
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
			document.addEventListener('DOMContentLoaded', function () {
    		Swal.fire({
        	icon: 'success',
        	title: 'सेभ',
        	text: 'सेभ भयो',
        	confirmButtonText: 'OK'
    		}).then((result) => {
        	if (result.isConfirmed) 
				{
            window.close();
        		}
    		});
			});
			</script>
			
<?php
		}
?>
