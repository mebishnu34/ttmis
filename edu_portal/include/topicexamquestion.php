<?php
session_start();
include("database/db_connection.php");
	$data=mysql_query("Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where subject='$_SESSION[tsubject]' and level='$_SESSION[level]' and topic='$_POST[cmbtopic]'",$con);
	$rownum=mysql_num_rows($data);
	$i=0;
	$k=0;
	while($k<$rownum)
	{
		//echo mysql_result($data, $k, "question");
		$question[$k]=mysql_result($data, $k, "question"); //question from Database
		$ans1[$k]=mysql_result($data,$k,"ans1");
		$ans2[$k]=mysql_result($data,$k,"ans2");
		$ans3[$k]=mysql_result($data, $k, "ans3");
		$ans4[$k]=mysql_result($data, $k, "ans4");
		$ans[$k]=mysql_result($data, $k, "correctno");
		$k++;
	}
	$quenum=range(0,$rownum-1);
	shuffle($quenum);
	$qn=0;
	for($q=0, $c=count($quenum);$q<$c; $q++)
		{
			$quenum[$q];
			$allquestion[$qn]= $question[$quenum[$q]]; // Question from Array
			$allans1[$qn]= $ans1[$quenum[$q]]; // answer1 from Array
			$allans2[$qn]= $ans2[$quenum[$q]]; // ans2 from Array
			$allans3[$qn]= $ans3[$quenum[$q]]; // ans3 from Array
			$allans4[$qn]= $ans4[$quenum[$q]]; // ans4 from Array
			$allcorrect[$qn]= $ans[$quenum[$q]]; // correctans from Array
			// print $allquestion[$qn] ."<br>"; 
			$qn++;
		}
	$n=0;
	$n1=0;
	for($sqn=0; $sqn<=11; $sqn++)
		{
			$selectedque[$n]= $allquestion[$sqn];  //Question Selected to display
			$selectedans1[$n]=$allans1[$sqn];
			$selectedans2[$n]=$allans2[$sqn];
			$selectedans3[$n]=$allans3[$sqn];
			$selectedans4[$n]=$allans4[$sqn];
			$secorrectans[$n]=$allcorrect[$sqn];
			$n++;
			$n1++;
			// print $selected[$sqn]."<br>";
		}
		
	$array = range(1, 11);
	shuffle($array);
	for ($j=0,$c=count($array); $j<$c; $j++) 
	{
 //   echo $array[$j] . "\n";
	}
?>