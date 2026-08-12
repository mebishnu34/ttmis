<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
$_SESSION['teacherid']=$_GET['tid'];
//$trainingid=$_SESSION['trainingid'];
?>
<form action="print_certificate.php" method="Post">
    <div align="center">
        Training Type : <select name="cmbtraining">
                                <option>TPD</option>
                                <option>Service</option>
                                <option>General</option>
                        </select>
    </div>
        <br>
    <div align="center">
        Model : <input type="radio" value="M1" name="optmodel" checked> Format-1 <input type="radio" value="M2" name="optmodel"> Format-2
    <div>
        <br>
    <div align="center">
        <input type="Submit" value="PRINT" name="btncertificate">
</div>
</form>
<?php
}
?>

