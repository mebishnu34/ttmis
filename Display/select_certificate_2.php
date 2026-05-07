<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
      $_SESSION['trainingid']=$_GET['tid'];
?>
<form action="print_certificate_1.php" method="Post">
    <div align="center">
        Training Type : <select name="cmbtraining">
                                <option>TPD</option>
                                <option>In Service</option>
                                <option>One Month</option>
                        </select>
    </div>
        <br>
    <div align="center">
        Model : <input type="radio" value="M1" name="optmodel"> Format-1 <input type="radio" value="M2" name="optmodel"  checked> Format-2
    <div>
        <br>
    <div align="center">
        <input type="Submit" value="PRINT" name="btncertificate">
</div>
</form>
<?php
}
?>

