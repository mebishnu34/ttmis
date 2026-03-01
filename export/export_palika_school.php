<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE><?php echo $_SESSION['uname'];?></TITLE>
<?php
$filename = 'palika_school_list.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
include("../Processing/db_connection.php");
$output = '';
$sql = "SELECT * FROM tblschool where munvdc='$_SESSION[uname]' ORDER BY schoolname";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
    {
    //echo "Test1";    
   $output.='
             <table class="table" border="1">
             <tr>
                 <th>S.No</th>
                 <th>Name of School</th>
                 <th>School Code</th>
                 <th>Head of School</th>
                 <th>Address</th>
                 <th>Contact No.</th>
                 <th>Email</th>
            </tr>
             ';
             $n=1;
   while($row=mysqli_fetch_array($result))
   {
   $output .='
            <tr>
                <td>'.$n.'</td>
                <td>'.$row["schoolname"].'</td>
                <td>'.$row["schoolcode"].'</td>
                <td>'.$row["authorizeperson"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["mobileno"].'</td>
                <td>'.$row["email"].'</td>
               </tr>
            ';
            $n++;
    }
    $output .='</table>';
   header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=palika_school_list.xls");
    echo $output;
 }
?>
</BODY>
</HTML>
