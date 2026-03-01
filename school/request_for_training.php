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
   include("Processing/db_connection.php");
   include("title.htm");
?>
<BODY class="bg">

<form method="Post" Action="school/school_teacher_request.php">
    <table class="maintable">
           <tr>
          <td colspan="2" align="center">Teacher Training Request</td>
        </tr>
              <tr>
               <td align="right">Name of Training</td>
               <td>
                <Select name="cmbtraining" onchange="training(this.value)">
                <option>Select Training Name</option>
                <option>TPD</option>
                <option>Refresher</option>
                <option>Leadership and Management</option>
                </select>
                </td>
           </tr>
           <tr>
    <td align="right">Level</td>
    <td><select name="cmblevel" onchange="level(this.value)">
        <option>Select Level</option>
         <option>Basic-ECD</option>
         <option>Basic(1-5)</option>
         <option>Basic(6-8)</option>
         <option>Secondary(9-10)</option>
         <option>Secondary(11-12)</option>
         <option>Head Teacher</option>
         <option>Others</option>
</select>
     </td>
    </tr>
    <tr>
    <td align="right">Subject</td>
    <td><div id="txtHint">Subject</div>
     </td>
    </tr>
               <tr>
               <td align="right">Start Date</td>
               <td><input type="text" name="txtsdate"> End Date<input type="text" name="txtedate"></td>
           </tr>

           <tr>
               <td align="right">Remark</td>
               <td><input type="text" name="txtremark" size="80"></td>
           </tr>
            <tr>
               <td colspan="2" align="center"><input type="submit" value="Save" name="btnrequest" class="button"></td>
           </tr>
    </table>
</form>
</div>
</BODY>
</HTML>
