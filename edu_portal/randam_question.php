<?php
		include("database/db_connection.php");
		$subid="";
		$question="";
		$ans="";
		$ans1="";
		$ans2="";
		$ans3="";
		$ans4="";
		/*$sql="Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where subject='$_SESSION[subject]' and level='$_SESSION[level]'";
		*/
		$sql="Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion";
		$result = mysqli_query($conn_1,$sql);
		$i=1;
		$k=0;
		while($row = mysqli_fetch_array($result))
		{
			$questions[$k]=$row["question"]; //question from Database
			$an1[$k]=$row["ans1"];
			$an2[$k]=$row["ans2"];
			$an3[$k]=$row["ans3"];
			$an4[$k]=$row["ans4"];
			$ans[$k]=$row["correctno"];
		//echo "<br>".$questions[$k];
			$k++;
		}
	//$quenum=range(0,$row-1);
		//$quenum=rand(0,$row-1);
	//shuffle($quenum);
	$n=range(0,($k-1));
	shuffle($n);
	$qn=0;
	$c=2;
	$q=0;
	$c=$k;
	$allquestion="";
	//for($q=0;$q<$c; $q++)
	for($q=0;$q<$c; $q++)
			{
				$quenum=$n[$q];
			//$quenum=rand(0,($k-1));
			//$quenum[$q];
			$allquestions[$qn]= $questions[$quenum]; // Question from Array
			$allans1[$qn]= $an1[$quenum]; // answer1 from Array
			$allans2[$qn]= $an2[$quenum]; // ans2 from Array
			$allans3[$qn]= $an3[$quenum]; // ans3 from Array
			$allans4[$qn]= $an4[$quenum]; // ans4 from Array
			$allcorrect[$qn]= $ans[$quenum]; // correctans from Array
			/*
			$allquestion[$qn]= $question[$q]; // Question from Array
			$allans1[$qn]= $ans1[$q]; // answer1 from Array
			$allans2[$qn]= $ans2[$q]; // ans2 from Array
			$allans3[$qn]= $ans3[$q]; // ans3 from Array
			$allans4[$qn]= $ans4[$q]; // ans4 from Array
			$allcorrect[$qn]= $ans[$q]; // correctans from Array
			//echo $allqueston[$qn] ."<br>"; 
			*/
		//	echo $allquestions[$qn] ."<br>"; 
			//echo "hello";
			$qn=$qn+1;
			}
		
	
	$n=0;
	$n1=0;
	$s=0;
	$totalquestion=25;
	if($k<$totalquestion)
	{
	$totalquestion=$k-1;
	}

	while($s<$totalquestion)
		{
			$selectedque[$n]= $allquestions[$s];  //Question Selected to display
			$selectedans1[$n]=$allans1[$s];
			$selectedans2[$n]=$allans2[$s];
			$selectedans3[$n]=$allans3[$s];
			$selectedans4[$n]=$allans4[$s];
			$secorrectans[$n]=$allcorrect[$s];
			/*echo $selectedque[$n]."<br>";
			echo $selectedans1[$n]."<br>";
			echo $selectedans2[$n]."<br>";
			echo $selectedans3[$n]."<br>";
			echo $selectedans4[$n]."<br>";
			echo $secorrectans[$n]."<br>";
			*/
			$s=$s+1;
			
			//echo "number".$s;
			$n++;
			$n1++;
			 
		}
		$_SESSION['noofquestion']=$s;
	$array = range(1, 2);
	shuffle($array);
	for ($j=0,$c=count($array); $j<$c; $j++) 
	{
 //   echo $array[$j] . "\n";
	}
?>
<form name="quiz" id="myquiz" onSubmit="return validate()" method="Post" action="random_number.php">
<table width="60%" border="0" align="center">
<tr>
<td colspan="2" align="center"><font size="+3" color="#000066"><b><input type="hidden" name="txtqn" id="txtqn"></b></font></td>
</tr>
</table>
<hr color="#00FF00" size="4">
<table width="60%" border="0" align="center" cellpadding="0">
<tr>
<td>
<?php
	echo "Score Is: ". $_SESSION['score'];
?>
</td>
</tr>

<?php
if($k>0)
{
$sn=1;
$i=1;
?>
<tr>
<td>
<?php
	echo "<font size=+2 face=Arial>" . $selectedque[$i] . "</font>";
	echo "<input type=hidden name=ans[] value=" . $secorrectans[$i] .">";
?>
</td>
</tr>
<tr>
<td>
<font size="+1" face="Arial, Helvetica, sans-serif">
<table width="100%" border="1" bgcolor="#FFCC99" cellpadding="10">
<tr>
	<td align="left" width="50%">
				<?php
					echo "<input type=hidden name=opt1[] value=0 checked>";
					echo "A. <input type=checkbox name=opt1[] value=1>" . $selectedans1[$i];
				?>
	</td>
	<td align="left" width="50%">
		<?php
				echo "B. <input type=checkbox name=opt1[] value=2>" . $selectedans2[$i];
		?>
	</td>
</tr>
<tr>
	<td align="left">
		<?php
					echo "C. <input type=checkbox name=opt1[] value=3>" . $selectedans3[$i];
			?>
       </td>
	<td align="left">
		<?php
				echo "D. <input type=checkbox name=opt1[] value=4>" . $selectedans4[$i];
		?>
	</td>
</tr>
</table>
</font>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php
$sn++;
		$i++;
}
?>
<tr>
<td align="center" colspan="2"><input type="Submit" name="btnnext" value="Next" onClick="rand_num()"></td>
</tr>
<tr>
<td colspan="2">
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</td>
</tr>
</table>
</form>
<script>
function rand_num() 
{
  document.getElementById("txtqn").value = Math.floor(Math.random()*5);
}
</script>

