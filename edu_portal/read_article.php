<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="stylesheet" type="text/css" href="css/table.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>E-Book</title>
</head><link rel="stylesheet" type="text/css" href="css/body.css">
<body bgcolor="#CCCCCC">
<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td align="center">
<table width="100%" bgcolor="#0000FF">
<tr>
<td align="left"><img src="image/banner.jpg" height="100"></td>
<td align="center"></td>
</tr>
</table>
<table width="100%" bgcolor="#0000FF">
<tr>
<td valign="top" width="25%" align="center">
<div class="tabledesign2">
<table width="100%" align="center">
<tr>
<td align="center" bgcolor="#FF0000"><b><font color="#FFFFFF">Articles</font></b></td>
</tr>
<tr>
<td align="center" bgcolor="#0000FF">
<?php
include("include/artical_subject.php");
?>
</td>
</tr>
</table>
</div>
</td>
<td valign="top" width="75%" bgcolor="#FFFFCC" colspan="2">
<?php
if(isset($_GET['alinkid']))
	{
		$_SESSION['id']=$_GET['alinkid'];
	}
if($_SESSION['id']<>"")
    {
		$sql1="Select id, writername, subject,topic, article from tblarticle where id='$_SESSION[id]'";
		$result=$conn->query($sql1);
		if($result->num_rows>0)
		{
			if($data=$result->fetch_assoc())
				{
				$subject=$data["subject"];
				$article=$data["article"];
				$writer=$data["writername"];
				$topic=$data["topic"];
				$articleid=$data["id"];
				}
		}
	?>
	<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td><font size="+2" color="#0000FF"><b><?php echo $subject ."-". $topic . "</b></font>(" . $writer .  ")"; ?></td>
<td align="right"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($wdata["photo"]) . '" width="50" height="60">';?></td>
</tr>
<tr>
<td colspan="2" align="justify"><?php echo $article;?></td>
</tr>
<?php
$sqlv="Select destination, filename from tblvideo";
$resultv=$conn->query($sqlv);
if($resultv->num_rows>0)
		{
			while($datav=$resultv->fetch_assoc())
				{
				    ?>
				<tr>
                    <td colspan="2" align="center"><?php echo $datav["filename"];?></td>
                    
                </tr>
                <tr>
                <td colspan="2" align="center">
                <video width="500" controls>
                <source src="video/<?php echo $datav["filename"];?>" type="video/mp4">
                <source src="video/sample.ogg" type="video/ogg">
                Video Not Display.
                </video>
                </td>
                </tr>
                
				    
	
<?php
				}
		}
?>
<tr>
                    <td colspan="2" align="center">Audio</td>
                    
                </tr>
<?php
$sqla="Select destination, filename from tblaudio";
$resulta=$conn->query($sqla);
if($resulta->num_rows>0)
		{
			while($dataa=$resulta->fetch_assoc())
				{
				    ?>
				<tr>
                    <td colspan="2" align="center"><?php echo $dataa["filename"];?></td>
                    
                </tr>
                <tr>
                <td colspan="2" align="center">
                <audio controls>
                <source src="audio/<?php echo $dataa["filename"];?>" type="audio/wav">
                <source src="audio/sample.ogg" type="audio/mp3">
                Audio Not Display.
                </audio>
                </td>
                </tr>
                
				    
	
<?php
				}
		}
?>
<tr>
                    <td colspan="2" align="center">Resource Link</td>
                    
                </tr>

<tr>
    <?php
$sqlh="Select hyperlink from tblhyperlink";
$resulth=$conn->query($sqlh);
if($resulth->num_rows>0)
		{
			while($datah=$resulth->fetch_assoc())
				{
				    ?>
				<tr>
                <td colspan="2" align="Left" bgcolor="Blue">
                    
                <a href="<?php echo $datah["hyperlink"];?>" target="blank"><?php echo $datah["hyperlink"];?>"</a>
                </td>
                </tr>
                
				    
	
<?php
				}
		}
?>
<td colspan="2" align="right" bgcolor="#0000FF"><a href=read_article.php?que=<?php echo $articleid; ?>>Ask Question</a>&nbsp;&nbsp;&nbsp;<a href=read_article.php?examid=<?php echo $articleid; ?>>Get Question</a></td>
</tr>
</table>
<?php		
	}
?>

</td>
</td>
</table>
<table width="100%" align="center">

<?php
//include("include/reference.php");
if(isset($_GET['que']))
	{
	    //echo $_GET['que'];
		include("ask_question_1.php");
	}

if(isset($_GET['examid']))
	{
	    //echo $_GET['examid'];
		include("randam_question.php");
	}
?>

</table>

</body>
</html>
<?php
ob_flush();
?>
