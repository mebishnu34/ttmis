<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<?php
$filename = 'mark_ledger.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
include("..\Processing\db_connection.php");
$output = '';
if(isset($_POST["markledger"]))
{
    if($_SESSION['trainingid']=="All")
    {
$sql = "SELECT * FROM tblmarkdetails";
$result=mysqli_query($conn,$sql);
}
else
{
  $sql = "SELECT * FROM tblmarkdetails where trainingid='$_SESSION[trainingid]'";
$result=mysqli_query($conn,$sql);  
}
if(mysqli_num_rows($result)>0)
   {
   $output.='
             <table class="table" border="1">
             <tr>
                 <th>S.No</th>
                 <th>Name of Teacher</th>
                 <th>Name of School</th>
                 <th>Municipality/Rural/Ward No</th>
                 <th>Address of School</th>
                 <th>Appoint Date</th>
                 <th>Appoint Type</th>
                  <th>Teaching Level</th>
                 <th>Address of Teacher</th>
                 <th>Date of Birth</th>
                 <th>Present(3)</th>
                 <th>Dicipline(2)</th>
                 <th>Active(10)</th>
                 <th>Objectives(5)</th>
                 <th>Subjectives(20)</th>
                 <th>Reporting(10)</th>
                 <th>Total(50)</th>
                 
             </tr>
             ';
             $n=1;
   while($row=mysqli_fetch_array($result))
   {
             $teacherid=$row["teacherid"];
            $sql1 = "SELECT * FROM tblteacher where teacherid='$teacherid'";
               $result1=mysqli_query($conn,$sql1);  
                if($row1=mysqli_fetch_array($result1))
                {
                    $tname=$row1["tname"];
                    $scode=$row1["schoolcode"];
                    $taddress=$row1["address"];
                    $dob=$row1["dob"];
                    $adate=$row1["appointdate"];
                    $atype=$row1["appointtype"];
                    $level=$row1["workinglevel"];
                }
                
             $sql2 = "SELECT * FROM tblschool where schoolcode='$scode'";
               $result2=mysqli_query($conn,$sql2);  
                if($row2=mysqli_fetch_array($result2))
                {
                    $schoolname=$row2["schoolname"];
                    $munvdc=$row2["munvdc"];
                    $wno=$row2["wardno"];
                    $saddress=$row2["address"];
                    
                }
              
    $output .=' 
                 <tr>
                <td>'.$n.'</td>
                <td>'.$tname.'</td>
                <td>'.$schoolname.'</td>
                <td>'.$munvdc . ' / ' . $wno .'</td>
                <td>'.$saddress.'</td>
                <td>'.$adate.'</td>
                <td>'.$atype.'</td>
                <td>'.$level.'</td>
                <td>'.$taddress.'</td>
                <td>'.$dob.'</td>
                <td>'.$row["present"].'</td>
                <td>'.$row["dicipline"].'</td>
                <td>'.$row["activeness"].'</td>
                <td>'.$row["objective"].'</td>
                <td>'.$row["subjective"].'</td>
                <td>'.$row["reporting"].'</td>
                <td>'.($row["present"]+$row["dicipline"]+$row["activeness"]+$row["objective"]+$row["subjective"]+$row["reporting"]).'</td>
                
            </tr>
            ';
            $n++;
    }
    $output .='</table>';
       header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
   // header("Content-Type:application/xlsx");
    header("Content-Disposition: attachment; filename=markledger.xls");
   //header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
//   header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
   //header('Content-Transfer-Encoding: binary');
   //header('Cache-Control: must-revalidate');
   //header('Pragma: public');
    echo $output;
   }
}
?>
</BODY>
</HTML>
