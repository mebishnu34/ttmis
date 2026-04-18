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
<?php
   include("../Processing/db_connection.php");
   include("title.htm");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><BODY>
<form method="Post" Action="../Object/save_run_training.php">
    <table class="subtable"  cellpadding="10">
    
           <tr>
          <td colspan="2" align="center">Teacher Training</td>
        </tr>
        <tr>
        <td align="right">Financial Year*</td>
        <td>
                <select name="cmbyear" requierd>
                    <?php
                        include("../financialyear.htm");
                    ?>
</select>
</td>
        </tr>
              <tr>
               <td align="right">Name of Training*</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)" class="normaltext">
                 <?php
                    include("../training_category.html");
                    ?>  
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
        <?php
            include("../level.htm");
        ?>
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
               <td><input type="text" name="txtsdate" size="10" class="normaltext"> End Date*<input type="text" name="txtedate" size="10" class="normaltext"></td>
           </tr>
            <tr>
               <td align="right">Number of Days*</td>
               <td><input type="text" name="txtdays" size="5" class="normaltext"></td>
           </tr>
           <tr>
               <td align="right">Training Venue*</td>
               <td><input type="text" name="txtvenu" size="60" class="normaltext"></td>
           </tr>
       <tr>
               <td align="right">Training Coordinator*</td>
               <td><input type="text" name="txtcoordinator" size="60"></td>
           </tr>
    <tr>
               <td align="right">Mobile No.*</td>
               <td><input type="text" name="txtmobile"></td>
           </tr>
            <tr>
               <td align="right">Training Time</td>
               <td><input type="text" name="txttime" size="20"></td>
           </tr>   
           <tr>
               <td align="right">Budget Source</td>
               <td>
                <select name="cmbsource">
                        <option value="संघिय ससर्त">संघिय ससर्त</option>
                        <option value="प्रदेश चालु">प्रदेश चालु</option>
                        <option value="अन्य">अन्य</option>

                    </select>
               </td>
           </tr>     
           <tr>
               <td align="right">Amount</td>
               <td><input type="text" name="txtamount" size="20"></td>
           </tr>             
		   <tr>
               <td align="right">Remark</td>
               <td><input type="text" name="txtremark" size="60"></td>
           </tr>
           <tr>
               <td colspan="2" align="center"><input type="submit" value="Create" name="btndisplay" class="button"></td>
           </tr>
    </table>
</form>
</BODY>
</HTML>
