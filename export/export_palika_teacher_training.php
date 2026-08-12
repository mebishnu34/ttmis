<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<?php
$filename = 'training.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
include("../Processing/db_connection.php");
$output = '';
$sql = "SELECT * FROM tblruntraining ORDER BY trainingname";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
   {
   $output.='
             <table class="table" border="1">
             <tr>
                 <th>S.No</th>
                 <th>Name of Training</th>
                 <th>Level</th>
                 <th>Subject</th>
                 <th>Start Date</th>
                 <th>End Date</th>
                 <th>Number of Days</th>
                  <th>Venue</th>
                               
             </tr>
             ';
             $n=1;
   while($row=mysqli_fetch_array($result))
   {
                         
    $output .=' 
                 <tr>
                <td>'.$n.'</td>
                <td>'. $row["trainingname"].'</td>
                <td>'.$row["level"].'</td>
                <td>'.$row["subject"] .'</td>
                <td>'.$row["startdate"].'</td>
                <td>'.$row["enddate"].'</td>
                <td>'.$row["trainingdays"].'</td>
                <td>'.$row["venue"].'</td>
                            
            </tr>
            ';
            $n++;
    }
    $output .='</table>';
       header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
       header("Content-Disposition: attachment; filename=training.xls");
   	 echo $output;
 }
?>
</BODY>
</HTML>
