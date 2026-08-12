<?php
$sql="Select id, categoryid, levelid, subjectid,contentdetails,subheading, ondate from tbl_contents where topicid='$id'";
$result=$conn->query($sql);
$i=0;
while($data=$result->fetch_assoc())
		{
	
		if($i==0)
		{
		?>
		<div class="paging_frame">
		<p style="text-align:right; vertical-align: bottom;">
		<button class="pagenext">Next</button>
		</p>
		<?php
			echo "<h1>". $data["subheading"] . "</h1>";
		    echo $data["contentdetails"];
		?>
		</div>
		<?php
		}
		else
		{
		?>
		<div class="paging_frame" style="display:none;">
		<p style="text-align:right;">
		<button class="pageback">Back</button>
		<button class="pagenext">Next</button>
		</p>
		<?php
			echo "<h1>". $data["subheading"] . "</h1>";
		    echo $data["contentdetails"];
		?>
		</div>
		<?php
		}
		$i++;
		}

?>
<script src="script\paging_script.js"></script>
