<?php
session_start();
if(isset($_GET['btnnext']))
{
$_SESSION['qnumber']=$_POST['txtqn'];
}
if(isset($_GET['examid']))
	{
	$_SESSION['score']=0;
	$_SESSION['eid']=$_GET['examid'];
	$_SESSION['response']="Test";
	}
if(isset($_POST['btnnext']))
	{
	$_SESSION['score'] = $_SESSION['score']+100;
	}
if(isset($_GET['uque']))
	{
	$_SESSION['uque']=$_GET['uque'];
	$_SESSION['response']="que_ans";
	}
if(isset($_GET['que']))
	{
	$_SESSION['cque']=$_GET['que'];
	$_SESSION['response']="Comments";
	//echo $_SESSION['cque'];
	}
header('Location: member.php');
?>