<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
    $sql = "SELECT ID, teacherid,trainingid FROM tblmarkdetails where ID='".$_GET['tid']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
      {
         if($row1 = $result->fetch_assoc())
         {
            $_SESSION['teacherid']=$row1["teacherid"];
            $_SESSION['trainingid']=$row1["trainingid"];
         }
      }
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

