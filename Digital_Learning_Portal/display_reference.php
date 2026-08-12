<?php
if($subject=='TPD')
	{
$sql="Select id, categoryid, levelid, subjectid,link,referenceurl from tbl_hyperlink where categoryid=3";
$result=$conn->query($sql);
	}
elseif($subject=='ROT')
    {
		$sql="Select id, categoryid, levelid, subjectid,link,referenceurl from tbl_hyperlink where categoryid=4";
		$result=$conn->query($sql);		
	}
elseif($subject=='SLR')
    {
		$sql="Select id, categoryid, levelid, subjectid,link,referenceurl from tbl_hyperlink where categoryid=5";
		$result=$conn->query($sql);		
	}
while($data=$result->fetch_assoc())
{
?>
&#127909; &nbsp;&nbsp;&nbsp;<a href="<?php echo $data["referenceurl"];?>target="_blank><?php echo $data["link"];?></a><br>
<?php
}
?>