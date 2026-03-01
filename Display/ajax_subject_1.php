<?php
session_start();
include("../Processing/db_connection.php");
//echo "Hello...";
//exit;
$trainingname="";
$level="";
if (isset($_POST['look'])) 
{

//Search box value assigning to $Name variable.
$_SESSION['trainingname'] = $_POST['look'];
  // echo $Name;
}
//echo $_SESSION['trainingname'];
if (isset($_POST['looklevel'])) 
{
//Search box value assigning to $Name variable.
$_SESSION['level'] = $_POST['looklevel'];
   //echo $level;
   //Search query.
   //$Query = "SELECT teachercode, tname, tcontact,schoolname,munvdc,district FROM tblteacher WHERE tname LIKE '%$Name%' LIMIT 5";
  $sql="SELECT DISTINCT subject FROM tbltraining where trainingname='".$_SESSION['trainingname']."' and level='".$_SESSION['level']."' ORDER BY subject";
$result = mysqli_query($conn,$sql);
echo "Subject:<Select id=cmbsubject onChange=selectsubject()>";
echo "<option>Select Subject</option>";
echo "<option>All</option>";
while($row = mysqli_fetch_array($result))
      {
      echo "<option>" . $row['subject'] . "</option>";
     }
echo "</select>";
//echo $trainingname;
//echo $level;
mysqli_close($conn);
 }  
?>

