<?php
session_start();
if(isset($_GET['s']))
{
$_SESSION['sub1']=$_GET['s'];
//echo $_SESSION['sub1'];
?>

<select name="cmbstep" onchange="trainingstep(this.value)" class="normaltext">
<option>Select Training Step</option>
<option>पहिलो</option>
<option>दोस्रो</option>
<option>तेस्रो</option>
<option>पुरा भएकाे</option>
<option>नलिएकाे</option>
<option>M1</option>
<option>M2</option>
<option>P</option>
<?php
}
?>