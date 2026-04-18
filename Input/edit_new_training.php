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
   		$sql = "SELECT financialyear,trainingname,level, subject, startdate, enddate, trainingdays,venue,coordinator, mobileno,starttime,budgetsource, budgetamount, remark from tblruntraining where id='$tid'";
		$result = $conn->query($sql);
			if ($result->num_rows > 0)
   				{
    				while($row = $result->fetch_assoc())
    				{
                        $fyear=$row["financialyear"];
    		     		$training=$row["trainingname"];
						$level=$row["level"];
						$subject=$row["subject"];
						$sdate=$row["startdate"];
						$edate=$row["enddate"];
						$venue=$row["venue"];
						$days=$row["trainingdays"];
						$coordinator=$row["coordinator"];
						$cmobileno=$row["mobileno"];
                        $source=$row["budgetsource"];
						$expamount=$row["budgetamount"];
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
        <td align="right">Financial Year*</td>
        <td>
                <select name="cmbyear" requierd>
                    <option value="<?php echo $fyear;?>" Selected><?php echo $fyear;?></option>
                    <?php
                        include("../financialyear.htm");
                    ?>
</select><?php echo $fyear;?>
</td>
        </tr>

                      <tr>
               <td align="right">Name of Training*</td>
               <td><input type="Hidden" name="txtid" value="<?php echo $tid;?>" readonly="True">
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
                 <?php
                    include("../training_category.html");
                    ?>
                </select>
				<?php echo $training;?>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
         <?php
            include("../level.htm");
        ?>
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
               <td align="right">Budget Source</td>
               <td>
                <select name="cmbsource">
                    <option value="<?php echo $source;?>"><?php echo $source;?></option>
                        <option value="संघिय ससर्त">संघिय ससर्त</option>
                        <option value="प्रदेश चालु">प्रदेश चालु</option>
                        <option value="अन्य">अन्य</option>

                    </select>
               </td>
           </tr>     
           <tr>
               <td align="right">Amount</td>
               <td><input type="text" name="txtamount" value="<?php echo $expamount;?>" size="20"></td>
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
