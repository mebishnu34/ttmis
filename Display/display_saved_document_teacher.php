<?php
include("Processing/db_connection.php");
$count=0;
$comment="";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<form method="Post" Action="download.php"> 
<!--<form method="Post" Action="download_process.php">-->
<body class="content">
<table width="800">
<tr>
<th>क्र.सं.</th>
<th>कागजातको नाम</th>
<th>फाइलको नाम</th>
<th>सबमित मिति</th>
<th></th>
</tr>
<?php
	$sn=1;
	$sql = "SELECT document_id,document_name, file_name, submitdate FROM tbladmin_document where accessby='Common'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
   	{
    	while($row1 = $result->fetch_assoc())
        {
		?>
		<tr>
		<td><?php echo $sn;?></td>
		<td><?php echo $row1["document_name"];?></td>
		<td bgcolor="#336699" align="left"><a href="document/<?php echo $row1["file_name"];?>" target="_blank"><?php echo $row1["file_name"];?></td>
		<td><?php echo $row1["submitdate"];?></td>
		<td align="center"><INPUT type="checkbox" name="document[]" value="<?php echo $row1["document_id"];?>"></td>
		</tr>
		<?php
		$sn++;
		}
	}
	?>
<tr>
<td align="center" colspan="5">
<input type="Submit" value="Download" name="btnsave">
</td>
</tr>
</table>
</div>

