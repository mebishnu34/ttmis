<?php
class organization
{
	function saveorganization($org, $a, $c)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblorganization(orgname, orgaddress, orgcontact) values('$org', '$a', '$c')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblorganization";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

}


?>
