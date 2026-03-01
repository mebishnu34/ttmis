<?php
$sql="Select id, categoryid, levelid, subjectid,vdescription,vfilename,destination, ondate from tbl_video where topicid='$id'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
$k=1;
while($data=$result->fetch_assoc())
{
	$vfile[$k]=$data["vfilename"];
	$description[$k]=$data["vdescription"];
	$k++;
}
}
echo "<table border=0 width=80% cellpadding=20>";
for($i=1;$i<$k;)
	{
		echo "<tr>";
		for($j=1;$j<=3;$j++)
			{
			if(isset($vfile[$i]))
			{
				?>
			<td align="center">
			<video width="200" height="150" controls>
        	<source src="Admin/video_material/<?php echo $vfile[$i];?>" type="video/mp4">
    		</video> 
			<br>
			<?php
			echo "Description:<a href=Admin/video_material/". $vfile[$i] ." target=blank>" .$description[$i] ."</a>";
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
<!--
	<video width="200" height="150" controls>
        <source src="Admin/video_material/<?php //echo $data["vfilename"];?>" type="video/mp4">
    </video> 
	<br>
			<?php
			//echo "Description:<a href=Admin/video_material/".$data["vfilename"]." target=blank>" .$data["vdescription"] ."</a>";
			?>
			   <br>
			  <br>
-->

