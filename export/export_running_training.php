<?php
Session_start();
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<?php
$filename = 'running_training.xls';
//include("export_class.php");
?>
<head>
</HEAD>
<BODY>
<?php
if(isset($_GET['id']))
{
$traid=$_GET['id'];
include("..\Processing\db_connection.php");
$output = '';
$output.='
             <table  width="100%" class="table_design">
            <tr>
            <th align="center">S.No</th>
            <th>Name of Teacher</th>
            <th>Contact No.</th>
            <th>Name of School</th>
            <th>Local Government</th>
            <th>District</th>
            <th>Login Name</th>
            <th>Password</th>
            <th>Remark</th>
            <th></th>
            </tr>';
            $sn=1;
            $sql1 = "SELECT ID,teacherid,schoolcode,sdate,edate FROM tblttraining where (trainingid='$traid' or runid='$traid') and remark='Running'";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0)
               {
                while($row = $result->fetch_assoc())
                {
                $sname="";
                    $mun="";
                    $district="";
                $tcode=$row["teacherid"];
                $tname="";
                $contact="";
                $loginname="";
                $pass="";
                $scode=$row["schoolcode"];
                    $sqlt = "SELECT tname,tcontact,loginname, tpass FROM tblteacher where (teacherid='$tcode' or teachercode='$tcode')";
                    $resultt = $conn->query($sqlt);
                    if($resultt->num_rows > 0)
                       {
                    if($rowt = $resultt->fetch_assoc())
                       {
                       $contact=$rowt["tcontact"];
                       $tname=$rowt["tname"];
                       $loginname=$rowt["loginname"];
                       $password=$rowt["tpass"];
                       }
                    }
                    
                    $sqlt = "SELECT schoolname,munvdc,district FROM tblschool where schoolcode='$scode'";
                    $resultt = $conn->query($sqlt);
                    if($resultt->num_rows > 0)
                           {
                        if($rowt = $resultt->fetch_assoc())
                           {
                           $sname=$rowt["schoolname"];
                           $mun=$rowt["munvdc"];
                           $district=$rowt["district"];
                               }
                        }
            $output.='
                        <tr>
                        <td align=center>'. $sn . '</td>
                        <td align=left>' . $tname . '</td>
                        <td align=center>' . $contact . '</td>
                        <td align=left>' . $sname . '</td>
                        <td align=left>' . $mun . '</td>
                        <td>' . $district . '</td>
                        <td>' . $loginname . '</td>
                        <td>' . $password . '</td>
                        </tr>';
                        $sn++;
                }
            }
    
    $output .='</table>';
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=running_training.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
    //echo ucwords($output) . "\n" . $output . "\n";
    echo $output;
}
?>
</BODY>
</HTML>
