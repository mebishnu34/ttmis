<?php
if(isset($_POST["btnupdate"]))
{
include("Processing/db_connection.php");
$sqlt = "SELECT teacherid FROM tblttraining where munid=0";
$resultt = $conn->query($sqlt);
$sn=1;
$mun="";
$ID="";
if($resultt->num_rows > 0)
	{
	while($rowt = $resultt->fetch_assoc())
		{
			$tcode=$rowt["teacherid"];
			$sql1 = "SELECT munvdc FROM tblteacher where teachercode='$tcode'";
			$result = $conn->query($sql1);
				if ($result->num_rows > 0)
   						{
			    		if($row = $result->fetch_assoc())
				    		{
							$mun=$row["munvdc"];
							$sqls = "SELECT ID FROM tbldistrict where munvdc='$mun'";
							$results = $conn->query($sqls);
								if($results->num_rows > 0)
									{
									if($sdata = $results->fetch_assoc())
										{
								 		$ID=$sdata["ID"];
										//mysqli_query($conn,"UPDATE tblttraining set munid='$ID' where teacherid='$tcode'");
										}
   									}
							}
						}
			echo $sn."-" . $tcode . "-" . $mun . "-" . $ID . "<br>";
			$sn++;
		}
	}				
}
?>

<form method="post" action="update_mun.php">
<center>

<input type="submit" value="Update" name="btnupdate">
</center>
</form>