<?php
$sql="Select id, categoryid, levelid, subjectid,adescription,afilename,destination, ondate from tbl_audio where topicid='$id'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
$k=1;
while($data=$result->fetch_assoc())
		{
		$afile[$k]=$data["afilename"];
		$description[$k]=$data["adescription"];
		$k++;
		}
	}
echo "<table border=0 width=80% cellpadding=20>";
for($i=1;$i<$k;)
	{
		echo "<tr>";
		for($j=1;$j<=3;$j++)
			{
			if(isset($afile[$i]))
			{
			?>
			<td align="center">
			<audio width="200" height="150" controls>
                    <source src="Admin/audio_material/<?php echo $$afile[$i];?>" type="audio/mp3">
                    <source src="Admin/audio_material/<?php echo $afile[$i];?>" type="audio/wav">
                    
            </audio> 
			<br>
			<?php
			echo "Description:" .$description[$i];
			?>
			</td>
			<?php
			$i=$i+1;
			}
			}
			echo "</tr>";
		echo "<tr>";
		echo "<td colspan=3>&nbsp;</td>";
		echo "</tr>";
	}
echo "</table>";
?>
