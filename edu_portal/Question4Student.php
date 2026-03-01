<?php
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
include("include/examquestion.php");
?>
<script type="text/javascript">
    window.onbeforeunload = function() 
	{
        return "Are you Sure To Submit your Answer? Then Leave the page";
    }
EnableSubmit = function(val)
{
    var sbmt = document.getElementById("Accept");

    if (val.checked == true)
    {
        sbmt.disabled = false;
    }
    else
    {
        sbmt.disabled = true;
    }
}       
</script>
<form method="post" action="php/SaveResult.php">
<table width="800" border="0" align="center">
<tr>
<td align="left" width="100" colspan="2" bgcolor="#00FFFF">Subject :- <?php echo $_SESSION['subject']; ?></td>
</tr>
<tr>
<td align="right">Full Mark:-50</td>
<td align="right"></td>
</tr>
<tr>
<td colspan="2" align="center"><font size="+3" color="#000066"><b>Tick in only one option of each question.</b></font></td>
</tr>
</table>
<hr color="#00FF00" size="4">
<table width="800" border="0" align="center">
<?php
while($i<=1)
	{
	?>
<tr>
<?php
	echo "<td width=30><font size=+2 face=Arial>" . ($i+1) . ")</font></td>";
	echo "<td><font size=+2 face=Arial>" . $selectedque[$i] . "</font></td>";
	echo "<input type=hidden name=ans[] value=" . $secorrectans[$i] .">";
?>
</tr>
<tr>
<td colspan="2">
<font size="+1" face="Arial, Helvetica, sans-serif">
<table width="100%" border="0" bgcolor="#FFFFFF">
<tr>
	<td align="left" width="500">
				<?php
					echo "<input type=hidden name=opt1[] value=0 checked>";
					echo "A. <input type=checkbox name=opt1[] value=1>" . $selectedans1[$i];
				?>
	</td>
	<td align="left" width="500">
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
<hr>
</font>
</td>
</tr>
<?php

		$i++;
}
?>
<tr>
<td align="center" bgcolor="#00FF00" colspan="2">Check Below Check Box</td>
</tr>
<tr>
<td align="center" colspan="2"><input type="checkbox" name="Accept" onClick="EnableSubmit()" > I am sure to submit my answer!</td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="sbmt" value="Submit" >&nbsp;&nbsp;<input type="submit" name="btnans" value="Get Answer Sheet"></td>
</tr>
<tr>
<td>
<?php
if(isset($_GET['msg']))
	{
		print $_GET['msg'];
	}
?>
</td>
</tr>
</table>
</form>
