<?php
include("../Processing/db_connection.php");
 if(isset($_GET['importno']))
	{
		$impno= $_GET['importno'];
		$sn=1;
		$sql="Select * FROM tblschool where importno='".$impno."'";
		$result=mysqli_query($conn,$sql);
		$html="<table border='1'>";
		$html.="<tr>";
				$html.='<th>S.No.</th>';
				$html.='<th>Name of School</th>';
				$html.='<th>School Code</th>';
				$html.='<th>Address</th>';
				$html.='<th>Local Government</th>';
				$html.='<th>Ward No.</th>';
				$html.='<th>District</th>';
				$html.='<th>Phone No</th>';
				$html.='<th>Mobile No</th>';
				$html.='<th>Head of School</th>';
				$html.='<th>E-Mail</th>';
				$html.='<th>Web Site</th>';
				$html.='<th>Login Name</th>';
				$html.='<th>Password</th>';
				$html.='<th>Remark</th>';
				$html.='</tr>';
		while($row = mysqli_fetch_array($result))
      {
				$name=$row['schoolname'];
				$scode=$row['schoolcode'];
				$address=$row['address'];
				$mun=$row['munvdc'];
				$ward=$row['wardno'];
				$district=$row['district'];
				$contact=$row['contact'];
				$mobileno=$row['mobileno'];
				$authorize=$row['authorizeperson'];
				$email=$row['email'];
				$website=$row['website'];
				$loginname=$row['loginname'];
				$pass=$row['spass'];
				$remark=$row['remark'];
				$html.="<tr>";
				$html.='<td>'.$sn.'</td>';
				$html.='<td>'.$name.'</td>';
				$html.='<td>'.$scode.'</td>';
				$html.='<td>'.$address.'</td>';
				$html.='<td>'.$mun.'</td>';
				$html.='<td>'.$ward.'</td>';
				$html.='<td>'.$district.'</td>';
				$html.='<td>'.$contact.'</td>';
				$html.='<td>'.$mobileno.'</td>';
				$html.='<td>'.$authorize.'</td>';
				$html.='<td>'.$email.'</td>';
				$html.='<td>'.$website.'</td>';
				$html.='<td>'.$loginname.'</td>';
				$html.='<td>'.$pass.'</td>';
				$html.='<td>'.$remark.'</td>';
				$html.='</tr>';
				$sn++;
		
	}
	$html.='</table>';
echo $html;
}
?>
