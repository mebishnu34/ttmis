<?php
include("database/db_connection.php");
if(isset($_GET['subid']))
	$id=$_GET['subid'];
	$quesql="Select subjectid, subject from tblsubject where subjectid='$id'";
	$querow=$conn->query($quesql);
	if($querow->num_rows>0)
	{
		if($quedata=$querow->fetch_assoc())
			{
				$_SESSION['subject']=$quedata["subject"];
			}
	}
	$sql="Select questionid, question, subject, ordering, ans1, ans2, ans3, ans4, correctno from tblquestion where subject='$_SESSION[subject]'";
	$rownum=$conn->query($sql);
	$i=0;
	$k=0;
	if($rownum->num_rows>0)
	{
	while($data=$rownum->fetch_assoc())
		{
		//echo mysql_result($data, $k, "question");
		$question[$k]=$data["question"]; //question from Database
		$ans1[$k]=$data["ans1"];
		$ans2[$k]=$data["ans2"];
		$ans3[$k]=$data["ans3"];
		$ans4[$k]=$data["ans4"];
		$ans[$k]=$data["correctno"];
		$k++;
		}
	}
	$quenum=range(0,$rownum->num_rows-1);
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
	for($sqn=0; $sqn<=1; $sqn++)
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
		
	$array = range(1, 26);
	shuffle($array);
	for ($j=0,$c=count($array); $j<$c; $j++) 
	{
 //   echo $array[$j] . "\n";
	}
?>