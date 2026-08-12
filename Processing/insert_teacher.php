<?php
class teacher
{
	function saveteacher($tname, $gender,$dob,$vdc, $ward, $saddress,$adate,$atype,$level,$sname,$address)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tblhealth(tname, gender,dateofbirth,munivdc, wardno, schooladdress,appointmentdate,appointtype,level,schoolname,fulladdress) values('$tname', '$gender','$dob','$vdc', '$ward', '$saddress','$adate','$atype','$level','$sname','$address')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tblteacher";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getBylevel($level)
	{
		global $ado;
		
		$sql = "SElECT * FROM tblteacher WHERE level = '$level'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>