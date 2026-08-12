<?php
$obj=new Database();
extract($_POST);
//Saved Records Inside Database
if(isset($save))
{
//here admin is table name, $userName and $pass  entered by html form  
$obj->saveRecords("admin",$userName,$Pass);
echo "Records Saved ";
}
?>