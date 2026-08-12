<?php
class user
{
	function saveuser($un, $g, $ln, $up, $ut)
	{
		global $ado;
		$date = date("Y-m-d");
		$sql = "INSERT INTO tbluser(uname, ugender, loginname, upass, utype) values('$un', '$g', '$ln', '$up','$ut')";
		$ado->exec($sql);
		return true;
	}
	
	
function getAll()
	{
		global $ado;
		$sql = "SElECT * FROM tbluser";
		$result = $ado->exec($sql);
		$row = $ado->count_row($result);
		return $result;
	}

	function getByuser($un)
	{
		global $ado;
		
		$sql = "SElECT * FROM tbluser WHERE username='$un'";
		$result = $ado->exec($sql);
		$row=$ado->count_row($result);
		return $result;
	}
}


?>
