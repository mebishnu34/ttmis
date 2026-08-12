<?php
class district
{
	function savedistrict($dn, $mv, $wn)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tbldistrict(districtname, munvdc, noofward) values('$dn', '$mv', '$wn')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tbldistrict";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getBydistrict($district)
	{
		global $ado;
		
		$sql = "SElECT * FROM tbldistrict WHERE districtname='$district'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
