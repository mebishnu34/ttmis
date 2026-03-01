<?php
session_start();
include("../php_processing/db_connection.php");
if($_GET['topid'])
	{
		$id=$_GET['topid'];
		$sql="Select content_topic from tbltopic where id='$id'";
		$rownum=$conn->query($sql);
		if($rownum->num_rows>0)
			{
				if($data1=$rownum->fetch_assoc())
					{
						$topic=$data1["content_topic"];
					}
			}
        $sql="Select id, categoryid, levelid, subjectid,contentdetails,subheading, ondate from tbl_contents where topicid='$id'";
		$result=$conn->query($sql);
		$i=0;
		
	?>
Name of Subject: <?php echo $topic;?>:Text Material
<table width="80%" align="center" border="1", cellspacing="0">
<tr>
	<td width="100" align="center">S.No</td>
	<td align="center">Category</td>
	<td align="center">Level</td>
    <td align="center">Subject</td>
    <td align="center">Heading</td>
    <td align="center">Details</td>

	<td></td>
</tr>

<?php
		while($data=$result->fetch_assoc())
		{
			$sql1="Select id, categoryname from tbl_catagory where id='$data[categoryid]'";
			$resultc=$conn->query($sql1);
			if($resultc->num_rows>0)
				{
					if($datac=$resultc->fetch_assoc())
						{
							$category=$datac["categoryname"];
						}
				}
			$sql1="Select id, levelname from tbllevel where id='$data[levelid]'";
			$resultl=$conn->query($sql1);
			if($resultl->num_rows>0)
				{
					if($datal=$resultl->fetch_assoc())
						{
							$level=$datal["levelname"];
						}
				}
            $sql1="Select id, subjectname from tbl_subject where id='$data[subjectid]'";
            $resultc=$conn->query($sql1);
            if($resultc->num_rows>0)
                {
                if($datac=$resultc->fetch_assoc())
                    {
                        $subject=$datac["subjectname"];
                        
                    }
                }
            echo "<tr>";
			echo "<td align=center>" . ($i+1). "</td>";
            echo "<td>" . $category . "</td>";
			echo "<td>" . $level . "</td>";
            echo "<td>" . $subject . "</td>";
            echo "<td>" . $data["subheading"] . "</td>";
			echo "<td>" . $data["contentdetails"] . "</td>";
			echo "<td align=center><a href=details_action.php?id=".  $data["id"] . ">Edit</a> &nbsp;&nbsp;&nbsp;<a href=display_question.php?id=".  $data["id"] . ">Question</a></td>";
			echo "</tr>";
			$i++;
		}

?>
</table>
<?php
$sql="Select id, categoryid, levelid, subjectid,vfilename,destination, ondate from tbl_video where topicid='$id'";
$result=$conn->query($sql);
$i=0;
?>
<br>
Name of Subject: <?php echo $topic;?>:Vedio
<table width="80%" align="center" border="1", cellspacing="0">
<tr>
	<td width="100" align="center">S.No</td>
	<td align="center">Category</td>
	<td align="center">Level</td>
    <td align="center">Subject</td>
    <td align="center">Details</td>

	<td></td>
</tr>

<?php
		while($data=$result->fetch_assoc())
		{
			$sql1="Select id, categoryname from tbl_catagory where id='$data[categoryid]'";
			$resultc=$conn->query($sql1);
			if($resultc->num_rows>0)
				{
					if($datac=$resultc->fetch_assoc())
						{
							$category=$datac["categoryname"];
						}
				}
			$sql1="Select id, levelname from tbllevel where id='$data[levelid]'";
			$resultl=$conn->query($sql1);
			if($resultl->num_rows>0)
				{
					if($datal=$resultl->fetch_assoc())
						{
							$level=$datal["levelname"];
						}
					}
            $sql1="Select id, subjectname from tbl_subject where id='$data[subjectid]'";
            $resultc=$conn->query($sql1);
            if($resultc->num_rows>0)
                {
                if($datac=$resultc->fetch_assoc())
                    {
                        $subject=$datac["subjectname"];
                        
                    }
                }
            echo "<tr>";
			echo "<td align=center>" . ($i+1). "</td>";
            echo "<td>" . $category . "</td>";
			echo "<td>" . $level . "</td>";
            echo "<td>" . $subject . "</td>";
			echo "<td align=center>";
            ?>
            <video width="200" height="150" controls>
                    <source src="video_material/<?php echo $data["vfilename"];?>" type="video/mp4">
                    
                </video>  
              
            <?php
            echo "</td>";
			echo "<td align=center><a href=details_action.php?id=".  $data["id"] . ">Edit</a>&nbsp;&nbsp;&nbsp;<a href=display_question.php?id=".  $data["id"] . ">Question</a></td>";
			echo "</tr>";
			$i++;
		}

?>
</table>

<?php
$sql="Select id, categoryid, levelid, subjectid,afilename,destination, ondate from tbl_audio where topicid='$id'";
$result=$conn->query($sql);
$i=0;
?>
<br>
Name of Subject: <?php echo $topic;?>:Audio
<table width="80%" align="center" border="1", cellspacing="0">
<tr>
	<td width="100" align="center">S.No</td>
	<td align="center">Category</td>
	<td align="center">Level</td>
    <td align="center">Subject</td>
    <td align="center">Details</td>

	<td></td>
</tr>

<?php
		while($data=$result->fetch_assoc())
		{
			$sql1="Select id, categoryname from tbl_catagory where id='$data[categoryid]'";
			$resultc=$conn->query($sql1);
			if($resultc->num_rows>0)
				{
					if($datac=$resultc->fetch_assoc())
						{
							$category=$datac["categoryname"];
						}
				}
			$sql1="Select id, levelname from tbllevel where id='$data[levelid]'";
			$resultl=$conn->query($sql1);
			if($resultl->num_rows>0)
				{
					if($datal=$resultl->fetch_assoc())
						{
							$level=$datal["levelname"];
						}
				}
            $sql1="Select id, subjectname from tbl_subject where id='$data[subjectid]'";
            $resultc=$conn->query($sql1);
            if($resultc->num_rows>0)
                {
                if($datac=$resultc->fetch_assoc())
                    {
                        $subject=$datac["subjectname"];
                        
                    }
                }
            echo "<tr>";
			echo "<td align=center>" . ($i+1). "</td>";
            echo "<td>" . $category . "</td>";
			echo "<td>" . $level . "</td>";
            echo "<td>" . $subject . "</td>";
			echo "<td align=center>";
            ?>
            <audio width="200" height="150" controls>
                    <source src="audio_material/<?php echo $data["afilename"];?>" type="audio/mp3">
                    <source src="audio_material/<?php echo $data["afilename"];?>" type="audio/wav">
                    
            </audio>  
              
            <?php
            echo "</td>";
			echo "<td align=center><a href=details_action.php?id=".  $data["id"] . ">Edit</a>&nbsp;&nbsp;&nbsp;<a href=display_question.php?id=".  $data["id"] . ">Question</a></td>";
			echo "</tr>";
			$i++;
		}

?>
</table>

<?php
$sql="Select id, categoryid, levelid, subjectid,link,referenceurl from tbl_hyperlink where topicid='$id'";
$result=$conn->query($sql);
$i=0;
?>
<br>
Name of Subject: <?php echo $topic;?>:Reference
<table width="80%" align="center" border="1", cellspacing="0">
<tr>
	<td width="100" align="center">S.No</td>
	<td align="center">Category</td>
	<td align="center">Level</td>
    <td align="center">Subject</td>
    <td align="center">Details</td>

	<td></td>
</tr>

<?php
		while($data=$result->fetch_assoc())
		{
			$sql1="Select id, categoryname from tbl_catagory where id='$data[categoryid]'";
			$resultc=$conn->query($sql1);
			if($resultc->num_rows>0)
				{
					if($datac=$resultc->fetch_assoc())
						{
							$category=$datac["categoryname"];
						}
				}
			$sql1="Select id, levelname from tbllevel where id='$data[levelid]'";
			$resultl=$conn->query($sql1);
			if($resultl->num_rows>0)
				{
				if($datal=$resultl->fetch_assoc())
					{
						$level=$datal["levelname"];
					}
				}
            $sql1="Select id, subjectname from tbl_subject where id='$data[subjectid]'";
            $resultc=$conn->query($sql1);
            if($resultc->num_rows>0)
                {
                if($datac=$resultc->fetch_assoc())
                    {
                        $subject=$datac["subjectname"];
                        
                    }
                }
            echo "<tr>";
			echo "<td align=center>" . ($i+1). "</td>";
            echo "<td>" . $category . "</td>";
			echo "<td>" . $level . "</td>";
            echo "<td>" . $subject . "</td>";
            echo "<td align=center><a href=".$data["referenceurl"]."target = _blank>" . $data["link"] ."</a> </td>";
			echo "<td align=center><a href=details_action.php?id=".  $data["id"] . ">Edit</a>&nbsp;&nbsp;&nbsp;<a href=display_question.php?id=".  $data["id"] . ">Question</a></td>";
			echo "</tr>";
			$i++;
		}

?>
</table>
<?php
	}
?>