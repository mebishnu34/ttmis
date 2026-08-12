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
	<title>Update Running Training</title>
  <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
</head>
<body>
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
   if(isset($_GET['linkid']))
   {
   $tid=$_GET['linkid'];
   		$sql = "SELECT trainingname,level, subject, startdate, enddate, trainingdays,venue,coordinator, mobileno,starttime, remark from tblruntraining where id='$tid'";
		$result = $conn->query($sql);
			if ($result->num_rows > 0)
   				{
    				while($row = $result->fetch_assoc())
    				{
    		     		$training=$row["trainingname"];
						$level=$row["level"];
						$subject=$row["subject"];
						$sdate=$row["startdate"];
						$edate=$row["enddate"];
						$venue=$row["venue"];
						$days=$row["trainingdays"];
						$coordinator=$row["coordinator"];
						$cmobileno=$row["mobileno"];
						$remark=$row["remark"];
						$time=$row["starttime"];

					}
				}
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<form method="Post" Action="../Object/edit_run_training.php">
    <table class="subtable"  cellpadding="10">
           <tr>
          <td colspan="2" align="center">Teacher Training</td>
        </tr>

                      <tr>
               <td align="right">Name of Training*</td>
               <td><input type="Hidden" name="txtid" value="<?php echo $tid;?>" readonly="True">
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
                 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
				<?php echo $training;?>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
</select><?php echo $level;?>
     </td>
    </tr>
    <tr>
    <td align="right">Training Subject*</td>
    <td><div id="txtHint">Subject</div>
     </td>
    </tr>
               <tr>
               <td align="right">Start Date*</td>
               <td><input type="text" name="txtsdate" class="normaltext" value="<?php echo $sdate;?>"> End Date*<input type="text" name="txtedate" class="normaltext" value=<?php echo $edate;?>></td>
           </tr>
            <tr>
               <td align="right">Number of Days*</td>
               <td><input type="text" name="txtdays" class="normaltext" value="<?php echo $days;?>"></td>
           </tr>
           <tr>
               <td align="right">Training Venue*</td>
               <td><input type="text" name="txtvenu" size="60" class="normaltext" value="<?php echo $venue;?>"></td>
           </tr>
       <tr>
               <td align="right">Training Coordinator*</td>
               <td><input type="text" name="txtcoordinator" size="60" value="<?php echo $coordinator;?>"></td>
           </tr>
    <tr>
               <td align="right">Mobile No.*</td>
               <td><input type="text" name="txtmobile" value="<?php echo $cmobileno;?>"></td>
           </tr>
            <tr>
               <td align="right">Training Time</td>
               <td><input type="text" name="txttime" size="60" value="<?php echo $time;?>"></td>
           </tr>           
		   <tr>
               <td align="right">Remark</td>
               <td><input type="text" name="txtremark" size="60" value="<?php echo $remark;?>"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Edit" name="btndisplay" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
