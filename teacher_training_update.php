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
        xmlhttp.open("GET","subject.php?t="+str,true);
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
        xmlhttp.open("GET","subject.php?l="+str,true);
        xmlhttp.send();
    }
}
</script>
<TITLE>TTMIS:Bagamati</TITLE>
  <link rel="stylesheet" href="CSS/main_table.css">
</head>
<?php
   include("Processing/db_connection.php");
   include("Input/title.htm");
   if(isset($_GET['tid']))
{
	$tid=$_GET['tid'];
	$sql = "SELECT * FROM tblttraining where ID='$tid'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0)
		   {
		    if($row = $result->fetch_assoc())
		    {
			$trainingid=$row["trainingid"];
			$teacherid=$row["trainingid"];
			$gn=$row["gnumber"];
			$coordinator=$row["coordinator"];
			$mobileno=$row["mobileno"];
			$sdate=$row["sdate"];
			$edate=$row["edate"];
			$training=$row["training"];
			$duration=$row["duration"];
			$div=$row["division"];
			$org=$row["organization"];
			}
		}
	$sql1 = "SELECT * FROM tbltraining where ID='$trainingid'";
	$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0)
		   {
			if($row1 = $result1->fetch_assoc())
		    {
			$name=$row1["trainingname"];
			$level=$row1["level"];
			}
  		}
}
?>

<BODY class="bg">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><img src="Image\banner.jpg" width="800" height="150"></td>
</tr>
</table>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<form method="Post" Action="Object/update_te_training.php">
    <table  cellpadding="5" align="center">
           <tr>
          <td colspan="2" align="center">Teacher Training Update</td>
        </tr>
              <tr>
               <td align="right">Name of Training*</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
				<option><?php echo $name;?></option>
                 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
        <option><?php echo $level;?></option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
</select>
     </td>
    </tr>
    <tr>
    <td align="right">Training(Import)</td>
    <td><?php echo $training;?>   </td>
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
               <td><input type="text" name="txtdays" class="normaltext" value="<?php echo $duration;?>"></td>
           </tr>
           <tr>
               <td align="right">Training Venue*</td>
               <td><input type="text" name="txtvenu" size="60" class="normaltext" value="<?php echo $org;?>"></td>
           </tr>
		   <tr>
               <td align="right">Group Number</td>
               <td><input type="text" name="txtgnumber" size="5" class="normaltext" value="<?php echo $gn;?>"></td>
           </tr>
               <tr>
               <td align="right">Co-Ordinator</td>
               <td><input type="text" name="txtcoordinator" size="60" class="normaltext" value="<?php echo $coordinator;?>"></td>
           </tr>
		   <tr>
               <td align="right">Mobile No.</td>
               <td><input type="text" name="txtmobile" size="20" class="normaltext" value="<?php echo $mobileno;?>"></td>
           </tr>  
		   <tr>
               <td align="right">Division</td>
               <td><input type="text" name="txtdivision" size="40" class="normaltext" value="<?php echo $div;?>"></td>
           </tr> 
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Update" name="btnupdate" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
