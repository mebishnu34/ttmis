<?php
include("header.php");
?>
<table width="100%" align="center">
<tr>
<td bgcolor="#0066FF" width="200" valign="top">
<a href="index.php?linkid=7">New User</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=2">Faculty</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=3">New Subject</a><br>
<hr color="#FFFFFF">
<hr color="#FFFFFF">
<a href="index.php?linkid=301">New Video</a><br>
<hr color="#FFFFFF">
<hr color="#FFFFFF">
<a href="index.php?linkid=302">New Audio</a><br>
<hr color="#FFFFFF">
<hr color="#FFFFFF">
<a href="index.php?linkid=303">New Hyperling</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=4">Display Subject</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=8">Display Question</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=16">Display Artical</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=18">Add Question</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=19">Display Question</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=5">Display Member</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=6">Display user</a><br>
<hr color="#FFFFFF">
<a href="index.php?linkid=21">Log Off</a><br>
</td>
<td bgcolor="#FFCCCC" width="10">&nbsp;</td>
<td valign="top" align="center">
<?php
	if(isset($_GET['linkid']))
		{
			$id=$_GET['linkid'];
				if($id==1)
					{
						include("level_entry.php");
					}
				elseif($id==2)
					{
						include("facaulty_entry.php");
					}
				elseif($id==3)
					{
						include("subject.php");
					}
				elseif($id==301)
					{
						include("video.php");
					}
				elseif($id==302)
					{
						include("audio.php");
					}
				elseif($id==303)
					{
						include("hyperlink.php");
					}
				elseif($id==4)
					{
						include("display_subject.php");
					}
				elseif($id==5)
					{
						include("display_member.php");
					}
				elseif($id==6)
					{
						include("display_user.php");
					}
				elseif($id==7)
					{
						include("new_user.php");
					}
				elseif($id==8)
					{
						include("display_question.php");
					}
				elseif($id==9)
					{
						include("edu_news.php");
					}
				elseif($id==10)
					{
						include("social_news.php");
					}
				elseif($id==11)
					{
						include("term_condition.php");
					}
				elseif($id==12)
					{
						include("edit_term_condition.php");
					}
				elseif($id==13)
					{
						include("artical/writer_registration.php");
					}
				elseif($id==14)
					{
						include("artical/display_writer.php");
					}
				elseif($id==16)
					{
						include("artical/display_artical.php");
					}
				elseif($id==18)
					{
						include("exam/display_classsubject.php");
					}
				elseif($id==19)
					{
						include("exam/display_classquestiont.php");
					}
				elseif($id==21)
					{
						header('Location:login.php');
					}
				elseif($id==22)
					{
						include("que_collection.php");
					}
				elseif($id==23)
					{
						include("display_nationalnews.php");
					}
				elseif($id==24)
					{
						include("display_internationalnews.php");
					}
				elseif($id==25)
					{
						include("display_onlinevisitor.php");
					}
			}
		if(isset($_GET['msg']))
			{
				echo $_GET['msg'];
			}
		if(isset($_GET['elink']))
			{
				$id=$_GET['elink'];
				include("edu_news_action.php");
			}
		if(isset($_GET['intlink']))
			{
				$id=$_GET['intlink'];
				include("intnews_action.php");
			}
		?>
	
</td>
</tr>
</table>
</body>
</html>

<?php
if(isset($_GET['msg']))
{
	echo $_GET['msg'];
}
if(isset($_GET['vid']))
	{
	$vid=$_GET['vid'];
	mysql_query("update tblloginreport set remark='OFF' where reportid='$vid'",$con);
	}
ob_flush();
?>