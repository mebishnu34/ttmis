<?php
ob_start();
$content=$_POST['contents'];
include("../database/db_connection.php");
if($_POST['txtwname']<>"" && $_POST['txtsubject'] && $_POST['contents']<>"")
	{
			$sql="Select writername, subject from tblarticle where writername='$_POST[txtwname]' and topic='$_POST[txttopic]'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/artical/writer_artical.php?msg="Found Duplicate!"');
						}
					else
						{
						$sql="Insert into tblarticle(writername, subject, topic, source, indexno, article, ondate, remark) values('$_POST[txtwname]', '$_POST[txtsubject]','$_POST[txttopic]','$_POST[txtsource]', '$_POST[txtindex]','$_POST[contents]', now(),'running')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/artical/writer_artical.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/artical/writer_artical.php?msg="Save Successfully"');
							}
						}
		}
else
	{
		header('location: ../Admin/artical/writer_artical.php?msg="Field is required"');
	}	
ob_flush();
?>