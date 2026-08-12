<?php
include("../Processing/db_connection.php");
   include("title.htm");
  if($_GET['tid'])
  {
  $id=$_GET['tid'];
  }
   $sql="SELECT * FROM tblruntraining where id='$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
      {
	  $training= $row["trainingname"];
      $level= $row["level"];
      $subject=$row["subject"];
      $sdate=$row["startdate"];
      $edate=$row["enddate"];
      $venue=$row["venue"];
      }

?>

<HTML>
<head>
<script>
function training(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../Admin/subject.php?t="+str,true);
        xmlhttp.send();
    }
}
function level(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../Admin/subject.php?l="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
  <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<form method="Post" Action="../Object/update_run_training.php">
    <table class="maintable">
           <tr>
          <td colspan="2" align="center">Teacher Training</td>
        </tr>
		<tr>
               <td align="right">ID</td>
               <td><input type="text" name="txtid" class="normaltext" value="<?php echo $id;?>"></td>
           </tr>
              <tr>
               <td align="right">Name of Training*</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
				<option><?php echo $training;?></option>
                 <option>शिक्षक पेशागत विकासशिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
	<option><?php echo $level;?></option>
        <option>Select Level</option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>शिक्षक प्रमुख</option>
         <option>अन्य</option>
</select>
     </td>
    </tr>
    <tr>
    <td align="right">Training Subject*</td>
    <td><div id="txtHint">Subject</div>
     </td>
    </tr>
               <tr>
               <td align="right">Start Date*</td>
               <td><input type="text" name="txtsdate" class="normaltext" value="<?php echo $sdate;?>"> End Date*<input type="text" name="txtedate" class="normaltext" value="<?php echo $edate;?>"></td>
           </tr>
            <tr>
               <td align="right">Number of Days*</td>
               <td><input type="text" name="txtdays" class="normaltext"></td>
           </tr>
           <tr>
               <td align="right">Training Venue*</td>
               <td><input type="text" name="txtvenu" size="60" class="normaltext" value="<?php echo $venue;?>"></td>
           </tr>
                 
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Update" name="btndisplay" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
