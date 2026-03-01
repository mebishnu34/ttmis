<?php
include("../Processing/db_connection.php");
 if(isset($_GET['importno']))
	{
		$impno= $_GET['importno'];
		$sn=1;
		$sql="Select * FROM tblteacher where importno='".$impno."'";
		$result=mysqli_query($conn,$sql);
		$html="<table border='0' width='100%'>";
		$html.="<tr>";
				$html.='<th>S.No.</th>';
				$html.='<th>Name of Teacher</th>';
				$html.='<th>Gender</th>';
				$html.='<th>Date of Birth</th>';
				$html.='<th>Name of Father</th>';
				$html.='<th>Address</th>';
				$html.='<th>E-Mail</th>';
				$html.='<th>District</th>';
				$html.='<th>Local Government</th>';
				$html.='<th>Ward No</th>';
				$html.='<th>Contact No</th>';
				$html.='<th>Appoint Date</th>';
				$html.='<th>Appoint Type</th>';
				$html.='<th>Working Level</th>';
				$html.='<th>School Code</th>';
				$html.='<th>Teacher Code</th>';
				$html.='<th>Teaching Level</th>';
				$html.='<th>Qualification</th>';
				$html.='<th>Faculty</th>';
				$html.='<th>Major Subject</th>';
				$html.='<th>Teaching Subject</th>';
				$html.='<th>Category</th>';
				$html.='<th>Login Name</th>';
				$html.='<th>Pass Word</th>';
				$html.='<th>Remark</th>';
				$html.='</tr>';
		while($row = mysqli_fetch_array($result))
      {
				$html.="<tr>";
				$html.='<td>'.$sn.'</td>';
				$html.='<td>'.$row['tname'].'</td>';
				$html.='<td>'.$row['gender'].'</td>';
				$html.='<td>'.$row['dob'].'</td>';
				$html.='<td>'.$row['fathername'].'</td>';
				$html.='<td>'.$row['address'].'</td>';
				$html.='<td>'.$row['email'].'</td>';
				$html.='<td>'.$row['district'].'</td>';
				$html.='<td>'.$row['munvdc'].'</td>';
				$html.='<td>'.$row['wardno'].'</td>';
				$html.='<td>'.$row['tcontact'].'</td>';
				$html.='<td>'.$row['appointdate'].'</td>';
				$html.='<td>'.$row['appointtype'].'</td>';
				$html.='<td>'.$row['workinglevel'].'</td>';
				$html.='<td>'.$row['schoolcode'].'</td>';
				$html.='<td>'.$row['teachercode'].'</td>';
				$html.='<td>'.$row['teachinglevel'].'</td>';
				$html.='<td>'.$row['qualification'].'</td>';
				$html.='<td>'.$row['faculty'].'</td>';
				$html.='<td>'.$row['majorsubject'].'</td>';
				$html.='<td>'.$row['teachingsubject'].'</td>';
				$html.='<td>'.$row['category'].'</td>';
				$html.='<td>'.$row['loginname'].'</td>';
				$html.='<td>'.$row['tpass'].'</td>';
				$html.='<td>'.$row['remark'].'</td>';
				$html.='</tr>';
				$sn++;
		
	}
	$html.='</table>';
echo $html;
}
?>
