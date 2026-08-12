<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<?php
$filename = 'teacher.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
include("../Processing/db_connection.php");
$output = '';
if(isset($_POST["teacher"]))
{
    
    if($_SESSION['district1']=="All")
      {
        echo $_SESSION['district1'];
        $sql = "SELECT * FROM tblteacher ORDER BY district, munvdc, tname";
        $result=mysqli_query($conn,$sql);
        }
    else
        {
            
        $sql = "SELECT * FROM tblteacher where munvdc='$_SESSION[district1]' ORDER BY district, munvdc, tname";
        $result=mysqli_query($conn,$sql); 
        }
    if(mysqli_num_rows($result)>0)
        {
            echo "Hello";
          $output.='
             <table class="table" border="1">
             <tr>
                 <th>S.No</th>
                 <th>Name of Teacher</th>
                 <th>Gender</th>
                 <th>Date of Birth</th>
                 <th>Address</th>
                 <th>Contact No.</th>
                 <th>Email</th>
                 <th>District</th>
                 <th>Municipality/Rural</th>
                 <th>Ward No.</th>
                 <th>Appoint Date</th>
                 <th>Appoint Type</th>
                 <th>School Code</th>
                 <th>Teacher Code</th>
                 <th>Teaching Level</th>
                 <th>Qualification</th>
                 <th>Faculty</th>
                 <th>Major Subject</th>
                 <th>Teaching Subject</th>
                 
             </tr>
             ';
             $n=1;
        while($row=mysqli_fetch_array($result))
        {
        $output .='
            <tr>
                <td>'.$n.'</td>
                <td>'.$row["tname"].'</td>
                <td>'.$row["gender"].'</td>
                <td>'.$row["dob"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["tcontact"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["district"].'</td>
                <td>'.$row["munvdc"].'</td>
                <td>'.$row["wardno"].'</td>
                <td>'.$row["appointdate"].'</td>
                <td>'.$row["appointtype"].'</td>
                <td>'.$row["schoolcode"].'</td>
                <td>'.$row["teachercode"].'</td>
                <td>'.$row["teachinglevel"].'</td>
                <td>'.$row["qualification"].'</td>
                <td>'.$row["faculty"].'</td>
                <td>'.$row["majorsubject"].'</td>
                <td>'.$row["teachingsubject"].'</td>
            </tr>
            ';
            $n++;
    }
    $output .='</table>';
       header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
   // header("Content-Type:application/xlsx");
    header("Content-Disposition: attachment; filename=teacher1.xls");
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
