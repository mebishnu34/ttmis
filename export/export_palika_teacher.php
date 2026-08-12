<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE><?php echo $_SESSION['uname'];?></TITLE>
<?php
$filename = 'teacher_district.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
include("../Processing/db_connection.php");
$output = '';
$sql = "SELECT * FROM tblteacher where munvdc='$_SESSION[uname]' ORDER BY tname";
$result=mysqli_query($conn,$sql);  
    if(mysqli_num_rows($result)>0)
    {
    //echo "Test1";    
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
                <td>'.$row["scode"].'</td>
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
	header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=teacher_list.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
echo $output;
 }
?>
</BODY>
</HTML>
