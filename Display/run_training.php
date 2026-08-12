<?php
session_start();
include("../Processing/db_connection.php");
$traid=$_SESSION['traid'];
$activeuser="";
$sql = "SELECT id,user from tblruntraining where id='$traid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
				
            $activeuser=$row["user"];
	}
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/main_table.css">
<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
<title>TTMIS:Bagamati</title>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>
<body>
<div align="Right">
    					<button type="button" id="export_button" class="button">Export</button>
						<a href="../export/export_running_training.php?id=<?php echo $traid;?>"><button type="button" class="button">Export</button></a>
    				</div>

<table id="teacher_data" width="100%" class="table_design">
<tr>
<th align="center">S.No</th>
<th>Name of Teacher</th>
<th>Contact No.</th>
<th>Name of School</th>
<th>District</th>
<th>Local Government</th>
<th>Login Name</th>
<th>Password</th>
<th>Remark</th>

<th></th>
</tr>
<?php
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
		$sqlt = "SELECT tname,tcontact,district, munvdc,loginname, tpass FROM tblteacher where (teacherid='$tcode' or teachercode='$tcode')";
		$resultt = $conn->query($sqlt);
		if($resultt->num_rows > 0)
   		{
    	if($rowt = $resultt->fetch_assoc())
    	   {
		   $contact=$rowt["tcontact"];
		   $tname=$rowt["tname"];
		   $mun=$rowt["munvdc"];
			   $district=$rowt["district"];
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
    echo "<tr>";
	echo "<td align=center>". $sn . "</td>";
	echo "<td align=left>" . $tname . "</td>";
	echo "<td align=center>" . $contact . "</td>";
    echo "<td align=left>" . $sname . "</td>";
	echo "<td>" . $district . "</td>";
	echo "<td align=left>" . $mun . "</td>";
	echo "<td>" . $loginname . "</td>";
    echo "<td>" . $password . "</td>";
	if($activeuser==$_SESSION['lname'])
	{
	echo "<td bgcolor=blue align=center><a href=../Object/remove_teacher.php?linkid=$row[ID]>Remove</a> / <a href=../Object/send_password_teacher.php?linkid=$row[teacherid]>Send Password</a></td>";
	}
	else
	{
		echo "<td>&nbsp;</td>";
	}
	$sn++;
	echo "</tr>";
	}
}
echo "</table>";

 if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
<script>
function html_table_to_excel(type)
{
	var data = document.getElementById('teacher_data');

	var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

	XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

	XLSX.writeFile(file, 'teacher.' + type);
}

const export_button = document.getElementById('export_button');

export_button.addEventListener('click', () =>  {
	html_table_to_excel('xlsx');
});
</script>
</body>
</html>
