<?php
session_start();
include("../Processing/db_connection.php");
$traid=$_SESSION['traid'];
$output = '';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/main_table.css">
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<title>TTMIS:Bagamati</title>
</head>
<body>
<div align="Right">
    					<button type="button" id="export_button" class="button">Export</button>
    				</div>
<?php
 $output.='
            <table id="teacher_data" width="100%" class="table_design">
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
                <td>' . $password . '</td>';
	            echo "<td bgcolor=blue align=center><a href=../Object/remove_teacher.php?linkid=$row[ID]>Remove</a> / <a href=../Object/send_password_teacher.php?linkid=$row[teacherid]>Send Password</a></td>";
	$output.='</tr>';
            $sn++;
	    }
    }
$output.='</table>';
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=running_training.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
//echo ucwords($output) . "\n" . $output . "\n";
echo $output;
?>
</body>
</html>
