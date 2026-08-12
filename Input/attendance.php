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
        xmlhttp.open("GET","droptraining.php?q="+str,true);
        xmlhttp.send();
    }
}

function teacher(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
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
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","teacherlist.php?t="+str,true);
        xmlhttp.send();
    }
}

</script>

</head>
<?php
  include("../Processing/db_connection.php");
  include("title.htm")
?>
<BODY>
<form action="..\Object\Save_Attendance.php" method="Post">
    <table class="subtable" cellpadding="10">
           <tr>
    <td colspan="2" align="center">Attendance</td>
    </tr>
           <tr>
               <td align="right">Date</td>
               <td><input type="Text" name="txtdate" value=<?php echo $_SESSION['$tdate'];?>></td>
           </tr>
           <tr>
               <td align="right">Name of Training</td>
               <td>
               <Select name=cmbtraining onchange="training(this.value)">
                <Option>Select Traning</option>
               <?php
                    $sql="SELECT trainingid, trainingname, trainingid, level, leveloption FROM tbltraining ORDER BY trainingname";
                     $result = mysqli_query($conn,$sql);

                           while($row = mysqli_fetch_array($result))
                           {
                             echo "<option value='". $row['trainingid']."'>".$row['trainingname'].' - ' . $row['level'].' - '.$row['leveloption'].'</option>';
                               }
                               ?>

               </td>
           </tr>
           <tr>
               <td align="right">Training Number</td>
               <td><div id="txtHint">Training Number</div></td>
           </tr>
           <tr>

<tr>
<td colspan="2" align="center">
<div id="txtHint1">Teacher List</div>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"> &nbsp;&nbsp;&nbsp;<input type="reset" name="btnreset" value="Cancel" class="button"></td>

</tr>


               </table>
</form>
</BODY>
</HTML>
